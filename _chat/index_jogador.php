<!DOCTYPE html>
<html lang="pt-br">

<?php

	session_start();
	if (!isset($_SESSION['email']) || !isset($_SESSION['senha'])) {
		header("Location: ./login.html");
		exit;
	}

?>

<?php

	$db = mysqli_connect('localhost', 'root', '', 'bentotec');
	mysqli_select_db($db, 'bentotec');

?>

<head>
<style>
  Body{
  background-image:url(naum.jpg);
  background-size:100% 250%;
  background-repeat:no-repeat;
  background-color:#000;
}
  </style>
	<link rel="icon" type="png" href="_media\icon.png">
	<title>Navegador de mesas</title>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../_css/perfil.css">

<!--dado funciona (roda) -->
<link rel="stylesheet" type="text/css" href="../_css/dados.css">

<script type="text/javascript">
    var cont = 0;
    var slideimages = new Array() // cria novo array para carregar as imagens

  </script>

</head>

<body>
		
	<!-- INÍCIO DO NAVEGADOR. Navbar que fica em cima de todas as páginas para acesso rápido de outras partes do site -->
	<nav class="navbar navbar-expand-lg navbar-dark">

	      <div class="container">
	       <!-- <a class="navbar-brand mr-auto mr-lg-0" href="../menu.php">RPG Móvel</a>
-->
<nav class="navbar navbar-expand-lg fixed-top navbar-dark bg-dark">

<a class="navbar-brand mr-auto mr-lg-0" href="../menu.php">RPG Móvel</a>

	        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#mynavbar">
	          <span class="navbar-toggler-icon"></span>
	        </button>

	        <div class="collapse navbar-collapse" id="mynavbar">

	          <ul class="navbar-nav mr-auto">

	            <li class="nav-iten">
	              <a class="nav-link" href="../perfil.php">Meus personagens</a>
	            </li>
	            <li class="nav-iten">
	              <a class="nav-link" href="../dados.php">Dados</a>
	            </li>
	                          <li class="nav-iten">
                <a class="nav-link" href="index.php"> <font color="red"> Mesas </font></a>
              </li>
				<li class="nav-iten">
	              <a class="nav-link" href="../Pdf.php">Loja</a>
	            </li>
				<li class="nav-iten">
	              <a class="nav-link" href="../Fale2.php">Fale Conosco</a>
	            </li>
				<li class="nav-iten">
	              <a class="nav-link" href="../assinatura2.php"> VIP </a>
	            </li>
	            <li class="nav-iten">
		          <a class="nav-link" href="#" data-toggle="modal" data-target="#sairModal">Sair da conta</a>
		        </li>
	          </ul>

	        </div>

	      </div>

	</nav>
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
	        <a class="btn btn-primary" href="../logout.php"> Sair da conta </a>

	      </div>

	    </div>

	  </div>

	</div>
	<!-- Fim modal para sair -->

<br> <p>

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
  top: -1;
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
<div id="mySidenav" class="sidenav">
   <center> <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a></center>
 <font color="white">  

<!--dados-->

    
<div class="row justify-content-center mt-3 my-3 mx-3" align="center">

      <p class="display-4"> Dado </p>
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
      <img src="../_media/d4/image/1d4.png" class="img" onclick="slideit()" id="slide" width="200px" height="200px" />
      
      <script type="text/javascript">
        var universalDie = "d4";
        var dadoN = 4;
        function mudarDado(){
          var lados = document.getElementById('lados').value;

          document.getElementById("slide").src = "../_media/d"+lados+"../image/1d"+lados+".png";
          universalDie = "d"+ lados;
          dadoN = Number(lados);
        }

        function slideit(){
          var rnd = Math.floor(Math.random() * dadoN) + 1; //gera um número aleatório de acordo com a quantidade de imagens
          document.getElementById('slide').src = "../_media/"+universalDie+"../image/"+rnd+""+universalDie+".png"; //muda as fotos
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

	<div class="container text-light">
		
		<form method="POST" action="index_jogador.php">

			<div class="row my-3 justify-content-center">

				<div class="col-12 col-lg-4 my-2">

					<center> <p class="h5"> Pesquisar mesa: </p> </center>

				</div>
				
				<div class="col-12 col-lg-3 my-2">

					<input class="form-control" type="text" name="procura" style="color: black">

				</div>

				<div class="col-12 col-lg-3 my-2">
							
					<center>  <button class="btn  btn-light" type="submit" value="procura"> Pesquisar  </center>

				</div>

			</div>

		</form>

		<!-- MESAS -->

		<p class="h2">Mesas:</p>
		<div class="form-group">

			<?php

				//sair da mesa
				if (isset($_POST['sair_mesa'])) {
					$select = mysqli_query($db, "SELECT * FROM mesas WHERE nomemesa = '".$_SESSION['mesa']."'");
					while ($do = mysqli_fetch_array($select)) {
						if ($do['dono'] == $_SESSION['id_usuario']) { //se o usuario for o dono, não pode sair da mesa
							echo "<script>alert('Você é o dono dessa mesa, por isso não pode deixá-la!');</script>";
						}else{
							mysqli_query($db, "DELETE FROM mesasusers WHERE nomemesa = '".$_SESSION['mesa']."' AND username = '".$_SESSION['id_usuario']."'");
							mysqli_query($db, "UPDATE mesas SET qtdtotal = qtdtotal-1 WHERE nomemesa = '".$_SESSION['mesa']."'");
							echo "<script>location.href='index_jogador.php';</script>";
						}
					}
				}

		        if (isset($_POST['procura'])) {
				$procura = $_POST['procura'];
				
				if ($procura != NULL) {

				$listar = mysqli_query($db, "SELECT * FROM mesas WHERE nomemesa LIKE '%".$procura."%' ");

				if ($listar != NULL) {

					while ($mostrar = mysqli_fetch_array($listar)) {
						
						if (strtolower($mostrar['nomemesa']) == strtolower($procura)) {
							
							echo "<form action='participar_mesa.php' method='POST'>".$mostrar['nomemesa']."<input type='hidden' name='mesa' value='".$mostrar['nomemesa']."' readonly>-----".$mostrar['qtdtotal']."/".$mostrar['qtdmax']."     <input type='submit' name='participar_mesa' value='Participar'></form><br>";

						}

					}//lista todas as mesas
        				}
				}else{

                    $listar = mysqli_query("SELECT * FROM mesas ORDER BY nomemesa DESC");
					while ($mostrar = mysqli_fetch_array($listar)) {
						echo "<form action='participar_mesa.php' method='POST'>".$mostrar['nomemesa']."<input type='hidden' name='mesa' value='".$mostrar['nomemesa']."' readonly>-----".$mostrar['qtdtotal']."/".$mostrar['qtdmax']."     <input type='submit' name='participar_mesa' value='Participar'></form><br>";
					}//lista todas as mesas
				}
		    }
			?>

			<a href="index.php">Voltar</a><br>

		</div>

	</div>

	<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

</body>

</html>