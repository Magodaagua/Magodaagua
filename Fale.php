<!DOCTYPE html>
<html lang="pt-br">
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
	<link rel="icon" type="png" href="_imagensdosite/icon.png">
	<title>Fale Conosco</title>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Links para o bootstrap e o css da página -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="_css/perfil.css">
    
</head>

<body>

<!-- menu superior-->
<?php 
  require("menusuperior.php");
?>
<!-- fim menu superior-->

	<!-- INÍCIO DO CONTAINER. Usado para conter todos os elementos da página -->
	<div class="container text-light">
		
		<!-- INÍCO DA "MENU-ROW". Row de todos os botões do menu -->
		<div id="menu-row" class="row justify-content-around my-3">
			<!-- Caminho para a página de personagens -->
			<div class="col-10 col-lg-2 my-1">
			</div>
		<!-- FIM DO "MENU-ROW" -->
		</div>
		<p> <br><br>
		<font color="black"> <center> 
	    <div id="contato_form">
      <form action="teste_email.php" name="form_contato" method="POST" >
     <h1> <i> <p class="titulo"> <font color="white">Formulário</p> </i> </font> </h1>
        <h2><table align="center">
          <tr> 
           <h3> <td> <i> <font color="white"> Seu Nome:<sup class="asteristico">*</sup> </i></font> </td>
            <td>
              <input type="text" name="nome" maxlength="40" />
            </td>
          </tr>
          <tr>
            <td> <font color="white"> <i> Seu E-mail:<sup class="asteristico">*</sup> </i> </font> </td>
            <td>
              <input type="email" name="email" maxlength="30" />
            </td>
          </tr>
          <tr>
            <td> <font color="white"> <i> Opções:<sup class="asteristico">*</sup> </i> </font> </td>
            <td>
              <select name="escolhas" class="campo_input">
                <option value="Opção 1">Nenhuma</option>
                <option value="Opção 2">Erro para reportar</option>
                <option value="Opção 3">Critica</option>
              </select>
            </td>
          </tr>
          <tr>
            <td> <font color="black"> <i> Mensagem:<sup class="asteristico">*</sup> </i> </font> </td>
            <td>
              <textarea name="msg" cols="16" rows="5"></textarea>
            </td>
          </tr>
          <tr align="right";>
            <td colspan="2">
              <input type="reset" class="campo_submit" value="Limpar" />
              <input type="submit" class="campo_submit" value="Enviar" />
            </td>
          </tr>
          <tr>
            <td colspan="2" align="right"><small class="asteristico">* Campos obrigatorios</small> </td>
          </tr>
        </table>
      </form>
    </div>
	<!-- Row do logo que fica no meio da página -->
		<div class="row justify-content-center my-4 mx-1">
			
			<div class="col-10 col-md-8 col-lg-4 align-self-center">

				<!-- Logo que fica no meio da página -->
	        	<img class="img-fluid" src="_imagensdosite/logo2.png">
	          
	        </div>

		</div>

</font> </h3> </center>
	<!-- FIM DO CONTAINER -->
	</div>
	<br> <p>

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