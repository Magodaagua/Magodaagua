<!DOCTYPE html>
<html lang="pt-br">
<head>
<style>
  Body{
  background-image:url(black.png);
  background-size:110% 100%;
  background-repeat:no-repeat;
  background-color:#000;
}
  </style>
	<!-- Título e ícone da página -->
    <link rel="icon" type="png" href="_imagensdosite/icon.png">
	<title>RPGMÓVEL</title>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Links para o bootstrap e o css da página -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <link rel="stylesheet" type="text/css" href="_css/perfil.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

</head>

<!-- menu superior-->
<?php 
  require("menusuperior.php");
?>
<!--fim do menu superior-->

<body bgcolor= "#000000">
	<!-- INÍCIO DO CONTAINER. Usado para conter todos os elementos da página -->
	<div class="container text-light">
		
		<!-- Row do logo que fica no meio da página -->
		<div class="row justify-content-center my-4 mx-1">
			
			<div class="col-10 col-md-8 col-lg-4 align-self-center">

				<!-- Logo que fica no meio da página -->
	        	<img class="img-fluid" src="_imagensdosite/logo2.png">
	          
	        </div>

		</div>
<!-- carrosel -->

        <!-- START THE FEATURETTES -->
          <div class="h3" align="center">
          <hr align="center" width="1100" size="1" color="#fff">
        </div>
        <hr class="featurette-divider">

        <div class="row featurette">
          <div class="col-md-7">
            <h2 class="featurette-heading">O que é RPG ?</h2>
            <p class="lead"> <h3> RPG, também conhecido como Role-playing game é um tipo de jogo onde os jogadores assumem papéis de personagem, enquanto
			criam narrativas colaborativas, isso, faz com que as escolhas de cada um determinem a direção na qual o jogo vai tomar. <br>
			Os RPGs são jogos tipicamente mais sociais e colaborativos, embora ainda existam competições. <br>
			RPG surgiu, oficialmente em 1974, com o lançamento do Dugeons and Dragons pela empresa TSR,
			nos Estados Unidos da América.</p> </h3>
          </div>
          <div class="col-md-5">
            <img class="featurette-image img-fluid mx-auto" data-src="holder.js/500x500/auto" alt="500x500" style="width: 500px; height: 500px;" src="_imagensdosite/oquee.jpg" data-holder-rendered="true">
          </div>
        </div>
<br>
          <div class="h3" align="center">
          <hr align="center" width="1100" size="1" color="#fff">
        </div>
					
        <hr class="featurette-divider">

        <div class="row featurette">
          <div class="col-md-7 order-md-2">
            <h2 class="featurette-heading">Sobre nós </h2>
            <p class="lead"> <h3> Somos um grupo de jogadores de RPG que após uma breve pesquisa de campo, descobrimos um problema
		compartilhado por muitas pessoas, as quais compartilham a mesma vontade que nós, que necessitam de um meio para fazer e encontrar amigos 
		que também compartilham dessa vontade.</p> </h3>
          </div>
          <div class="col-md-5 order-md-1">
            <img class="featurette-image img-fluid mx-auto" data-src="holder.js/500x500/auto" alt="500x500" src="_imagensdosite/nos2.jpg" data-holder-rendered="true" style="width: 500px; height: 500px;">
          </div>
        </div>
          <div class="h3" align="center">
          <hr align="center" width="1100" size="1" color="#fff">
        </div>
        <br>

        <hr class="featurette-divider">

        <div class="row featurette">
          <div class="col-md-7">
            <h2 class="featurette-heading">Assine para ganhar recompensas incríveis!</h2>
            <p class="lead">		
		<br> <h3>
		Com a assinatura deste site
		você vai poder: <p> <p>
		- Chamar mais pessoas para uma seção;<br>
		- Ganhar skins de dados; <br>
		- Ganhar descontos de livros, modelos diferentes de dados, mapas;<br>
		- Ganhar mapas, modelos diferentes de dados, únicos para suas aventuras;
		<br></p> </h3>
          </div>
          <div class="col-md-5">
            <img class="featurette-image img-fluid mx-auto" data-src="holder.js/500x500/auto" alt="500x500" src="_imagensdosite/vip.jpg" data-holder-rendered="true" style="width: 500px; height: 500px;">
          </div>
        </div>
<br>
        <hr class="featurette-divider">	

        <!-- /END THE FEATURETTES -->
      <!-- creditos -->
      <!-- rodapé -->
<footer class="footer mt-auto py-3">
      <div class="container">
      	<font color="white">
       <h4> Patrocinado por: </h4> 
       <a href="https://devir.com.br/"> Livraria Devir </a>  &nbsp;
       <a href="https://www.galapagosjogos.com.br/"> Galápagos </a> &nbsp;
       <a href="https://www.coisinhaverde.com.br/"> Coisinha Verde </a> &nbsp;
      </div>
  </font>
    </footer>
  <!--inicio Botão de voltar ao topo-->
    <?php 
      require("Botaodevoltaraotopo.php");
    ?>
  <!--Fim Botão de voltar ao topo-->

	<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

</body>
</html>