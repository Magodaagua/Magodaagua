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
	background-image:url(_imagensdosite/slacara.jpg);
	background-attachment:fixed;
	background-size:100%;
	background-repeat:no-repeat;
	background-color:#000;
}
	</style>
	<link rel="icon" type="png" href="_imagensdosite/icon.png">
	<title>Dados</title>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
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
<p>  <br> <br> 
<div class="container text-light">
	
		<?php
			if ($link->connect_errno) {
	   		echo "Failed to connect to MySQL: (" . $link->connect_errno . ") " . $link->connect_error;
			}
		?>

		<div class="row justify-content-center mt-3 my-3 mx-3" align="center">
			
			<p class="display-4"> Dados Múltiplos </p>

		</div>

		<div class="row justify-content-center mx-3">
			
			<form method="POST" action="dados.php">

				<button type="submit" class="btn btn-light mx-3 mb-2">Dado único</button>

			</form>

		</div>

		<form id="ladosDado" method="get">

			<div class="row justify-content-center my-3 mx-3">
			
				<div class="col-4 col-md-2">
					
					<label for="nLados"> Número de lados </label>
					<select class="form-control mb-2" id="lados" type='number' name='nLados' width="300px" height="300px">
						<option value="4">D4</option>
						<option value="6">D6</option>
						<option value="8">D8</option>
						<option value="10">D10</option>
						<option value="12">D12</option>
						<option value="20">D20</option>
					</select>

				</div>

				<div class="col-4 col-md-2">
					
					<label for="nDados"> Número de dados </label>
					<input type="number" class="form-control mb-2" id="dados" onchange="baseDados()" name="nDados" value="1" min="1">

				</div>

				<div class="col-4 col-md-2">
					
					<label for="mod"> Modificador</label>
					<input type="number" class="form-control mb-2" id="mod"  onchange="baseMod()" value="0" name="mod">

				</div>

			</div>
			
		</form>

		<div class="row justify-content-center my-3 mx-3">
			 
			<button class="btn btn-light" onclick="jogarDado()">Rodar</button>

		</div>

		<div class="row justify-content-center my-3 mx-3" id="placeholder">

		</div>

		<div class="row justify-content-center">
			
			<div class="col-12">

				<p class="display-4" id="resultado"></p>

			</div>
			
		</div>
	</div>
	<script type="text/javascript">
		var resultado = [];
		var soma;

		function baseDados(){
			var dados = document.getElementById('dados');
			if (dados.value <= 0){
				dados.value = "1";
			}else if (dados.value >= 100) {
				dados.value = "100";
			} 
		}

		function baseMod(){
			var mod = document.getElementById('mod');
			if (mod.value == 0){
				mod.value = "0";
			} 
		}

		function jogarDado(){

			var lados = document.getElementById('lados').value;
			var dados = document.getElementById('dados').value;
			var mod = document.getElementById('mod').value;

			var placeholder = document.getElementById('placeholder');
			placeholder.innerHTML = "";

			primeiroDado = Math.floor(Math.random() * lados) + 1;

			var colFirst = document.createElement("div");
			colFirst.className = "col-4 col-md-2";

			var imgFirst = document.createElement("img");
			imgFirst.src = "_media/dados/" + primeiroDado + "d" + lados + ".png";
			imgFirst.className = "img-fluid";

			colFirst.appendChild(imgFirst);
			placeholder.appendChild(colFirst);

			soma = primeiroDado;

			for (var i = dados - 2; i >= 0; i--) {

				var rnd = Math.floor(Math.random() * lados)+1; //gera um número aleatório de acordo com a quantidade de imagens

				var col = document.createElement("div");
				col.className = "col-4 col-md-2";

				var img = document.createElement("img");
				img.src = "_media/dados/" + rnd + "d" + lados + ".png";
				img.className = "img-fluid";

				soma = soma + rnd;
				col.appendChild(img);
				placeholder.appendChild(col);
				
			}

			somaMod = soma + parseInt(mod * dados);

			var pResultado = document.getElementById("resultado");

			if (parseInt(mod) == 0) {
				pResultado.style.color= "#000000";
				pResultado.innerHTML = "<center>Total: " + soma;
			} else{
				pResultado.style.color= "#000000";
			pResultado.innerHTML = "<center>Total (sem mod): " + soma + "<br>Total (com mod): " + somaMod;
			}

			
		}

	</script>
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