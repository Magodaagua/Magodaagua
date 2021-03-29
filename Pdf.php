<!DOCTYPE html>
<html lang="pt-br">
<?php
  //Conectar com o banco de dados
  $con = mysqli_connect('localhost','root', '', 'bentotec') or die("Não foi possível realizar a conexão");
  $bd = mysqli_select_db($con, "bentotec");
?>

<?php
  //Verificar se o usuário está conectado a uma conta
  session_start();
  if (!isset($_SESSION['email']) || !isset($_SESSION['senha'])) 
  {
    header("Location: ./login.html");
    exit;
  }
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


  <link rel="icon" type="png" href="_imagensdosite/icon.png">
  <title>Loja</title>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="_css/visualizar.css"> 

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
	<br>  <p>
<div class="row justify-content-center my-3 mx-3" align="center">
			
			<p class="display-4">Livros, mapas e dados </p>

		</div>
		<div class="h3" align="center">
		<p>
		<hr align="center" width="200" size="1" color="#fff">
		<i> Dungeons and Dragons ou D&D </i> 
          <!-- Row do logo que fica no meio da página -->
		<div class="row justify-content-center my-3 mx-3">
			
			<div class="col-10 col-md-8 col-lg-5 align-self-center">

				<!-- Logo que fica no meio da página -->
	        	<img class="img-fluid" src="_imagemloja/dungeons.png">
	          
	        </div>

		</div>
		<br>
		Livros:
                <br> <br> <br> 
		<!-- <a href="caminho-ate-o-arquivo.txt" download>Clique aqui para fazer o download</a> -->
<div class="container">

          <div class="row">
            <div class="col-md-4">
              <div class="card mb-4 shadow-sm">
                <a href=".\Pdfs\usados\LDJ.pdf"><img class="card-img-top" src="_imagemloja/ldj.png" height="225px" width="225px" data-holder-rendered="true"></a>
                <div class="card-body">
                  <p class="card-text"></p>
                  <p class="card-text"></p>
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
<a href=".\Pdfs\usados\LDJ.rar"> <button type="button" class="btn btn-sm btn-outline-secondary">Comprar</button> </a>
                    </div>
                    <small class="text-muted">&nbsp; &nbsp; &nbsp; &nbsp; Jogador</small>
					</div>
                  </div>
                </div>
              </div>
			            <div class="col-md-4">
              <div class="card mb-4 shadow-sm">
                <a href=".\Pdfs\usados\MM.pdf"><img class="card-img-top" src="_imagemloja/mm.jpg" data-holder-rendered="true" height="225px" width="225px"></a>
                <div class="card-body">
                  <p class="card-text"></p>
                  <p class="card-text"></p>
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                      <a href=".\Pdfs\usados\MM.rar"><button type="button" class="btn btn-sm btn-outline-secondary">Comprar</button></a>
                    </div>
                    <small class="text-muted">Monstros</small>
                  </div>
                </div>
              </div>
            </div>
			            <div class="col-md-4">
              <div class="card mb-4 shadow-sm">
                <a href=".\Pdfs\usados\GM.pdf"><img class="card-img-top" src="_imagemloja/ded.png" data-holder-rendered="true" height="225px" width="225px"></a>
                <div class="card-body">
                  <p class="card-text"></p>
                  <p class="card-text"></p>
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                      <a href=".\Pdfs\usados\GM.rar"> <button type="button" class="btn btn-sm btn-outline-secondary">Comprar</button> </a>
                    </div>
                    <small class="text-muted">Mestre</small>
                  </div>
                </div>
              </div>
            </div>
			<div class="col-20 col-md-20 col-lg-5 align-self-center">
            </div>
					<div class="h3" align="center">
					<hr align="center" width="200" size="1" color="#fff">
		<br>
		<i> Gurps </i>
