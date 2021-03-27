
<?php
	error_reporting(0);
	ini_set(“display_errors”, 0 );

	$link = mysqli_connect('localhost', 'root', '', 'bentotec');

	$db = mysqli_select_db($link, 'bentotec');
?>

<?php
	if ($link->connect_errno) {
	   echo "Failed to connect to MySQL: (" . $link->connect_errno . ") " . $link->connect_error;
	}
?>

<?php
	$oi = $_GET["id_ficha"];
	$ficha = mysqli_query($link,"DELETE FROM ficha WHERE ficha.id_ficha =" . $oi);

	echo "<script type='text/javascript'>alert('Ficha excluída com sucesso');location.href=\"perfil.php\"</script>";
	
?>



