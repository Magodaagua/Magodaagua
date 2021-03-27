<!DOCTYPE html>
<html lang="pt-br">

<?php

	$db = mysqli_connect('localhost', 'root', '', 'bentotec');
	mysqli_select_db($db, 'bentotec');
	
?>

<?php

	session_start();
	if (!isset($_SESSION['email']) || !isset($_SESSION['senha'])) {
		header("Location: ./login.html");
		exit;
	}

?>

<?php

	if (isset($_POST['criar_mesa'])) {

		$nome_mesa = $_POST["nome_mesa"];
		$qtd = $_POST["qtd"];
		$senha = $_POST["senha"];

		$verifica = mysqli_query($db, "SELECT nomemesa, dono FROM mesas WHERE nomemesa = '$nome_mesa' ");

		if(mysqli_num_rows($verifica)){
			echo "<script>alert('Já existe uma mesa com o nome $nome_mesa, escolha outro nome!')</script>";
		}//verifica se a mesa existe
		else {
			if (isset($senha)) {		
				mysqli_query($db, "INSERT INTO mesas (nomemesa, qtdmax, qtdtotal, dono, senha) VALUES ('".$nome_mesa."', '".$qtd."', '1', '".$_SESSION['id_usuario']."', '".$senha."')");
				mysqli_query($db, "INSERT INTO mesasusers (nomemesa, username) VALUES ('".$nome_mesa."', '".$_SESSION['id_usuario']."')");
			}else{
				mysqli_query($db, "INSERT INTO mesas (nomemesa, qtdmax, qtdtotal, dono) VALUES ('".$nome_mesa."', '".$qtd."', '1', '".$_SESSION['id_usuario']."')");
				mysqli_query($db, "INSERT INTO mesasusers (nomemesa, username) VALUES ('".$nome_mesa."', '".$_SESSION['id_usuario']."')");
			}
		}//se não existir, ele cria a mesa, e o mestre já está participando dela
	}
	if (isset($_POST['excluir_mesa'])) {
		$excluir = $_POST["mesa"];
		$delete_mesa= mysqli_query($db, "DELETE FROM mesas WHERE nomemesa = '$excluir'");//exclue as mesas
		$delete_mesasusers = mysqli_query($db, "DELETE FROM mesasusers WHERE nomemesa = '$excluir'");//exclue todos os usuários que estiverem na mesa
		$delete_msg = mysqli_query($db, "DELETE FROM logs WHERE mesa = '$excluir'");//exclue todas as msgs da mesa

		if ($delete_mesa) {
			echo "<script>alert('Mesa excluida com sucesso!');</script>";
		}
	}

?>

<head>

	<link rel="icon" type="png" href="_media\icon.png">
	<title>Mestre</title>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="_css/perfil.css">

</head>

<body>

<div class="container">
	
<b><?php echo "Usuário: ".$_SESSION['id_usuario']; ?></b><br>

<?php

$listar = mysqli_query($db, "SELECT * FROM mesas WHERE dono = '".$_SESSION['id_usuario']."'");

echo "Minhas mesas:<br><br>";

while ($exibe=mysqli_fetch_array($listar)) {
	echo "<form action='index_mestre.php' method='POST'>".$exibe['nomemesa']."<input type='hidden' name='mesa' value='".$exibe['nomemesa']."' readonly>-----".$exibe['qtdtotal']."/".$exibe['qtdmax']."     <input type='submit' name='excluir_mesa' value='Excluir'></form><br>";
};//exibe as mesas que o usuário criou

?>
-------------------------------------------------<br><br><br>
<form action="index_mestre.php" method="POST">
	Nome da mesa: <input type="text" name="nome_mesa" required="true"><br>
	Senha(opcional): <input type="password" name="senha"><br>
	Quantidade de jogadores: <input type="number" name="qtd" min="2" max="10" required="true"><br>
	<input type="submit" name="criar_mesa" value="Criar mesa">
</form>

<a href="index.php">Perfil</a><br /><br />

</div>

</body>
</html>
