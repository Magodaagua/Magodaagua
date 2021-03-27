<?php 
session_start();
error_reporting(E_ALL);
ini_set("display_errors", 0);

$con = mysqli_connect('localhost', 'root', '', 'bentotec') or die("Não foi possível realizar a conexão");
mysqli_select_db($con, "bentotec");
$resultado = mysqli_query($con, "SELECT * FROM usuarios where email='".$_REQUEST["login_Email"]."' AND senha='".$_REQUEST["login_Senha"]."'");
$usua = mysqli_query($con, "SELECT apelido FROM usuarios where email='".$_REQUEST["login_Email"]."' AND senha='".$_REQUEST["login_Senha"]."'");
$row = mysqli_fetch_array($resultado);		
		
if (!$row) {
	echo "<script>alert('Usuário ou senha errado');location.href=\"login.html\"</script>";
}
else{
	session_start();
	$_SESSION['email'] = $_REQUEST["login_Email"];
	$_SESSION['senha'] = $_REQUEST["login_Senha"];
	$_SESSION['id_usuario'] = $row['id_usuario'];
	$_SESSION['nome'] = $row['nome'];
	$_SESSION['apelido'] = $row['apelido'];
	header( 'Location: ./menu.php');
}
mysqli_free_result($resultado);
$fechou = mysqli_close($con);
?>

