<!DOCTYPE html>
<html lang="pt-br">

<!-- Conexão com o banco de dados -->
<?php

	error_reporting(0);
	ini_set("display_errors", 0 );
	
	$db = mysqli_connect('localhost', 'root', '', 'bentotec');
	mysqli_select_db($db, 'bentotec');
	
?>

<!-- Início da sessão e confirmação de que o usuário está logado -->
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
  background-image:url(naum.jpg);
  background-size:110% 100%;
  background-repeat:no-repeat;
  background-color:#000;
}
  </style>

	<link rel="icon" type="png" href="../_imagensdosite/icon.png">
	<title>Mesas</title>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../_css/index_chat.css">


<!--dado funciona (roda) -->
<link rel="stylesheet" type="text/css" href="../_css/dados.css">

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

<br> <p>

<!-- Inicio do menu lateral -->
	<?php
		require("DadosLaterais.php");
	?>
   <!-- Acaba menu lateral -->

	<!-- Modal para criar mesa -->
	<div class="modal fade" id="criarModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
 <font color="black">
	  <div class="modal-dialog" role="document">

	    <div class="modal-content">

	      <div class="modal-header">

	        <h5 class="modal-title" id="exampleModalLabel">Criar uma nova mesa</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>

	      </div>

	      <form action="index.php" method="POST">
	      
	      <div class="modal-body">
	      	
	      	<div class="form-group">

	      		Nome da mesa: <input type="text" class="form-control" name="nome_mesa" required="true">

	      		Senha (opcional): <input type="text" class="form-control" name="senha">

	      		<center>Quantidade de jogadores: <div class="col-4"><input type="number" class="form-control" name="qtd" min="2" max="10" required="true"></div> </center>
</font>
	      	</div>

	      </div>

	      <div class="modal-footer">

	        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
	        <button class="btn btn-primary" name="criar_mesa" type="submit"> Criar mesa </button>

	      </div>

	      </form>

	    </div>

	  </div>

	</div>
	<!-- Fim do modal para criar mesa -->
	<?php

		if (isset($_POST['criar_mesa'])) {

			$nome_mesa = $_POST["nome_mesa"];
			$qtd = $_POST["qtd"];
			$senha = $_POST["senha"];

			$verifica = mysqli_query($db, "SELECT nomemesa, dono FROM mesas WHERE nomemesa = '$nome_mesa' ");

			if(mysqli_num_rows($verifica)){
				echo "<script>alert('Já existe uma mesa com o nome $nome_mesa, escolha outro nome!')</script>";
			}//verifica se a mesa existe
			else {
				if (isset($senha)) {		
					mysqli_query($db, "INSERT INTO mesas (nomemesa, qtdmax, qtdtotal, dono, senha) VALUES ('".$nome_mesa."', '".$qtd."', '1', '".$_SESSION['id_usuario']."', '".$senha."')");
					mysqli_query($db, "INSERT INTO mesasusers (nomemesa, username) VALUES ('".$nome_mesa."', '".$_SESSION['id_usuario']."')");
				}else{
					mysqli_query($db, "INSERT INTO mesas (nomemesa, qtdmax, qtdtotal, dono) VALUES ('".$nome_mesa."', '".$qtd."', '1', '".$_SESSION['id_usuario']."')");
					mysqli_query($db, "INSERT INTO mesasusers (nomemesa, username) VALUES ('".$nome_mesa."', '".$_SESSION['id_usuario']."')");
				}
			}//se não existir, ele cria a mesa, e o mestre já está participando dela
		}

	?>
	<!-- FIM DO NAVEGADOR -->
<br>
	<div class="container text-light">

		<div class="row justify-content-center my-3 mx-3" align="center">

			<p class="display-4"> Mesas Que Participo </p>

		</div>

		<form method="POST" action="index.php">

			<div class="row my-3 justify-content-center">

				<div class="col-12 col-lg-4 my-2">

					<center> <p class="h5"> Pesquisar mesa que participo: </p> </center>

				</div>
				
				<div class="col-12 col-lg-3 my-2">

					<input class="form-control" type=text name=procura style="color: black">

				</div>

				<div class="col-12 col-lg-3 my-2">
							
					<center> <button class="btn  btn-light" type=submit> Pesquisar </button> </center>

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

			$procura = $_POST["procura"];
			$buscar = mysqli_query($db, "SELECT * FROM mesasusers");

			if ($procura != ""){
				while ($mostrar2 = mysqli_fetch_array($buscar)) {
					
					if ($mostrar2['username'] == $_SESSION['id_usuario'] &&  strtolower($mostrar2['nomemesa']) == strtolower($procura)) {
						echo "<form action='chat.php' method='POST'> <p class='h4'>".$mostrar2['nomemesa']." <input class='form-control' type='hidden' name='mesa' value='".$mostrar2['nomemesa']."' readonly>     <button class='btn mx-2' type='submit' name='submit'> Entrar </button> </form></p>";
					}
				}//lista as mesas em que o usuário participa
			}
			else{
			
				while ($mostrar2 = mysqli_fetch_array($buscar)) {
					if ($mostrar2['username'] == $_SESSION['id_usuario']) {
						echo "<form action='chat.php' method='POST'> <p class='h4'>".$mostrar2['nomemesa']." <input class='form-control' type='hidden' name='mesa' value='".$mostrar2['nomemesa']."' readonly>     <button class='btn mx-2' type='submit' name='submit'> Entrar </button> </form></p>";
					}
				}//lista as mesas em que o usuário participa
			}

		?>
		</div>
		<hr align="center" width="200" size="1" color="#fff">
		<div class="row justify-content-center my-3 mx-3" align="center">

			<div class="col-12">

				<a href="#" class="btn btn-light"  data-toggle="modal" data-target="#criarModal"> Criar mesa </a>

			</div>

			<div class="col-12 my-3">
				
				<form action="index_jogador.php">

					<button class="btn btn-light" type="submit" name="" > Jogador </button>

				</form>

			</div>

			<div class="col-12">
				
				<form action="caixa_de_entrada.php">
					<button class="btn  btn-light" type="submit" name="" value="Caixa de entrada"> Caixa de entrada </button>
				</form>

			</div>

		</div>

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
