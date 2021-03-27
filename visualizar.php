<!DOCTYPE html>
<html lang="pt-br">
<?php
	error_reporting(0);
	ini_set(“display_errors”, 0 );

	$link = mysqli_connect('localhost', 'root', '', 'bentotec');

	$db = mysqli_select_db($link, 'bentotec');
?>

<head>
<style>
  Body{
	background-image:url(sla.jpg);
	background-attachment:fixed;
	background-size:100%;
	background-repeat:no-repeat;
	background-color:#000;
}
	</style>
	<link rel="icon" type="png" href="_media\icon.png">
	<title>Ficha</title>

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

<body>
	<?php
		if ($link->connect_errno) {
	   		echo "Failed to connect to MySQL: (" . $link->connect_errno . ") " . $link->connect_error;
		}
	?>

	<?php
		$oi = $_GET["id_ficha"];
		$ficha = mysqli_query($link,"SELECT * FROM ficha WHERE ficha.id_ficha =" . $oi);
		$row=mysqli_fetch_assoc($ficha);
		$mod_for = ($row["forca"] - 10) / 2;
		$mod_dest = ($row["destreza"] - 10) / 2;
		$mod_const = ($row["constituicao"] - 10) / 2;
		$mod_int = ($row["inteligencia"] - 10) / 2;
		$mod_car = ($row["carisma"] - 10) / 2;
		$mod_sab = ($row["sabedoria"] - 10) / 2;
	?>


	<?php
		$oi = $_GET["id_ficha"];
		$ficha = mysqli_query($link,"SELECT * FROM ficha WHERE ficha.id_ficha =" . $oi);
		$row=mysqli_fetch_assoc($ficha);
	?>

	<!-- INÍCIO DO NAVEGADOR. Navbar que fica em cima de todas as páginas para acesso rápido de outras partes do site -->
	
	<nav class="navbar-expand-lg navbar-dark">

	      <div class="container">

	       <nav class="navbar navbar-expand-lg fixed-top navbar-dark bg-dark">
	        <a class="navbar-brand mr-auto mr-lg-0" href="menu.php">RPG Móvel</a>


	        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#mynavbar">
	          <span class="navbar-toggler-icon"></span>
	        </button>

	        <div class="collapse navbar-collapse" id="mynavbar">

	          <ul class="navbar-nav mr-auto">

	            <li class="nav-iten">
	              <a class="nav-link" href="perfil.php"> <font color="red">Meus personagens </font></a>
	            </li>
	            <li class="nav-iten">
	              <a class="nav-link" href="dados.php">Dados</a>
	            </li>
	            <li class="nav-iten">
	              <a class="nav-link" href="_chat/index.php">Mesas</a>
	            </li>
	            </li>
			  <li class="nav-iten">
	              <a class="nav-link" href="Pdf.php">Loja</a>
	            </li>
				<li class="nav-iten">
	              <a class="nav-link" href="Fale2.php">Fale Conosco</a>
	            </li>
			  <li class="nav-iten">
	          <a class="nav-link" href="assinatura2.php"> VIP </a>
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
	        <a class="btn btn-primary" href="logout.php"> Sair da conta </a>

	      </div>

	    </div>

	  </div>

	</div> 
</nav>

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

	<div class='container text-light'>
