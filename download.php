<?php

$dir = './Pdfs/';

$arquivoNome = $_GET['pdf'];
$arquivoLocal = $dir.$arquivoNome;

if (!file_exists($arquivoLocal)) {
	echo "arquivo não encontrado";
	exit;
	
}

 // Configuramos os headers que serão enviados para o browser
header('Content-Description: File Transfer');
header('Content-Disposition: attachment; filename="'.$arquivoNome.'"');
header('Content-Transfer-Encoding: binary');
header('Content-Type: application/octet-stream');
header('Content-Length: ' . filesize($arquivoLocal));
header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
header('Pragma: public');
header('Expires: 0');
// Envia o arquivo para o cliente
readfile ($arquivoLocal);

?>
