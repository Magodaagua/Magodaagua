<?php
session_start();
$nome = $_POST['username'];
$senha = $_POST['password'];

$con = mysqli_connect('localhost', 'root', 'sua-nova-senha', 'bentotec');
mysqli_select_db($con, 'rphub');

$result = mysqli_query($con, "SELECT * FROM users WHERE username='$nome' AND password='$senha'");

if(mysqli_num_rows($result)){
	$res = mysqli_fetch_array($result);
	
	$_SESSION['username'] = $res['username'];
	$_SESSION['username_id'] = $res['id'];
	echo "<script>location.href=\"index.php\"</script>";
}

else{
	
	echo "<script>alert('Usuário não encontrado!');location.href=\"index.php\"</script>";
	
}

?>