<br> <br>		
          <!-- Row do logo que fica no meio da página -->
		<div class="row justify-content-center my-3 mx-3">
			
			<div class="col-10 col-md-8 col-lg-5 align-self-center">

				<!-- Logo que fica no meio da página -->
	        	<img class="img-fluid" src="_imagemloja/gurps.png">
	          
	        </div>

		</div>
		<br>
		Livros:
                <br> <br> <br>
		<div class="container">

          <div class="row">
            <div class="col-md-4">
              <div class="card mb-4 shadow-sm">
                 <a href=".\Pdfs\usados\GURPS Highlander.pdf"><img class="card-img-top" data-src="holder.js/100px225?theme=thumb&amp;bg=55595c&amp;fg=eceeef&amp;text=Thumbnail" alt="Thumbnail [100%x225]" style="height: 225px; width: 100%; display: block;" src="_imagemloja/gur.png" data-holder-rendered="true"></a>
                <div class="card-body">
                  <p class="card-text"></p>
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                      <a href=".\Pdfs\usados\GURPS Highlander.rar"><button type="button" class="btn btn-sm btn-outline-secondary">Comprar</button></a>
                    </div>
                    <small class="text-muted">Highlander</small>
                  </div>
                </div>
              </div>
            </div>
			            <div class="col-md-4">
              <div class="card mb-4 shadow-sm">
                 <a href=".\Pdfs\usados\GURPS matrix.pdf"><img class="card-img-top" data-src="holder.js/100px225?theme=thumb&amp;bg=55595c&amp;fg=eceeef&amp;text=Thumbnail" alt="Thumbnail [100%x225]" src="_imagemloja/max.jpg" data-holder-rendered="true" style="height: 225px; width: 100%; display: block;"></a>
                <div class="card-body">
                  <p class="card-text"></p>
                  <p class="card-text"></p>
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                       <a href=".\Pdfs\usados\GURPS matrix.rar"><button type="button" class="btn btn-sm btn-outline-secondary">Comprar</button></a>
                    </div>
                    <small class="text-muted">Matrix</small>
                  </div>
                </div>
              </div>
            </div>
			            <div class="col-md-4">
              <div class="card mb-4 shadow-sm">
                 <a href=".\Pdfs\usados\gurps_jornada_nas_estrelas.pdf"><img class="card-img-top" data-src="holder.js/100px225?theme=thumb&amp;bg=55595c&amp;fg=eceeef&amp;text=Thumbnail" alt="Thumbnail [100%x225]" src="_imagemloja/gurp.jpg" data-holder-rendered="true" style="height: 225px; width: 100%; display: block;"></a>
                <div class="card-body">
                  <p class="card-text"></p>
                  <p class="card-text"></p>
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                      <a href=".\Pdfs\usados\gurps_jornada_nas_estrelas.rar"><button type="button" class="btn btn-sm btn-outline-secondary">Comprar</button></a>
                    </div>
                    <small class="text-muted">Jornada</small>
                  </div>
                </div>
              </div>
            </div>
<div class="col-20 col-md-20 col-lg-5 align-self-center">
            </div>
		<div class="h3" align="center">
		<hr align="center" width="200" size="1" color="#fff">
        <br> <i> Tagmar </i> <br> <br>
          <!-- Row do logo que fica no meio da página -->
		<div class="row justify-content-center my-3 mx-3">
			
			<div class="col-10 col-md-8 col-lg-5 align-self-center">

				<!-- Logo que fica no meio da página -->
	        	<img class="img-fluid" src="_imagemloja/joojerio.png">
	          </div>
			  </div>
			  <div>
	        </div>
		<br>
		Livros:
		<br> <br> <br>
