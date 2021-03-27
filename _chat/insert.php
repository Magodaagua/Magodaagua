<?php

	session_start();
	if (!isset($_SESSION['email']) || !isset($_SESSION['senha'])) {
		header("Location: ./login.html");
		exit;
	}

?>

<?php

	$db = mysqli_connect('localhost', 'root', '', 'bentotec');
	mysqli_select_db($db, 'bentotec');

?>

<?php

$nome = $_SESSION['apelido'];
$msg = $_REQUEST['msg'];

//$selectsala = mysqli_query($con, "SELECT * FROM salas WHERE dono = '".$_SESSION['username']."'");
$selectsala = mysqli_query($db, "SELECT * FROM mesas");

while ($seleciona = mysqli_fetch_array($selectsala)) {
	if ($seleciona['nomemesa'] == $_SESSION['mesa']) {
		mysqli_query($db, "INSERT INTO logs (`username`, `msg`, `mesa`) VALUES ('$nome', '$msg', '".$_SESSION['mesa']."')");
		$resultado = mysqli_query($db, "SELECT * FROM logs WHERE mesa = '".$_SESSION['mesa']."'");

		while($extract = mysqli_fetch_array($resultado)) {
			echo "<span>" . $extract['username'] . "</span>: <span>" . $extract['msg'] . "</span><br />";
		}

	}else{
	}
}

?>
