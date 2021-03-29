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
  <!-- Inicio do menu lateral -->
  <?php 
    require("DadosLaterais.php");
  ?>
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