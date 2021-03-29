<!DOCTYPE html>
<html lang="pt-br">

<!-- Conexão com o banco de dados -->
<?php

  error_reporting(0);
  ini_set("display_errors", 0 );
  
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
  background-image:url(_imagensdosite/black.png);
  background-size:110% 100%;
  background-repeat:no-repeat;
  background-color:#000;
}
  </style>

	<!-- Título e ícone da página -->
  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v3.8.5">
	<link rel="icon" type="png" href="_imagensdosite/icon.png">
	<title>VIP</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.3/examples/pricing/">

    <!-- Bootstrap core CSS -->
<link href="/docs/4.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
    <!-- Custom styles for this template -->
    <link href="pricing.css" rel="stylesheet">
	<!-- Links para o bootstrap e o css da página -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="_css/perfil.css">

<!--dado funciona (roda) -->
<link rel="stylesheet" type="text/css" href="_css/dados.css">

<script type="text/javascript">
    var cont = 0;
    var slideimages = new Array() // cria novo array para carregar as imagens

  </script>

</head>
  <body bgcolor="#00000">

 
	<!-- INÍCIO DO NAVEGADOR. Navbar que fica em cima de todas as páginas para acesso rápido de outras partes do site -->
	<?php 
  		require("menusuperior2.php");
	?>
	<!--final do navegador-->
  <!-- Inicio do menu lateral -->
  <?php 
    require("DadosLaterais.php");
  ?>
  <!-- Acaba menu lateral -->

	<div class="container text-light">
		<div class="h1" align="center">
<br> <p> <p> <p> <p> <p> <p> <p> 
		<i> VIP </i> 
		<p>
		<hr align="center" width="200" size="1" color="#fff">
		<!-- <a href="caminho-ate-o-arquivo.txt" download>Clique aqui para fazer o download</a> -->
<div class="container">
<div class="card-deck mb-3 text-center">
    <div class="card mb-4 shadow-sm">
      <div class="card-header">
        <h4 class="my-0 font-weight-normal"> <font color="black"> 1 mês </font></h4>
      </div>
      <div class="card-body">
        <h1 class="card-title pricing-card-title"> <font color="black ">R$20,00</h1> </font>
        <ul class="list-unstyled mt-3 mb-4">
          <font color="black">
          <li>-skin de dados</li><p>
          <li>-mapas</li><p>
          <li>-mais jogadores</li><p>
          <li>-descontos nas compras</li><p>
        </font>
        </ul>
       <button type="button" class="btn btn-lg btn-block btn-primary">Comprar</button>
      </div>
    </div>
    <div class="card mb-4 shadow-sm">
      <div class="card-header">
        <h4 class="my-0 font-weight-normal"><font color="black">6 meses</h4></font>
      </div>
      <div class="card-body">
        <h1 class="card-title pricing-card-title"><font color="black">R$60,00</h1></font>
        <ul class="list-unstyled mt-3 mb-4">
          <font color="black">
          <li>-skin de dados</li><p>
          <li>-mapas</li><p>
          <li>-mais jogadores</li><p>
          <li>-descontos nas compras</li><p>
        </font>
        </ul>
        <button type="button" class="btn btn-lg btn-block btn-primary">Comprar</button>
      </div>
    </div>
    <div class="card mb-4 shadow-sm">
      <div class="card-header">
        <h4 class="my-0 font-weight-normal"><font color="black">12 meses</h4></font>
      </div>
      <div class="card-body">
        <h1 class="card-title pricing-card-title"><font color="black">R$80,00</h1></font>
        <ul class="list-unstyled mt-3 mb-4"><font color="black">
          <li>-skin de dados</li><p>
          <li>-mapas</li><p>
          <li>-mais jogadores</li><p>
          <li>-descontos nas compras</li><p>
          <li>-itens exclusivos</li><p>
          </font>
        </ul>
        <button type="button" class="btn btn-lg btn-block btn-primary">Comprar</button>
      </div>
    </div>
  </div>

            </div>
		<br>

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