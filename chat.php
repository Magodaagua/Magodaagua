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

<?php

	$db = mysqli_connect('localhost', 'root', '', 'bentotec');
	mysqli_select_db($db, 'bentotec');

?>

<?php

$cont = 0;

if (isset($_POST["mesa"])) {
	$_SESSION['mesa'] = $_POST["mesa"];
}
//expulsar o jogador
if (isset($_POST["expulsar"])) {
	$busca = mysqli_query($db, "SELECT id_usuario FROM usuarios WHERE apelido = '".$_POST['jogador']."'");
	while ($expulsar = mysqli_fetch_array($busca)) {
		$confirma = mysqli_query($db, "DELETE FROM mesasusers WHERE nomemesa = '".$_SESSION['mesa']."' AND username = '".$expulsar['id_usuario']."'");
		mysqli_query($db, "UPDATE mesas SET qtdtotal = qtdtotal-1 WHERE nomemesa = '".$_SESSION['mesa']."'");	
	}
	if ($confirma) {
		echo "<script>alert('O usuário foi expulso da mesa!');</script>";
	}
}
?>

<head>
<style>
  Body{
	background-image:url(naum.jpg);
	background-attachment:fixed;
	background-size:100%;
	background-repeat:no-repeat;
	background-color:#000;
}
	</style>
<title>Perfil</title>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="_css/perfil.css">

<!--css para a tabela ficar no canto -->
    <link type="text/css" rel="stylesheet" media="screen" href="tabela.css" />
<script>
  src="http://code.jquery.com/jquery-2.2.4.min.js"
  integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="
  crossorigin="anonymous"></script>

<script>

function submitChat() {
	if(form1.msg.value == '') {
		alert("Escreva sua mensagem!!!");
		return;
	}
	var msg = form1.msg.value;
	var xmlhttp = new XMLHttpRequest();
	
	xmlhttp.onreadystatechange = function() {
		if(xmlhttp.readyState == 4 && xmlhttp.status == 200) {
			document.getElementById('chatlogs').innerHTML = xmlhttp.responseText;
		}
	}
	
	xmlhttp.open('GET','insert.php?msg='+msg,true);
	xmlhttp.send();

}

$(document).ready(function(e){
	$.ajaxSetup({
		cache: false
	});
	setInterval( function(){ $('#chatlogs').load('logs.php'); }, 2000 );
});

</script>

<!--dado funciona (roda) -->
<link rel="stylesheet" type="text/css" href="../_css/dados.css">

<script type="text/javascript">
    var cont = 0;
    var slideimages = new Array() // cria novo array para carregar as imagens

  </script>



</head>
<!--<body background="C:\xampp\htdocs\Imagens\Fundo.jpg" bgproperties="fixed">-->
<body>
	<!-- INÍCIO DO NAVEGADOR. Navbar que fica em cima de todas as páginas para acesso rápido de outras partes do site -->
	<?php 
  		require("menusuperior2.php");
	?>
	<!--final do navegador-->
<br> <br> <br>
<div class="container text-light">
<center>
<h2>
	<?php 

		$select_dono = mysqli_query($db, "SELECT * FROM mesas WHERE nomemesa = '".$_SESSION['mesa']."'");//seleciona tudo da mesa que o usuário estiver no momento
		while ($exibe = mysqli_fetch_array($select_dono)) {
			$select_username = mysqli_query($db, "SELECT * FROM usuarios WHERE id_usuario = '".$exibe['dono']."'"); //pega o nome do dono quando o ID for igual ao ID do dono da sala
			while ($exibe2 = mysqli_fetch_array($select_username)) {
				 $_SESSION['nome_dono'] = $exibe2['apelido'];
			}

		}

		echo "Jogadores dessa mesa: <br>";

		$select_dono2 = mysqli_query($db, "SELECT dono FROM mesas WHERE nomemesa = '".$_SESSION['mesa']."'");
		while ($confere = mysqli_fetch_array($select_dono2)) {
			$_SESSION['id_dono'] = $confere['dono'];
		}

		$select_jogadores = mysqli_query($db, "SELECT * FROM mesasusers WHERE nomemesa = '".$_SESSION['mesa']."'");//seleciona tudo da mesa que o usuário estiver no momento

		while ($exibe3 = mysqli_fetch_array($select_jogadores)) {
			$select_username2 = mysqli_query($db, "SELECT apelido FROM usuarios WHERE id_usuario = '".$exibe3['username']."' AND id_usuario !='".$_SESSION['id_dono']."'");//pega o nome dos IDs que estiver na mesa exceto o do dono
			while ($exibe4 = mysqli_fetch_array($select_username2)) {
				if ($_SESSION['id_usuario'] == $_SESSION['id_dono']) {// se o dono for o usuário, ele poderá expulsar
					echo "<form action='chat.php' method='POST'><input type='text' name='jogador' value='".$exibe4['apelido']."' readonly><input type='submit' name='expulsar' value='Expulsar'></form>";
				}else{//senao o usuário não pode expulsar
					echo "<form action='chat.php' method='POST'><input type='text' name='jogador' value='".$exibe4['apelido']."' readonly></form>";
				}
			}
		}
	?>
	</h2>
