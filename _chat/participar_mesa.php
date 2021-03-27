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

$cont = 0;
//participar da mesa
if ((isset($_POST['participar_mesa'])) || (isset($_POST['aceitar_convite']))) {
	
	$select = mysqli_query($db, "SELECT * FROM mesas");
	
	while ($exibe = mysqli_fetch_array($select)) {
		if ($_POST['mesa'] == $exibe['nomemesa']) {
			$_SESSION['nomemesa'] = $exibe['nomemesa'];	
			$_SESSION['qtdtotal'] = $exibe['qtdtotal'];
			$_SESSION['qtdmax'] = $exibe ['qtdmax'];
			$_SESSION['senha'] = $exibe ['senha'];
		}
	}//pega os dados da mesa que o usuário quer entrar

	$select2 = mysqli_query($db, "SELECT * FROM mesasusers WHERE username = '".$_SESSION['id_usuario']."' ");

	if ($_SESSION['senha'] == "") {//verificar se tem senha para entrar na mesa
		if ((mysqli_num_rows($select2) == 0) && ($_SESSION['qtdtotal'] < $_SESSION['qtdmax'])) {//se o usuário não estiver em nenhuma mesa e a mesa não estiver lotada, ele vai inserir o usuário na mesa e adicionar mais um na quantidade total
			mysqli_query($db, "INSERT INTO mesasusers (nomemesa, username) VALUES ('".$_SESSION['nomemesa']."', '".$_SESSION['id_usuario']."')");
			mysqli_query($db, "UPDATE mesas SET qtdtotal = qtdtotal+1 WHERE nomemesa = '".$_SESSION['nomemesa']."'");
			echo "<script>location.href='index_jogador.php'</script>";
		}else{
			while ($exibe2 = mysqli_fetch_array($select2)) {
				if ($exibe2['nomemesa'] == $_SESSION['nomemesa']) {
					$cont++;
				}//se o usuário usuário já tiver em uma mesa com esse nome cont++
			}
			if (($cont == 0) && ($_SESSION['qtdtotal'] < $_SESSION['qtdmax'])) {//se o usuário não estiver na mesa, ela vai passar a participar
				mysqli_query($db, "INSERT INTO mesasusers (nomemesa, username) VALUES ('".$_SESSION['nomemesa']."', '".$_SESSION['id_usuario']."')");
				mysqli_query($db, "UPDATE mesas SET qtdtotal = qtdtotal+1 WHERE nomemesa = '".$_SESSION['nomemesa']."'");

				echo "<script>location.href='index_jogador.php'</script>";
			}else{
				if ($_SESSION['qtdtotal'] == $_SESSION['qtdmax']) {
					echo "<script>alert('Mesa lotada!');</script>";//mesa lotada
					echo "<script>location.href='index_jogador.php'</script>";
				}
				echo "<script>location.href='index_jogador.php'</script>";
			}
		}
	}else{
		echo "A mesa que você tentou entrar possui uma senha, digite-a: <form action='participar_mesa.php' method='POST'><input type='password' name='senha'><input type='submit' name='verificar_senha' value='Enviar'></form>";
	}
}//término do participar da sala
//verificar senha
if (isset($_POST['verificar_senha'])) {
	if ($_SESSION['senha'] == $_POST['senha']) {//verifica se as senhas estão iguais
		$select2 = mysqli_query($db, "SELECT * FROM mesasusers WHERE username = '".$_SESSION['id_usuario']."' ");

		if ((mysqli_num_rows($select2) == 0) && ($_SESSION['qtdtotal'] < $_SESSION['qtdmax'])) {//se o usuário não estiver em nenhuma mesa e a mesa não estiver lotada, ele vai inserir o usuário na mesa e adicionar mais um na quantidade total
			mysqli_query($db, "INSERT INTO mesasusers (nomemesa, username) VALUES ('".$_SESSION['nomemesa']."', '".$_SESSION['id_usuario']."')");
			mysqli_query($db, "UPDATE mesas SET qtdtotal = qtdtotal+1 WHERE nomemesa = '".$_SESSION['nomemesa']."'");
			echo "<script>location.href='index_jogador.php'</script>";
		}else{
			while ($exibe2 = mysqli_fetch_array($select2)) {
				if ($exibe2['nomemesa'] == $_SESSION['nomemesa']) {
					$cont++;
				}//se o usuário usuário já tiver em uma mesa com esse nome: cont++
			}
			if (($cont == 0) && ($_SESSION['qtdtotal'] < $_SESSION['qtdmax'])) {//se o usuário não estiver na mesa, ela vai passar a participar
				mysqli_query($db, "INSERT INTO mesasusers (nomemesa, username) VALUES ('".$_SESSION['nomemesa']."', '".$_SESSION['id_usuario']."')");
				mysqli_query($db, "UPDATE mesas SET qtdtotal = qtdtotal+1 WHERE nomemesa = '".$_SESSION['nomemesa']."'");

				echo "<script>location.href='index_jogador.php'</script>";
			}else{
				if ($_SESSION['qtdtotal'] == $_SESSION['qtdmax']) {
					echo "<script>alert('Mesa lotada!');</script>";//mesa lotada
					echo "<script>location.href='index_jogador.php'</script>";
				}
				echo "<script>location.href='index_jogador.php'</script>";
			}
		}
	}else{
		echo "<script>alert('Senha errada!');location.href='index_jogador.php'</script>'";
	}
}
//deleta os convites caso o usuário aceite ou recuse
if (isset($_POST['aceitar_convite'])) {
	$confere = mysqli_query($db, "SELECT * FROM mesasusers WHERE username = '".$_SESSION['id_usuario']."' AND nomemesa = '".$_SESSION['nomemesa']."' ");//confere se o usuário entrou na mesa para excluir o convite
	if (mysqli_num_rows($confere) != 0) {
		$confere2 = mysqli_query($db, "DELETE FROM convites WHERE id = '".$_POST['id_convite']."'");
		if ($confere2) {
			echo "<script>alert('Convite aceito!');</script>";
		}
	}
}
if (isset($_POST['recusar_convite'])) {
	$confere2 = mysqli_query($db, "DELETE FROM convites WHERE id = '".$_POST['id_convite']."'");
	if ($confere2) {
		echo "<script>alert('Convite recusado!');location.href='caixa_de_entrada.php'</script>'";
	}
}
?>
