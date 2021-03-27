<!DOCTYPE html>
<html lang="pt-br">

<?php
	error_reporting(0);
	ini_set("display_errors", 0 );
	
	$link = mysqli_connect('localhost', 'root', '', 'bentotec');

	$db = mysqli_select_db($link, 'bentotec');
?>
<?php

session_start();
if (!isset($_SESSION['email']) || !isset($_SESSION['senha'])) {
	header("Location: ./login.html");
	exit;
}

?>
<head>
<style>
  Body{
  background-image:url(_imagensdosite/sla.jpg);
  background-size:100% 150%;
  background-repeat:no-repeat;
  background-color:#000;
}
  </style>

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
	<!-- INÍCIO DO NAVEGADOR. Navbar que fica em cima de todas as páginas para acesso rápido de outras partes do site -->
	<?php 
  		require("menusuperior2.php");
	?>
	<!--final do navegador-->

	<!-- Modal para sair -->
	<div class="modal fade" id="sairModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

	  <div class="modal-dialog" role="document">

	    <div class="modal-content">

	      <div class="modal-header">

	        <h5 class="modal-title" id="exampleModalLabel">Deseja mesmo sair de sua conta?</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>

	      </div>

	      <div class="modal-footer">

	        <button type="button" class="btn btn-secondary" data-dismiss="modal">Continuar na conta</button>
	        <a class="btn btn-primary" href="logout.php"> Sair da conta </a>

	      </div>

	    </div>

	  </div>

	</div>
	<!-- FIM DO NAVEGADOR -->

<!-- Inicio do menu lateral -->
  <style>
.sidenav {
  height: 100%;
  width: 0;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  background-color: #111;
  overflow-x: hidden;
  transition: 0.5s;
  padding-top: 60px;
}

.sidenav a {
  padding: 8px 8px 8px 32px;
  text-decoration: none;
  font-size: 25px;
  color: #818181;
  display: block;
  transition: 0.3s;
}

.sidenav a:hover {
  color: #f1f1f1;
}

.sidenav .closebtn {
  position: absolute;
  top: -2;
  right: 25px;
  font-size: 36px;
  margin-right: 190px;
}

#main {
  transition: margin-left .5s;
  padding: 16px;
}

@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}
</style>
<p> <br><br>
<div id="mySidenav" class="sidenav">
   <center> <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a></center>
   <font color="white"> 

<div class="row justify-content-center mt-3 my-3 mx-3" align="center">
      
      <p class="display-4"> Dado</p>

    </div>


    <div class="row justify-content-center mt-2 mb-1 mx-3">
      
      <div class="col-6 col-md-2">
        
        <label for="nLados"> Número de lados </label>
        <select class="btn btn-light mx-3" id="lados" type='number' name='nLados' onchange="mudarDado()">
          <option value="4">D4</option>
          <option value="6">D6</option>
          <option value="8">D8</option>
          <option value="10">D10</option>
          <option value="12">D12</option>
          <option value="20">D20</option>
        </select>

      </div>

    </div>
<p> <p> <br> <br> <br>
    <div class="row justify-content-center my-1">
      <img src="_media/d4/image/1d4.png" class="img" onclick="slideit()" id="slide" width="200px" height="200px" />
      
      <script type="text/javascript">
        var universalDie = "d4";
        var dadoN = 4;
        function mudarDado(){
          var lados = document.getElementById('lados').value;

          document.getElementById("slide").src = "_media/d"+lados+"/image/1d"+lados+".png";
          universalDie = "d"+ lados;
          dadoN = Number(lados);
        }

        function slideit(){
          var rnd = Math.floor(Math.random() * dadoN) + 1; //gera um número aleatório de acordo com a quantidade de imagens
          document.getElementById('slide').src = "_media/"+universalDie+"/image/"+rnd+""+universalDie+".png"; //muda as fotos
          console.log("universalDie:"+dadoN);
          document.getElementById('slide').classList.add('image'); //inicia a animação
          if (cont == 11) {
            document.getElementById('slide').classList.remove('image');//remove a animação
            cont = 0;
            slideimages = 0;
            return;
          }else{
            cont++;
            setTimeout("slideit()", 200); //volta a função
          }
        }

      </script>

    </div>


</div>
<!--botão dos --- na vertical-->
<font color="white">
<div id="main">

  <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; Dado </span>

</div>
</font>

<script>
function openNav() {
  document.getElementById("mySidenav").style.width = "250px";
  document.getElementById("main").style.marginLeft = "250px";
  document.body.style.backgroundColor = "rgba(0,0,0,0.4)";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
  document.getElementById("main").style.marginLeft= "0";
  document.body.style.backgroundColor = "white";
}
</script>
   <!-- Acaba menu lateral -->

<p>
<br> <p>
<div class="container text-light">
	
		<?php
			if ($link->connect_errno) {
	   		echo "Failed to connect to MySQL: (" . $link->connect_errno . ") " . $link->connect_error;
			}
		?>

		<div class="row justify-content-center my-3 mx-3" align="center">
			
			<p class="display-4"> Meus Personagens </p>

		</div>

		<form method="POST" action="perfil.php">

			<div class="form-group">

				<div class="row my-3 justify-content-center">

					<div class="col-12 col-lg-3 my-2">

						<center> <p class="h5"> Pesquisar ficha por nome: </p> </center>

					</div>
			
					<div class="col-12 col-lg-3 my-2">

						<input class="form-control" type=text name=procura style="color: black">

					</div>

					<div class="col-12 col-lg-3 my-2">
						
						<center> <button class="btn btn-light" type=submit> Pesquisar </button> </center>

					</div>

				</div>

			</div>

		</form>

		<p class="h2">Personagens:</p>

		<?php

			$procura = $_POST["procura"];

			if ($procura != ""){
			$resposta = mysqli_query($link,"SELECT * FROM ficha WHERE ficha.nome_pj = '$procura' AND ficha.id_usuario = '".$_SESSION['id_usuario']."'");
			while ($row=mysqli_fetch_assoc($resposta)) {
				echo "
					<p class='h4'> <a href='visualizar.php?id_ficha=". $row["id_ficha"] . "'> ". $row["nome_pj"] ." </a> </p>";
			}}
			else{
				$resposta = mysqli_query($link,"SELECT * FROM ficha WHERE ficha.id_usuario = '".$_SESSION['id_usuario']."'");
				while ($row=mysqli_fetch_assoc($resposta)) {
				echo "
					<p class='h4'> <a href='visualizar.php?id_ficha=". $row["id_ficha"] . "'> ". $row["nome_pj"] ." </a> </p>";
			}
		}

		?>
	
		<hr align="center" width="200" size="1" color="#fff">
	<form action="criar_ficha.php">

		<div class="form-group">
			
			<div class="row justify-content-center">

				    <button class="btn btn-light" type="submit"> Criar ficha </button>

			</form>

		</div>

	</form>

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