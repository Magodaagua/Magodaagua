<?php
session_start();
if(isset($_SESSION['id_usuario'])) {
?>
<?php
$con = mysqli_connect('localhost', 'root', '', 'bentotec');
mysqli_select_db($con, 'rphub'); 
//seleciona o id do convidado
$select_idconvidado = mysqli_query($con, "SELECT id_usuario FROM usuarios WHERE apelido = '".$_POST['convidado']."'");
if (mysqli_num_rows($select_idconvidado) == 0) {
	//se o jogador não existir ele vai alertar
	//echo "<script>alert('Esse jogador não existe!');location.href='chat.php'</script>";
	var_dump($_POST);
}else{
	while ($confere = mysqli_fetch_array($select_idconvidado)) {
		//se ele existe ele vai guardar o id em uma variável 
		$_SESSION['id_convidado'] = $confere['id'];
	}
	//verifica se o jogador já está na mesa
	$select = mysqli_query($con, "SELECT * FROM mesasusers WHERE username = '".$_SESSION['id_convidado']."' AND nomemesa = '".$_SESSION['mesa']."'");
	if (mysqli_num_rows($select) != 0) {
		echo "<script>alert('Esse jogador já está na mesa!');location.href='chat.php'</script>";
	}else{
		//se não tiver na mesa ele vai verificar se o dono já enviou o convite
		$select_convites = mysqli_query($con, "SELECT * FROM convites WHERE convidado = '".$_POST['convidado']."' AND nomemesa = '".$_SESSION['mesa']."'");
		if (mysqli_num_rows($select_convites) == 0) {
			//se não tiver o convite ele envia
			$confere_convite = mysqli_query($con, "INSERT INTO convites (donomesa, convidado, nomemesa) VALUES ('".$_SESSION['id_usuario']."', '".$_POST['convidado']."', '".$_SESSION['mesa']."')");
			if ($confere_convite) {
				echo "<script>alert('Convite enviado!');location.href='chat.php'</script>";
			}else{
				echo "<script>alert('Impossível enviar o convite!');location.href='chat.php'</script>";
			}
		}else{
			//caso já tenha enviado o convite ele alerta
			echo "<script>alert('Convite já enviado para este jogador!');location.href='chat.php'</script>";
		}
	}
}

?>
<?php
}else{
	echo "<script>location.href='index.php';</script>";
}
?>