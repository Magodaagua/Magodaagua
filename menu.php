<!DOCTYPE html>
<html lang="pt-br">

<!-- Conexão com o banco de dados -->
<?php

	error_reporting(0);
	ini_set("display_errors", 0);
	
	$link = mysqli_connect('localhost', 'root', '', 'bentotec');

	$db = mysqli_select_db($link, 'bentotec');
	
?>

<!-- Início da sessão e confirmação de que o usuário está logado -->
<?php

session_start();
if (!isset($_SESSION['email']) || !isset($_SESSION['senha'])) {
	header("Location: ./login.html");
	exit;
}
//background-attachment: fixed;
?>

<head>
<style>
  Body{
	background-image:url(_imagensdosite/tiamat.jpg);
	background-size:110% 100%;
	background-repeat:no-repeat;
	background-color:#000;
}
	</style>
	<!-- Título e ícone da página -->
	<link rel="icon" type="png" href="_imagensdosite/icon.png">
	<title>Perfil</title>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="_css/perfil.css">

    <!--dado funciona (roda) -->
<link rel="stylesheet" type="text/css" href="_css/dados.css">

	<script type="text/javascript">
		var cont = 0;
		var slideimages = new Array() // cria novo array para carregar as imagens

	</script>

</head>

<body>

<!-- menu superior-->
<?php 
  require("menusuperior2.php");
?>
<!--fim do menu superior-->

<!-- Inicio do menu lateral -->
<?php 
  require("DadosLaterais.php");
?>
 <!-- Acaba menu lateral -->


	<!-- INÍCIO DO CONTAINER. Usado para conter todos os elementos da página -->
	<div class="container text-light">
		<br> <p>
		<!-- Confirmação de conexão -->
		<?php
			if ($link->connect_errno) {
	   		echo "Failed to connect to MySQL: (" . $link->connect_errno . ") " . $link->connect_error;
			}
		?>

		<!-- Row do logo que fica no meio da página -->
		<div class="row justify-content-center my-4 mx-1">
			
			<div class="col-10 col-md-8 col-lg-4 align-self-center">

				<!-- Logo que fica no meio da página -->
	        	<img class="img-fluid" src="_imagensdosite/logo2.png">
	          
	        </div>

		</div>

		<!-- Row da mensagem de boas vindas -->
		<div class="row justify-content-center my-5 mx-10" align="center">
			
			<!-- Mensagem de boas vindas -->
			<p class="display-4" id="boas_vindas"> Olá <?php echo $_SESSION['apelido']?>, boas vindas ao RPG Móvel </p>

		</div>
		
	<!-- FIM DO CONTAINER -->
	</div>
	
 <!--inicio Botão de voltar ao topo-->
 <?php 
      require("Botaodevoltaraotopo.php");
    ?>
  <!--Fim Botão de voltar ao topo-->

	<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

</body>

</html>