</center>

<div id="conteudo-left">
<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 95%;
  float:left;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

</style>

<table >
  <tr>
    <th> <h2> <center> Dados </h2> </center> </th>
  <tr>

    <td>

<div class="container text-light">
	<!--
		<?php
			if ($link->connect_errno) {
	   		echo "Failed to connect to MySQL: (" . $link->connect_errno . ") " . $link->connect_error;
			}
		?>
-->

		<form id="ladosDado" method="get">

			<div class="row justify-content-center my-3 mx-3">
			
				<div class="col-5 col-md-4">
					
					<label for="nLados"> <h5> Número de lados </label> </h5>
					<select class="form-control mb-2" id="lados" type='number' name='nLados' width="300px" height="300px">
						<option value="4">D4</option>
						<option value="6">D6</option>
						<option value="8">D8</option>
						<option value="10">D10</option>
						<option value="12">D12</option>
						<option value="20">D20</option>
					</select>

				</div>

				<div class="col-5 col-md-4">
					
					<label for="nDados"> <h5>  Número de dados </label> </h5>
					<input type="number" class="form-control mb-2" id="dados" onchange="baseDados()" name="nDados" value="1" min="1" width="300px" height="300px">

				</div>

				<div class="col-5 col-md-4">
					
					<label for="mod"> <h5> Modificador</label> </h5><br>
					<input type="number" class="form-control mb-2" id="mod"  onchange="baseMod()" value="0" name="mod" width="300px" height="300px">

				</div>

			</div>
			
		</form>

		<div class="row justify-content-center my-3 mx-3">
			 
			<button class="btn btn-light" onclick="jogarDado()">Rodar</button> &nbsp; &nbsp;

			<!--<button class="btn btn-light" onclick="resetar()">Apagar Resultado</button>
-->
		</div>
		

		<div class="row justify-content-center my-3 mx-3" id="placeholder">

		</div>

		<div class="row justify-content-center">
			
			<div class="col-12">

				<p class="display-4" id="resultado"></p>

			</div>
			
		</div>
	</div>

<!-- função de resetar com javascript 
<script type="text/javascript">
document.getElementById('dados').reset();
</script>
-->
<!-- dados -->
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
			colFirst.className = "col-6 col-md-4";

			var imgFirst = document.createElement("img");
			imgFirst.src = "../_media/dados/" + primeiroDado + "d" + lados + ".png";
			imgFirst.className = "img-fluid";

			colFirst.appendChild(imgFirst);
			placeholder.appendChild(colFirst);

			soma = primeiroDado;

			for (var i = dados - 2; i >= 0; i--) {

				var rnd = Math.floor(Math.random() * lados)+1; //gera um número aleatório de acordo com a quantidade de imagens

				var col = document.createElement("div");
				col.className = "col-6 col-md-4";

				var img = document.createElement("img");
				img.src = "../_media/dados/" + rnd + "d" + lados + ".png";
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
    </td><!--
    <tr>
    <th> <h2> <center> Fichas </h2> </center> </th>
  <tr>
    <td>
    		<div class="container text-light">
	

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
					<p class='h4'> <a href='../visualizar.php?id_ficha=". $row["id_ficha"] . "'> ". $row["nome_pj"] ." </a> </p>";
			}}
			else{
				$resposta = mysqli_query($link,"SELECT * FROM ficha WHERE ficha.id_usuario = '".$_SESSION['id_usuario']."'");
				while ($row=mysqli_fetch_assoc($resposta)) {
				echo "
					<p class='h4'> <a href='../visualizar.php?id_ficha=". $row["id_ficha"] . "'> ". $row["nome_pj"] ." </a> </p>";
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
    </td>-->
	</tr>
	</table>
	</div>

	<div id="conteudo-right">
	<h5>
	<?php 
	if ($_SESSION['id_usuario'] == $_SESSION['id_dono']) {
		echo "Deseja convidar alguém? (Digite o apelido)<form action='convite.php' method='POST'><input type='text' name='convidado'><input type='submit' value='Convidar'></form>";
	}

				?>
						<form name="form1">
							<b><?php echo "Mesa: ".$_SESSION['mesa']."<br>Dono: ". $_SESSION['nome_dono']; ?></b> <br />
							<br />
							<textarea name="msg"></textarea><br />
							<a href="#" onclick="submitChat()" class="btn  btn-light">Enviar</a><br /><br />
							<a href="index.php" class="btn  btn-light">Voltar</a><br /><br />
							<a href="logout.php" class="btn  btn-light">Logout</a><br /><br />
							</form>
							<form action="index_jogador.php" method="POST"><input type="submit" name="sair_mesa" value="Sair da mesa" class="btn  btn-light"></form><br>
							<div id="chatlogs">
							Carregando Chat...
						</h5>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>