<br> <p>
		<div id="test">

			<form action="editar.php?id_ficha=<?php echo$row['id_ficha']?>" method="POST">

				<div data-spy="scroll" data-target="#navbarVertical" data-offset="0" class="scrollspySite">

					<div class="col-12 text-center my-3">

		          		<h1 class="display-4"><?php echo$row["nome_pj"]?></h1>

		        	</div>

					<!-- DADOS GERAIS DO PERSONAGEM -->

					<center><p id="titulo" class="h1 my-3">Dados gerais</p></center>

					
						<div class="form-group">

							<div class="row">

								<div class="col-6 col-md-3 col-lg-3">
								
									<label for='nClasse'>Classe</label>
									<input class="form-control mb-2" value= "<?php echo$row['classe'] ?>" type='text' readonly='readonly' name='nClasse'>

								</div>

								<div class="col-6 col-md-3 col-lg-3">

									<label for='nRaca'>Raça</label>
									<input class="form-control mb-2" value= "<?php echo$row['raca'] ?>" type='text' readonly='readonly' name='nRaca'>

								</div>

								<div class="col-6 col-md-3 col-lg-3">

									<label for='nAntecedente'>Antecedente</label>
									<input class="form-control mb-2" value= "<?php echo$row['antecedente'] ?>" type='text' readonly='readonly' name='nAntecedente'>

								</div>

								<div class="col-6 col-md-3 col-lg-3">

									<label for='nTendencia'>Tendência</label>
									<input class="form-control mb-2" value= "<?php echo$row['tendencia'] ?>" type='text' name='nTendencia'>
									
								</div>

							</div>

							<div class="row">

								<div class="col-6 col-md-3 col-lg-3">

									<label for='nOlho'>Olhos</label>
									<input class="form-control mb-2" value= "<?php echo$row['olho'] ?>" type='text' name='nOlho'>
						
								</div>
								
								<div class="col-6 col-md-3 col-lg-3">

									<label for='nCabelo'>Cabelo</label>
									<input class="form-control mb-2" value= "<?php echo$row['cabelo'] ?>" type='text' name='nCabelo'>

								</div>

								<div class="col-6 col-md-3 col-lg-3">

									<label for='nPele'>Pele</label>
									<input class="form-control mb-2" value= "<?php echo$row['pele'] ?>" type='text' name='nPele'>

								</div>

								<div class="col-6 col-md-3 col-lg-3">

									<label for='nIdade'>Idade</label>
									<input class="form-control mb-2" value= "<?php echo$row['idade'] ?>" type='text' name='nIdade'>

								</div>

							</div>

							<div class="row justify-content-center">

								<div class="col-6 col-md-3 col-lg-2">
									<label for='nPeso'>Peso</label>
									<input class="form-control mb-2" value= "<?php echo$row['peso'] ?>" type='text' name='nPeso'>
								</div>
								
								<div class="col-6 col-md-3 col-lg-2">

									<label for='nAltura'>Altura</label>
									<input class="form-control mb-2" value= "<?php echo$row['altura'] ?>" type='text' name='nAltura'>
									
								</div>

								<div class="col-6 col-md-3 col-lg-2">

									<label for='expEd'>Pontos de exp.</label>
									<input class="form-control mb-2" value= "<?php echo$row['exp'] ?>" type='text' name='expEd'>

								</div>

								<div class="col-6 col-md-3 col-lg-2">

									<label for='nNivel'>Nível</label>
									<input class="form-control mb-2" value= "<?php echo$row['nivel'] ?>" readonly='readonly' name='nNivel'>
									
								</div>

							</div>

						</div>

					<!-- Pontos de vida -->

					<div class="form-group">

						<div class="row justify-content-center my-5">
							
							<div class="col-6 col-md-3 col-lg-2">
								<label for='nVida'>PV Total</label>
								<input class="form-control mb-2" value= "<?php echo$row['pontos_vida'] ?>" type='text' name='nVida'>
							</div>

							<div class="col-6 col-md-3 col-lg-2">
								<label for='nVida_atual'>PV Atual</label>
								<input class="form-control mb-2" value= "<?php echo$row['pontos_vida_atual'] ?>" type='text' name='nVida_atual'>
							</div>

							<div class="col-6 col-md-3 col-lg-2">
								<label for='nVida_temp' id="pv_temp">PV Temp</label>
								<input class="form-control mb-2" value= "<?php echo$row['pontos_vida_temp'] ?>" type='text' name='nVida_temp'>
							</div>

							<div class="col-6 col-md-3 col-lg-2">
								<label for='nDado_vida'>Dado de Vida</label>
								<input class="form-control mb-2" value= "<?php echo$row['dado_vida'] ?>" type='text' readonly='readonly' name='nDado_vida'>
							</div>

						</div>

						<div class="row justify-content-center my-5">

							<div class="col-6 col-md-3 col-lg-2">
								<label for='nDado_vida'>Armadura</label>
								<input class="form-control mb-2" value= "<?php echo$row['ca'] ?>" type='text' name='nCA'>
							</div>

							<div class="col-6 col-md-3 col-lg-2">
								<label for='nIniciativa'>Iniciativa</label>
								<input class="form-control mb-2" value= "<?php echo$row['iniciativa'] ?>" type='text' readonly='readonly' name='nIniciativa'>
							</div>

							<div class="col-6 col-md-3 col-lg-2">
								<label for='nDeslocamento'>Deslocamento</label>
								<input class="form-control mb-2" value= "<?php echo$row['deslocamento'] ?>" type='text' name='nDeslocamento'>
							</div>

							<div class="col-6 col-md-3 col-lg-2">
								<label for='Proficiência'>Proficiência</label>
								<input class="form-control mb-2" value= "<?php echo$row['proficiencia'] ?>" type='text' readonly='readonly' name='nProficiencia'>
							</div>

							<div class="col-6 col-md-3 col-lg-2">
								<label for='select_insp'>Inspiração</label>
								<select class="form-control" name="select_insp">
									<option value="Não inspirado" <?php if ($row[inspiracao] == 'Não inspirado') echo ' selected="selected"'; ?>>Não inspirado</option>
									<option value="Inspirado" <?php if ($row[inspiracao] == 'Inspirado') echo ' selected="selected"'; ?>>Inspirado</option>
								</select>
							</div>

						</div>

					</div>

					<!-- FIM DOS DADOS GERAIS -->

					<!-- ATRIBUTOS -->

					<center><p class="h1 my-3">Atributos</p></center>


					<div class='form-group'>

						<div class="row justify-content-around">

							<div class="col-12 col-md-3 col-lg-3 justify-content-center">

								<div class="row justify-content-center mt-3">
									
									<p class="h3 mx-3">Atributo</p>

								</div>

								<div class="row justify-content-center">

									<div class="col-6 col-md-7">
										
										<label for='nForca'>Força</label>
										<input class="form-control" value= "<?php echo$row['forca'] ?>" type='text' name='nForca'>

									</div>

									<div class="col-6 col-md-7">
										
										<label for='nConstituicao'>Constituição</label>
										<input class="form-control" value= "<?php echo$row['constituicao'] ?>" type='text' name='nConstituicao'>

									</div>

								</div>

								<div class="row justify-content-center">
									
									<div class="col-6 col-md-7">
										
										<label for='nDestreza'>Destreza</label>
										<input class="form-control" value= "<?php echo$row['destreza'] ?>" type='text' name='nDestreza'>

									</div>
									
									<div class="col-6 col-md-7">
										
										<label for='nInteligencia'>Inteligência</label>
										<input class="form-control" value= "<?php echo$row['inteligencia'] ?>"  type='text' name='nInteligencia'>

									</div>

								</div>

								<div class="row justify-content-center">
									
									<div class="col-6 col-md-7">
										
										<label for='nSabedoria'>Sabedoria</label>
										<input class="form-control" value= "<?php echo$row['sabedoria'] ?>" type='text' name='nSabedoria'>

									</div>
									

									<div class="col-6 col-md-7">
										
										<label for='nCarisma'>Carisma</label>
										<input class="form-control" value= "<?php echo$row['carisma'] ?>" type='text' name='nCarisma'>

									</div>
									

								</div>

							</div>

							<div class="col-12 col-md-3 col-lg-3 justify-content-center">

								<div class="row justify-content-center mt-3">
									
									<p class="h3 mx-3">Modificador</p>

								</div>

								<div class="row justify-content-center">

									<div class="col-6 col-md-7">
										
										<label for='nModForca'>mod. for</label>
										<input class="form-control" value='<?php echo floor($mod_for) ?>' readonly='readonly' type='text' name='nModForca'>

									</div>

									<div class="col-6 col-md-7">
										
										<label for='nModConstituicao'>mod. con</label>
										<input class="form-control" value='<?php echo floor($mod_const) ?>' readonly='readonly' type='text' name='nModConstituicao'>

									</div>

								</div>

								<div class="row justify-content-center">
									
									<div class="col-6 col-md-7">
										
										<label for='nModDestreza'>mod. des</label>
										<input class="form-control" value='<?php echo floor($mod_dest) ?>' readonly='readonly' type='text' name='nModDestreza'>

									</div>
									
									<div class="col-6 col-md-7">
										
										<label for='nModInteligencia'>mod. int</label>
										<input class="form-control" value='<?php echo floor($mod_int) ?>' readonly='readonly' type='text' name='nModInteligencia'>

									</div>

								</div>

								<div class="row justify-content-center">
									
									<div class="col-6 col-md-7">
										
										<label for='nModSabedoria'>mod. sab</label>
										<input class="form-control" value='<?php echo floor($mod_sab) ?>' readonly='readonly' type='text' name='nModSabedoria'>

									</div>

									<div class="col-6 col-md-7">
										
										<label for='nModCarisma'>mod. car</label>
										<input class="form-control" value='<?php echo floor($mod_car) ?>' readonly='readonly' type='text' name='nModCarisma'>

									</div>
									

								</div>

							</div>

							<div class="col-12 col-md-3 col-lg-3 justify-content-center">

								<div class="row justify-content-center mt-3">
									
									<p class="h3 mx-3">Resistência</p>

								</div>

								<div class="row justify-content-center">

									<div class="col-6 col-md-7">
										
										<label for="nResist_for">Força</label>
										<input class="form-control" value= "<?php echo$row['resist_for'] ?>" type='text' readonly='readonly' name='nResist_for'>

									</div>

									<div class="col-6 col-md-7">

										<label for="nResist_const">Constituição</label>
										<input class="form-control" value= "<?php echo$row['resist_const'] ?>" type='text' readonly='readonly' name='nResist_const'>

									</div>

								</div>

								<div class="row justify-content-center">
									
									<div class="col-6 col-md-7">
										
										<label for="nResist_dest">Destreza</label>
										<input class="form-control" value= "<?php echo$row['resist_dest'] ?>" type='text' readonly='readonly' name='nResist_dest'>

									</div>
									
									<div class="col-6 col-md-7">
										
										<label for="nResist_int">Inteligência</label>
										<input class="form-control" value= "<?php echo$row['resist_int'] ?>" type='text' readonly='readonly' name='nResist_int'>

									</div>

								</div>

								<div class="row justify-content-center mb-5">
									
									<div class="col-6 col-md-7">
										
										<label for="nResist_sab">Sabedoria</label>
										<input class="form-control" value= "<?php echo$row['resist_sab'] ?>" type='text' readonly='readonly' name='nResist_sab'>

									</div>

									<div class="col-6 col-md-7">
										
										<label for="nResist_car">Carisma</label>
										<input class="form-control" value= "<?php echo$row['resist_car'] ?>" type='text' readonly='readonly' name='nResist_car'>

									</div>
									

								</div>

							</div>

						</div>


					</div>


					<!-- FIM DOS ATRIBUTOS -->

					<!-- BACKGROUND -->

					<center><p class="h1 my-3">Background do personagem</p></center>

					<div class="form-group">

						<div class="row justify-content-center my-3">

							<div class="col-10">

								<p class="h4 my-3 text-center">Traços do personagem</p>
								<textarea class="form-control" maxlength="2000" rows="10"  name="nTracos" ><?php echo$row['tracos'] ?></textarea>

							</div>

						</div>

						<div class="row justify-content-center my-3">

							<div class="col-10">

								<p class="h4 my-3 text-center">Ideais</p>
								<textarea class="form-control" maxlength="2000" rows="10" name="nIdeais" ><?php echo$row['ideais'] ?></textarea>
								
							</div>

						</div>
						
						<div class="row justify-content-center my-3">

							<div class="col-10">

								<p class="h4 my-3 text-center">Ligações</p>
								<textarea class="form-control" maxlength="2000" rows="10"  name="nLigacoes" ><?php echo$row['ligacoes'] ?></textarea>
								
							</div>

						</div>

						<div class="row justify-content-center my-3">

							<div class="col-10">

								<p class="h4 my-3 text-center">Defeitos</p>
								<textarea class="form-control" maxlength="2000" rows="10" name="nDefeitos" ><?php echo$row['defeitos'] ?></textarea>
								
							</div>

						</div>

						<div class="row justify-content-center my-3">

							<div class="col-10">

								<p class="h4 my-3 text-center">Idiomas e outras proficiências</p>
								<textarea class="form-control" maxlength="2000" rows="10" name="nIdiomas" ><?php echo$row['idiomas'] ?></textarea>
								
							</div>

						</div>

						<div class="row justify-content-center my-3">

							<div class="col-10">

								<p class="h4 my-3 text-center">Características e habilidades</p>
								<textarea class="form-control" maxlength="2000" rows="10" name="nCaracteristicas" ><?php echo$row['caracteristicas'] ?></textarea>
								
							</div>

						</div>
						
						<div class="row justify-content-center my-3">

							<div class="col-10">

								<p class="h4 my-3 text-center">Aparencia do personagem</p>
								<textarea class="form-control" maxlength="2000" rows="10" name="nAparencia" ><?php echo$row['aparencia'] ?></textarea>
								
							</div>

						</div>

						<div class="row justify-content-center my-3">

							<div class="col-10">

								<p class="h4 my-3 text-center">História do personagem</p>
								<textarea class="form-control" maxlength="2000" rows="10" name="nHistoria_pg" ><?php echo$row['historia_pg'] ?></textarea>
								
							</div>

						</div>

						<div class="row justify-content-center my-3">

							<div class="col-10">

								<p class="h4 my-3 text-center">Aliados e organizações</p>
								<textarea class="form-control" maxlength="2000" rows="10" name="nAliados" ><?php echo$row['aliados'] ?></textarea>
								
							</div>

						</div>

					</div>

					<!-- INVENTÁRIO -->

					<center><p class="h1 mt-5">Inventário</p></center>

					<div class="form-group">
						<div class="row justify-content-center my-3 mb-5">

							<div class="col-10">

								<p class="h4 my-3 text-center">Tesouros</p>
								<textarea class="form-control" maxlength="1000" rows="10" name="nTesouro" ><?php echo$row['tesouro'] ?></textarea>
								
							</div>

						</div>

						<div class="row justify-content-center my-3">

							<div class="col-4 col-md-3 col-lg-2">

								<label for="nCobre">Cobre</label>
								<input class="form-control" value= "<?php echo$row['cobre'] ?>" type='number' name='nCobre'/>

							</div>

							<div class="col-4 col-md-3 col-lg-2">

								<label for="nPrata">Prata</label>
								<input class="form-control" value= "<?php echo$row['prata'] ?>" type='number' name='nPrata'/>

							</div>

							<div class="col-4 col-md-3 col-lg-2">

								<label for="nElectro">Electro</label>
								<input class="form-control" value= "<?php echo$row['electro'] ?>" type='number' name='nElectro'/>

							</div>

							<div class="col-4 col-md-3 col-lg-2">

								<label for="nOuro">Ouro</label>
								<input class="form-control" value= "<?php echo$row['ouro'] ?>" type='number' name='nOuro'/>

							</div>

							<div class="col-4 col-md-3 col-lg-2">

								<label for="nPlatina">Platina</label>
								<input class="form-control" value= "<?php echo$row['platina'] ?>" type='number' name='nPlatina'/>

							</div>
							
						</div>

						<div class="row justify-content-center mt-5">
							
							<div class="col-10">


								<p class="h4 my-3 text-center">Equipamento</p>
								<textarea class="form-control" maxlength="1000" rows="20" name="nEquipamento" ><?php echo$row['equipamento'] ?></textarea>
								
							</div>

						</div>


					</div>

					<!-- FIM DO INVENTÁRIO -->

					<div class='checkbox'>

			            <center><p class="h1 mt-5">Perícias</p></center>

			              <div class="row">
			                
			                <div class="col-6 col-md-3 my-2">
			                  
			                	<input type="checkbox" name="acrobacia" value="on" <?php echo $row["acrobacia"] ?> > Acrobacia (Des)
			                  
			                </div>

			                <div class="col-6 col-md-3 my-2">
			                  
			                	<input type="checkbox" name="arcanismo" value="on" <?php echo $row["arcanismo"] ?>> Arcanismo (Int)

			                </div>

			                <div class="col-6 col-md-3 my-2">
			                  
			                	<input type="checkbox" name="atletismo" value="on" <?php echo $row["atletismo"] ?>> Atletismo (For)

			                </div>

			                <div class="col-6 col-md-3 my-2">
			                  
			                	<input type="checkbox" name="atuação" value="on" <?php echo $row["atuacao"] ?>> Atuação (Car)

			                </div>

			              </div>

			              <div class="row">

			                <div class="col-6 col-md-3 my-2">
			                  
			                	<input type="checkbox" name="blefar" value="on" <?php echo $row["blefar"] ?>> Blefar (Car)
			                  
			                </div>

			                <div class="col-6 col-md-3 my-2">
			                  
			                	<input type="checkbox" name="furtividade" value="on" <?php echo $row["furtividade"] ?>> Furtividade (Des)

			                </div>

			                <div class="col-6 col-md-3 my-2">
			                  
			                 	<input type="checkbox" name="historia" value="on" <?php echo $row["historia"] ?>> História (Int)

			                </div>

			                <div class="col-6 col-md-3 my-2">
			                  
			                	<input type="checkbox" name="intimidação" value="on" <?php echo $row["intimidacao"] ?>> Intimidação (Car)

			                </div>

			              </div>

			              <div class="row">
			                          
			                <div class="col-6 col-md-3 my-2">
			                  
			                	<input type="checkbox" name="intuição" value="on" <?php echo $row["intuicao"] ?>> Intuição (Sab)

			                </div>

			                <div class="col-6 col-md-3 my-2">
			                  
			                  	<input type="checkbox" name="investigação" value="on" <?php echo $row["investigacao"] ?>> Investigação (Sab)

			                </div>

			                <div class="col-6 col-md-3 my-2">
			                  
			                  	<input type="checkbox" name="lidar com animais" value="on" <?php echo $row["lidar_com_animais"] ?>> Lidar com animais (Sab)
			                  
			                </div>

			                <div class="col-6 col-md-3 my-2">
			                  
			                	<input type="checkbox" name="medicina" value="on" <?php echo $row["medicina"] ?>> Medicina (Sab)

			                </div>

			              </div>

			              <div class="row  my-3">

			                <div class="col-6 col-md-3 my-2">
			                  
			                	<input type="checkbox" name="natureza" value="on" <?php echo $row["natureza"] ?>> Natureza (Int)

			                </div>

			                <div class="col-6 col-md-3 my-2">
			                  
			                	<input type="checkbox" name="percepção" value="on" <?php echo $row["percepcao"] ?>> Percepção (Sab)

			                </div>

			                <div class="col-6 col-md-3 my-2">
			                  
			                	<input type="checkbox" name="persuação" value="on" <?php echo $row["persuacao"] ?>> Persuação (Car)

			                </div>

			                <div class="col-6 col-md-3 my-2">
			                  
			                	<input type="checkbox" name="prestidigitação" value="on" <?php echo $row["prestidigitacao"] ?>> Prestidigitação (Des)

			                </div>

			              </div>

			              <div class="row justify-content-around my-3">
			                
			                <div class="col-6 col-md-3">
			                  
			                	<input type="checkbox" name="religião" value="on" <?php echo $row["religiao"] ?>> Religião (Int)

			                </div>

			                <div class="col-6 col-md-3">
			                  
			                	<input type="checkbox" name="sobrevivência" value="on" <?php echo $row["sobrevivencia"] ?>> Sobrevivência (Sab)

			                </div>


			              </div>

			          </div>

					<!-- <div class='checkbox'>

						<p class="h3 my-3">Perícias</p>

							 <br>
					        <br>  </br>
					        <br>  </br>
					        <br>  </br>
					        <br>  </br>
					        <br>  </br>
					        <br>  </br>
					        <br>  </br>
					        <br>  </br>
					        <br>  </br>
					        <br>  </br>
					        <br>  </br>
					        <br>  </br>
					        <br>  </br>
					        <br>  </br>
					        <br>  </br>
					        <br>  </br>
					        <br> <input type="checkbox" name="sobrevivência" value="on" <?php echo $row["sobrevivencia"] ?>> Sobrevivência (Sab) </br>

					</div> -->

				</div>

					<div class="row justify-content-center my-3">

						<button type="submit" class="btn btn-light mx-3" style="color: black">Concluir</button>


					

			</form>

					<a class="btn btn-light mx-3" data-toggle="modal" data-target="#excluirModal" style="color: black">Excluir</a>

				</div>

				<!-- Modal para sair -->
				<div class="modal fade" id="excluirModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

				  <div class="modal-dialog" role="document">

				    <div class="modal-content">

				      <div class="modal-header">

				        <h5 class="modal-title" id="exampleModalLabel" style="color: black">Deseja mesmo excluir essa ficha?</h5>
				        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				          <span aria-hidden="true">&times;</span>
				        </button>

				      </div>

				      <div class="modal-footer">

				        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
				        <form action="delete.php?id_ficha=<?php echo$row['id_ficha']?>" method="POST">
						
							<button type="submit" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Excluir</button>

						</form>
					
				      </div>

				    </div>

				  </div>

				</div>
					
		</div>

	</div>

	<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

</body>

</html>