<?php

	session_start();
	if(isset($_SESSION['id_usuario'])) {


	$con = mysqli_connect('localhost', 'root', '', 'bentotec');
	mysqli_select_db($con, 'rphub'); 
	//seleciona todos os convites do usuário
	$select_convite = mysqli_query($con, "SELECT * FROM convites WHERE convidado = '".$_SESSION['apelido']."'");
	if (mysqli_num_rows($select_convite) == 0) {

		echo "Você não tem nenhum convite :(";

	}else{

		while ($exibe = mysqli_fetch_array($select_convite)) {

			$select_dono = mysqli_query($con, "SELECT apelido FROM usuarios WHERE id_usuario = '".$exibe['donomesa']."'");
			while ($exibe2 = mysqli_fetch_array($select_dono)) {

				//exibe os convites
				echo $exibe2['apelido']." convidou você para participar da mesa ".$exibe['nomemesa']."<form action='participar_mesa.php' method='POST'><input type='hidden' name='mesa' value='".$exibe['nomemesa']."'><input type='hidden' name='id_convite' value='".$exibe['id']."'>     <input type='submit' name='aceitar_convite' value='Aceitar'><input type='submit' name='recusar_convite' value='Recusar'></form><br>";

			}

		}
		
	}
?>

<br><br>
<a href="index.php">Voltar</a><br>
<a href="logout.php">Logout</a>
<?php
}else{
	echo "<script>location.href='index.php';</script>";
}
?>