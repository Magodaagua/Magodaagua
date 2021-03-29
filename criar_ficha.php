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
  background-image:url(_imagensdosite/sla.jpg);
  background-size:110% 100%;
  background-repeat:no-repeat;
  background-color:#000;
  }
  </style>
  <!--<link rel="icon" type="png" href="imagensdosite/black.png">-->
  <title>Criação de ficha</title>

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
    <br> <p>
    <form action="ficha.php" method="POST">
      <div data-spy="scroll" data-target="#navbarVertical" data-offset="0" class="scrollspySite">

        <div class="col-12 text-center my-3">

          <h1 class="display-4">Criação de ficha</h1>

        </div>

        <center><p id="titulo" class="h1 my-3">Dados gerais</p></center>

        <div class="form-group">
              
          <div class="row">

            <div class="col-6 col-md-3 col-lg-3">
                
              <label for='NomeP'>Nome do pg</label>
              <input class="form-control mb-2" type='text' name='NomeP'>

            </div>

            <div class="col-6 col-md-3 col-lg-3">
                
              <label for='ClasseP'>Classe</label>
              <select class="form-control mb-2" type='text' name='ClasseP'>
                <option value="Bárbaro">Bárbaro</option>          
                <option value="Bardo">Bardo</option>
                <option value="Bruxo">Bruxo</option>
                <option value="Clérigo">Clérigo</option>
                <option value="Druida">Druida</option>
                <option value="Feiticeiro">Feiticeiro</option>
                <option value="Guerreiro">Guerreiro</option>
                <option value="Ladino">Ladino</option>
                <option value="Mago">Mago</option>
                <option value="Monge">Monge</option>
                <option value="Paladino">Paladino</option>
                <option value="Patrulheiro">Patrulheiro</option>
              </select>

            </div>

            <div class="col-6 col-md-3 col-lg-3">
                
              <label for='RacaP'>Raça</label>
              <select class="form-control mb-2" type='text' name='RacaP'>
                <option value="Anão da Colina">Anão da Colina</option>
                <option value="Anão da Montanha">Anão da Montanha</option>
                <option value="Alto Elfo">Alto Elfo</option>
                <option value="Elfo da Floresta">Elfo</option>
                <option value="Elfo Negro(Drow)">Elfo Negro(Drow)</option>
                <option value="Halfling Pés Leves">Halfling Pés Leves</option>
                <option value="Halfling Robusto">Halfling Robusto</option>
                <option value="Humano">Humano</option>
                <option value="Draconato">Draconato</option>
                <option value="Gnomo da Floresta">Gnomo da Floresta</option>
                <option value="Gnomo das Rochas">Gnomo das Rochas</option>
                <option value="Meio-Elfo">Meio-Elfo</option>
                <option value="Meio-Orc">Meio-Orc</option>
                <option value="Tiefling">Tiefling</option>
              </select>

            </div>

            <div class="col-6 col-md-3 col-lg-3">
                
              <label for='AntecedenteP'>Antecedente</label>
              <input class="form-control mb-2" type='text' name='AntecedenteP'>

            </div>

          </div>

          <div class="row">
            
            <div class="col-6 col-md-3 col-lg-3">
                
              <label for='TendenciaP'>Tendência</label>
              <input class="form-control mb-2" type='text' name='TendenciaP'>

            </div>

            <div class="col-6 col-md-3 col-lg-3">
                
              <label for='IdadeP'>Idade</label>
              <input class="form-control mb-2" type='text' name='IdadeP'>

            </div>

            <div class="col-6 col-md-3 col-lg-3">
                
              <label for='AlturaP'>Altura</label>
              <input class="form-control mb-2" type='text' name='AlturaP'>

            </div>

            <div class="col-6 col-md-3 col-lg-3">
                
              <label for='PesoP'>Peso</label>
              <input class="form-control mb-2" type='text' name='PesoP'>

            </div>

          </div>

          <div class="row justify-content-center mb-5">
            
            <div class="col-6 col-md-3 col-lg-3">
                
              <label for='CabeloP'>Cabelo</label>
              <input class="form-control mb-2" type='text' name='CabeloP'>

            </div>

            <div class="col-6 col-md-3 col-lg-3">
                
              <label for='PeleP'>Pele</label>
              <input class="form-control mb-2" type='text' name='PeleP'>

            </div>

            <div class="col-6 col-md-3 col-lg-3">
                
              <label for='OlhosP'>Olhos</label>
              <input class="form-control mb-2" type='text' name='OlhoP'>

            </div>

          </div>

        </div>

        <!-- ATRIBUTOS -->
        <center><p class="h1 my-3">Atributos</p></center>

          <div class='form-group'>

            <div class="row justify-content-center mb-5">

                  <div class="col-4 col-md-2">
                    
                    <label for='nForca'>Força</label>
                    <input class="form-control" type='number' name='forca'>

                  </div>

                  <div class="col-4 col-md-2">
                    
                    <label for='nConstituicao'>Constituição</label>
                    <input class="form-control" type='number' name='constituicao'>

                  </div>
                  
                  <div class="col-4 col-md-2">
                    
                    <label for='nDestreza'>Destreza</label>
                    <input class="form-control" type='number' name='destreza'>

                  </div>
                  
                  <div class="col-4 col-md-2">
                    
                    <label for='nInteligencia'>Inteligência</label>
                    <input class="form-control" type='number' name='inteligencia'>

                  </div>
                  
                  <div class="col-4 col-md-2">
                    
                    <label for='nSabedoria'>Sabedoria</label>
                    <input class="form-control" type='number' name='sabedoria'>

                  </div>

                  <div class="col-4 col-md-2">
                    
                    <label for='nCarisma'>Carisma</label>
                    <input class="form-control" type='number' name='carisma'>

                  </div>
                  

          </div>

        </div>

        

        <!-- BACKGROUND -->

          <center><p class="h1 my-3">Background do personagem</p></center>

          <div class="form-group">

            <div class="row justify-content-center my-3">

              <div class="col-10">

                <p class="h4 my-3 text-center">Traços do personagem</p>
                <textarea class="form-control" maxlength="2000" rows="10"  name="tracos" ></textarea>

              </div>

            </div>

            <div class="row justify-content-center my-3">

              <div class="col-10">

                <p class="h4 my-3 text-center">Ideais</p>
                <textarea class="form-control" maxlength="2000" rows="10" name="ideais" ></textarea>
                
              </div>

            </div>
            
            <div class="row justify-content-center my-3">

              <div class="col-10">

                <p class="h4 my-3 text-center">Ligações</p>
                <textarea class="form-control" maxlength="2000" rows="10"  name="ligacoes" ></textarea>
                
              </div>

            </div>

            <div class="row justify-content-center my-3">

              <div class="col-10">

                <p class="h4 my-3 text-center">Defeitos</p>
                <textarea class="form-control" maxlength="2000" rows="10" name="defeitos" ></textarea>
                
              </div>

            </div>

            <div class="row justify-content-center my-3">

              <div class="col-10">

                <p class="h4 my-3 text-center">Idiomas e outras proficiências</p>
                <textarea class="form-control" maxlength="2000" rows="10" name="idiomas" ></textarea>
                
              </div>

            </div>

            <div class="row justify-content-center my-3">

              <div class="col-10">

                <p class="h4 my-3 text-center">Características e habilidades</p>
                <textarea class="form-control" maxlength="2000" rows="10" name="caracteristicas" ></textarea>
                
              </div>

            </div>
            
            <div class="row justify-content-center my-3">

              <div class="col-10">

                <p class="h4 my-3 text-center">Aparencia do personagem</p>
                <textarea class="form-control" maxlength="2000" rows="10" name="aparencia" ></textarea>
                
              </div>

            </div>

            <div class="row justify-content-center my-3">

              <div class="col-10">

                <p class="h4 my-3 text-center">História do personagem</p>
                <textarea class="form-control" maxlength="2000" rows="10" name="historia_pg" ></textarea>
                
              </div>

            </div>

            <div class="row justify-content-center my-3">

              <div class="col-10">

                <p class="h4 my-3 text-center">Aliados e organizações</p>
                <textarea class="form-control" maxlength="2000" rows="10" name="aliados" ></textarea>
                
              </div>

            </div>

          </div>
          <!-- FIM DE BACKGROUND -->

          <!-- INVENTÁRIO -->

          <center><p class="h1 mt-5">Inventário</p></center>

          <div class="form-group">
            <div class="row justify-content-center my-3 mb-5">

              <div class="col-10">

                <p class="h4 my-3 text-center">Tesouros</p>
                <textarea class="form-control" maxlength="1000" rows="10" name="tesouro" ></textarea>
                
              </div>

            </div>

            <div class="row justify-content-center my-3">

              <div class="col-4 col-md-3 col-lg-2">

                <label for="nCobre">Cobre</label>
                <input class="form-control" type='number' name='cobre'/>

              </div>

              <div class="col-4 col-md-3 col-lg-2">

                <label for="nPrata">Prata</label>
                <input class="form-control" type='number' name='prata'/>

              </div>

              <div class="col-4 col-md-3 col-lg-2">

                <label for="nElectro">Electro</label>
                <input class="form-control" type='number' name='electro'/>

              </div>

              <div class="col-4 col-md-3 col-lg-2">

                <label for="nOuro">Ouro</label>
                <input class="form-control" type='number' name='ouro'/>

              </div>

              <div class="col-4 col-md-3 col-lg-2">

                <label for="nPlatina">Platina</label>
                <input class="form-control" type='number' name='platina'/>

              </div>
              
            </div>

            <div class="row justify-content-center mt-5">
              
              <div class="col-10">


                <p class="h4 my-3 text-center">Equipamento</p>
                <textarea class="form-control" maxlength="1000" rows="10" name="equipamento" ></textarea>
                
              </div>

            </div>


          </div>

          <!-- FIM DO INVENTÁRIO -->

          <div class='checkbox'>

            <center><p class="h1 mt-5">Perícias</p></center>

              <div class="row">
                
                <div class="col-6 col-md-3 my-2">
                  
                  <input type="checkbox" name="acrobacia" value="on"> Acrobacia (Des)
                  
                </div>

                <div class="col-6 col-md-3 my-2">
                  
                  <input type="checkbox" name="arcanismo" value="on"> Arcanismo (Int)

                </div>

                <div class="col-6 col-md-3 my-2">
                  
                  <input type="checkbox" name="atletismo" value="on"> Atletismo (For)

                </div>

                <div class="col-6 col-md-3 my-2">
                  
                  <input type="checkbox" name="atuação" value="on"> Atuação (Car)

                </div>

              </div>

              <div class="row">

                <div class="col-6 col-md-3 my-2">
                  
                  <input type="checkbox" name="blefar" value="on"> Blefar (Car)
                  
                </div>

                <div class="col-6 col-md-3 my-2">
                  
                  <input type="checkbox" name="furtividade" value="on"> Furtividade (Des)

                </div>

                <div class="col-6 col-md-3 my-2">
                  
                  <input type="checkbox" name="historia" value="on"> História (Int)

                </div>

                <div class="col-6 col-md-3 my-2">
                  
                  <input type="checkbox" name="intimidação" value="on"> Intimidação (Car)

                </div>

              </div>

              <div class="row">
                          
                <div class="col-6 col-md-3 my-2">
                  
                  <input type="checkbox" name="intuição" value="on"> Intuição (Sab)

                </div>

                <div class="col-6 col-md-3 my-2">
                  
                  <input type="checkbox" name="investigação" value="on"> Investigação (Sab)

                </div>

                <div class="col-6 col-md-3 my-2">
                  
                  <input type="checkbox" name="lidar com animais" value="on"> Lidar com animais (Sab)
                  
                </div>

                <div class="col-6 col-md-3 my-2">
                  
                  <input type="checkbox" name="medicina" value="on"> Medicina (Sab)

                </div>

              </div>

              <div class="row  my-3">

                <div class="col-6 col-md-3 my-2">
                  
                  <input type="checkbox" name="natureza" value="on"> Natureza (Int)

                </div>

                <div class="col-6 col-md-3 my-2">
                  
                  <input type="checkbox" name="percepção" value="on"> Percepção (Sab)

                </div>

                <div class="col-6 col-md-3 my-2">
                  
                  <input type="checkbox" name="persuação" value="on"> Persuação (Car)

                </div>

                <div class="col-6 col-md-3 my-2">
                  
                  <input type="checkbox" name="prestidigitação" value="on"> Prestidigitação (Des)

                </div>

              </div>

              <div class="row justify-content-around my-3">
                
                <div class="col-6 col-md-3">
                  
                  <input type="checkbox" name="religião" value="on"> Religião (Int)

                </div>

                <div class="col-6 col-md-3">
                  
                  <input type="checkbox" name="sobrevivência" value="on"> Sobrevivência (Sab)

                </div>


              </div>

          </div>

      </div>


          <div class="row justify-content-center my-3">

            <button type="submit" class="btn btn-light mx-3">Concluir</button>

          </div>

      </form>

    </div>

  </div>
    <!--inicio Botão de voltar ao topo-->
    <?php 
      require("Botaodevoltaraotopo.php");
    ?>
    <!--Fim Botão de voltar ao topo-->
  </div>
  
  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

</body>

</html>