<div class="container">

          <div class="row">
            <div class="col-md-4">
              <div class="card mb-4 shadow-sm">
                <a href="./Pdfs/usados/Tagmar - Guia do Colégio Alquímico 2.1.0.pdf"><img class="card-img-top" data-src="holder.js/100px225?theme=thumb&amp;bg=55595c&amp;fg=eceeef&amp;text=Thumbnail" alt="Thumbnail [100%x225]" style="height: 225px; width: 100%; display: block;" src="_imagemloja/alq.png" data-holder-rendered="true"></a>
                            <div class="card-body">
                              <p class="card-text"></p>
                              <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                <a href="./Pdfs/usados/Tagmar - Guia dos Colegios.zip" ><button type="button" class="btn btn-sm btn-outline-secondary">Comprar</button></a>
                                </div>
                                <small class="text-muted">Colegio</small>
                              </div>
                            </div>
              </div>
            </div>
			            <div class="col-md-4">
              <div class="card mb-4 shadow-sm">
                <a href="./Pdfs/usados/Tagmar 2 - Tabelas de Resolução 2.3.0.pdf"><img class="card-img-top" data-src="holder.js/100px225?theme=thumb&amp;bg=55595c&amp;fg=eceeef&amp;text=Thumbnail" alt="Thumbnail [100%x225]" src="_imagemloja/abacate.jpg" data-holder-rendered="true" style="height: 225px; width: 100%; display: block;"></a>
                <div class="card-body">
                  <p class="card-text"></p>
                  <p class="card-text"></p>
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                      <a href="./Pdfs/usados/Tagmar - Kit do Mestre (completo) - v4.zip" ><button type="button" class="btn btn-sm btn-outline-secondary">Comprar</button></a>
                    </div>
                    <small class="text-muted">Mestre</small>
                  </div>
                </div>
              </div>
            </div>
			            <div class="col-md-4">
              <div class="card mb-4 shadow-sm">
                <a href="./Pdfs/usados/Tagmar - Livro de Criaturas 2.3.pdf"><img class="card-img-top" data-src="holder.js/100px225?theme=thumb&amp;bg=55595c&amp;fg=eceeef&amp;text=Thumbnail" alt="Thumbnail [100%x225]" src="_imagemloja/cria.png" data-holder-rendered="true" style="height: 225px; width: 100%; display: block;"></a>
                <div class="card-body">
                  <p class="card-text"></p>
                  <p class="card-text"></p>
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                      <a href="./Pdfs/usados/Tagmar - Livro de Criaturas 2.3.zip" ><button type="button" class="btn btn-sm btn-outline-secondary">Comprar</button></a>
                    </div>
                    <small class="text-muted">Criaturas</small>
                  </div>
                </div>
              </div>
            </div>
			<br><br><br>
		<div class="h3" align="center">
		<hr align="center" width="200" size="1" color="#fff">
		<br> <i> Aventuras Fantásticas </i> <br> <br>
          <!-- Row do logo que fica no meio da página -->
		<div class="row justify-content-center my-3 mx-3">
			
			<div class="col-10 col-md-8 col-lg-5 align-self-center">

				<!-- Logo que fica no meio da página -->
	        	<img class="img-fluid" src="_imagemloja/aaa.png">
	          </div>
			  </div>
			<div>
            </div>
		<br>
		Livros:
		<br> <br> <br>
		<div class="container">

          <div class="row">
            <div class="col-md-4">
              <div class="card mb-4 shadow-sm">
                <a href="./Pdfs/usados/Fighting Fantasy RPG - Titan - O Mundo de Aventuras Fantásticas - Biblioteca Élfica.pdf"> <img class="card-img-top" data-src="holder.js/100px225?theme=thumb&amp;bg=55595c&amp;fg=eceeef&amp;text=Thumbnail" alt="Thumbnail [100%x225]" src="_imagemloja/titan.png" data-holder-rendered="true" style="height: 225px; width: 100%; display: block;"> </a>
                <div class="card-body">
                  <p class="card-text"></p>
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                      <a href="./Pdfs/usados/Fighting Fantasy RPG - Titan - O Mundo de Aventuras Fantásticas - Biblioteca Élfica.rar"> <button type="button" class="btn btn-sm btn-outline-secondary">Comprar</button> </a>
                    </div>
                    <small class="text-muted">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Titan</small>
					</div>
                  </div>
                </div>
              </div>
			            <div class="col-md-4">
              <div class="card mb-4 shadow-sm">
                <a href="./Pdfs/usados/Fighting Fantasy - Regresso à Montanha de Fogo - Biblioteca Élfica.pdf"><img class="card-img-top" data-src="holder.js/100px225?theme=thumb&amp;bg=55595c&amp;fg=eceeef&amp;text=Thumbnail" alt="Thumbnail [100%x225]" src="_imagemloja/figh.jpg" data-holder-rendered="true" style="height: 225px; width: 100%; display: block;"></a>
                <div class="card-body">
                  <p class="card-text"></p>
                  <p class="card-text"></p>
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                      <a href="./Pdfs/usados/Fighting Fantasy - Regresso à Montanha de Fogo - Biblioteca Élfica.rar"><button type="button" class="btn btn-sm btn-outline-secondary">Comprar</button></a>
                    </div>
                    <small class="text-muted">Montanha</small>
                  </div>
                </div>
              </div>
            </div>
			            <div class="col-md-4">
              <div class="card mb-4 shadow-sm">
                <a href="./Pdfs/usados/Fighting Fantasy - Punhais na Escuridão - Biblioteca Élfica.pdf"><img class="card-img-top" data-src="holder.js/100px225?theme=thumb&amp;bg=55595c&amp;fg=eceeef&amp;text=Thumbnail" alt="Thumbnail [100%x225]" src="_imagemloja/pun.png" data-holder-rendered="true" style="height: 225px; width: 100%; display: block;"></a>
                <div class="card-body">
                  <p class="card-text"></p>
                  <p class="card-text"></p>
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                      <a href="./Pdfs/usados/Fighting Fantasy - Punhais na Escuridão - Biblioteca Élfica.rar"><button type="button" class="btn btn-sm btn-outline-secondary">Comprar </button></a>
                    </div>
                    <small class="text-muted">Punhais</small>
                  </div>
                </div>
              </div>
            </div>
			<div class="col-20 col-md-20 col-lg-5 align-self-center">
            </div>
			<div class="col-20 col-md-20 col-lg-5 align-self-center">
            </div>
			<div class="col-20 col-md-20 col-lg-5 align-self-center">
            </div>
			<div class="col-20 col-md-20 col-lg-5 align-self-center">
            </div>

       <!--voltar para o topo -->

<button onclick="topFunction()" id="myBtn" title="Go to top">Top</button>

<style>
#myBtn {
  display: none;
  position: fixed;
  bottom: 20px;
  right: 30px;
  z-index: 99;
  font-size: 18px;
  border: none;
  outline: none;
  background-color: red;
  color: white;
  cursor: pointer;
  padding: 15px;
  border-radius: 4px;
}

#myBtn:hover {
  background-color: #555;
}
</style>

<script>
//Get the button
var mybutton = document.getElementById("myBtn");

// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    mybutton.style.display = "block";
  } else {
    mybutton.style.display = "none";
  }
}

// When the user clicks on the button, scroll to the top of the document
function topFunction() {
  document.body.scrollTop = 0;
  document.documentElement.scrollTop = 0;
}
</script>
	<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

</body>
</html>