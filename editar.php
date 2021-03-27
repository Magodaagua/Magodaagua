<?php
  $con = mysqli_connect('localhost', 'root', '', 'bentotec') or die("Não foi possível realizar a conexão");
  $bd = mysqli_select_db($con, "bentotec");
?>
<?php
  session_start();
  $id_usuario = $_SESSION['id_usuario'];
  $nome_jogador = $_SESSION['nome'];

  $id_ficha = $_GET["id_ficha"];

  //Dados gerais
  $ClasseP = $_POST['nClasse'];
  $IdadeP = $_POST['nIdade'];
  $AlturaP = $_POST['nAltura'];
  $PesoP = $_POST['nPeso'];
  $OlhoP = $_POST['nOlho'];
  $CabeloP = $_POST['nCabelo'];
  $PeleP = $_POST['nPele'];
  $AntecedenteP = $_POST['nAntecedente'];
  $TendenciaP = $_POST['nTendencia'];
  $RacaP = $_POST['nRaca'];
  $ClasseP = $_POST['nClasse'];

  //Informações do personagem
  $tracos = $_POST['nTracos'];
  $ideais = $_POST['nIdeais'];
  $ligacoes = $_POST['nLigacoes'];
  $defeitos = $_POST['nDefeitos'];
  $idiomas = $_POST['nIdiomas'];
  $caracteristicas = $_POST['nCaracteristicas'];
  $aparencia =  $_POST['nAparencia'];
  $historia_pg = $_POST['nHistoria_pg'];
  $aliados = $_POST['nAliados'];

  //Inventário
  $tesouro = $_POST['nTesouro'];
  $cobre = $_POST['nCobre'];
  $prata = $_POST['nPrata'];
  $electro = $_POST['nElectro'];
  $ouro = $_POST['nOuro'];
  $platina = $_POST['nPlatina'];
  $equipamento = $_POST['nEquipamento'];

  //Atributos
  $forca = $_POST['nForca'];
  $destreza = $_POST['nDestreza'];
  $inteligencia = $_POST['nInteligencia'];
  $sabedoria = $_POST['nSabedoria'];
  $constituicao = $_POST['nConstituicao'];
  $carisma = $_POST['nCarisma'];

  //Modificadores
  $mod_for = floor(($forca - 10) / 2);
  $mod_dest = floor(($destreza - 10) / 2);
  $mod_const = floor(($constituicao - 10) / 2);
  $mod_int = floor(($inteligencia - 10) / 2);
  $mod_car = floor(($carisma - 10) / 2);
  $mod_sab = floor(($sabedoria - 10) / 2);

  //Nível e exeperiência do personagem
  $exp = $_POST['expEd'];
  if (($exp >= 0) & ($exp < 300)) {
    $nivel = 1;
  }else if ($exp < 900) {
    $nivel = 2;
  }else if ($exp < 2700) {
    $nivel = 3;
  }else if ($exp < 6500) {
    $nivel = 4;
  }else if ($exp < 14000) {
    $nivel = 5;
  }else if ($exp < 23000) {
    $nivel = 6;
  }else if ($exp < 34000) {
    $nivel = 7;
  }else if ($exp < 48000) {
    $nivel = 8;
  }else if ($exp < 64000) {
    $nivel = 9;
  }else if ($exp < 85000) {
    $nivel = 10;
  }else if ($exp < 100000) {
    $nivel = 11;
  }else if ($exp < 120000) {
    $nivel = 12;
  }else if ($exp < 140000) {
    $nivel = 13;
  }else if ($exp < 165000) {
    $nivel = 14;
  }else if ($exp < 195000) {
    $nivel = 15;
  }else if ($exp < 225000) {
    $nivel = 16;
  }else if ($exp < 265000) {
    $nivel = 17;
  }else if ($exp < 305000) {
    $nivel = 18;
  }else if ($exp < 355000) {
    $nivel = 19;
  }else if ($exp >= 355000) {
    $nivel = 20;
  };

  //PV e relacionados
  $pv = $_POST['nVida'];

  if ($ClasseP == "Bárbaro") {

    $dado_vida = "1d12";
    
  }else if ($ClasseP == "Bardo") {

    $dado_vida = "1d8";
    
  }else if ($ClasseP == "Bruxo") {

    $dado_vida = "1d8";
    
  }else if ($ClasseP == "Clérigo") {

    $dado_vida = "1d8";
    
  }else if ($ClasseP == "Druida") {

    $dado_vida = "1d8";
    
  }else if ($ClasseP == "Feiticeiro") {

    $dado_vida = "1d6";
    
  }else if ($ClasseP == "Guerreiro") {

    $dado_vida = "1d10";
    
  }else if ($ClasseP == "Ladino") {

    $dado_vida = "1d8";
    
  }else if ($ClasseP == "Mago") {

    $dado_vida = "1d6";
    
  }else if ($ClasseP == "Monge") {

    $dado_vida = "1d8";
    
  }else if ($ClasseP == "Paladino") {

    $dado_vida = "1d10";
    
  }else if ($ClasseP == "Patrulheiro") {

    $dado_vida = "1d10";
    
  };

  $pv_atual = $_POST['nVida_atual'];
  $pv_temp = $_POST['nVida_temp'];

  //CA
  $ca = $_POST['nCA'];

  //Inspiração
  $inspiracao = $_POST['select_insp'];

  //Iniciativa
  $iniciativa = $mod_dest;

  //Deslocamento
  $deslocamento = $_POST['nDeslocamento'];

  //Proficiência
  $proficiencia = 1 + ceil($nivel/4);

  //Teste de Resistência
  $resist_for = $mod_for;
  $resist_dest = $mod_dest;
  $resist_const = $mod_const;
  $resist_int = $mod_int;
  $resist_sab = $mod_sab;
  $resist_car = $mod_car;

  if ($ClasseP == "Bárbaro") {
    $resist_for = $mod_for + $proficiencia;
    $resist_const = $mod_const + $proficiencia;
  }else if ($ClasseP == "Bardo") {
    $resist_dest = $mod_dest + $proficiencia;
    $resist_car = $mod_car + $proficiencia;
  }else if ($ClasseP == "Bruxo") {
    $resist_sab = $mod_sab + $proficiencia;
    $resist_car = $mod_car + $proficiencia;
  }else if ($ClasseP == "Clérigo") {
    $resist_sab = $mod_sab + $proficiencia;
    $resist_car = $mod_car + $proficiencia;
  }else if ($ClasseP == "Druida") {
    $resist_sab = $mod_sab + $proficiencia;
    $resist_int = $mod_int + $proficiencia;
  }else if ($ClasseP == "Feiticeiro") {
    $resist_const = $mod_const + $proficiencia;
    $resist_car = $mod_car + $proficiencia;
  }else if ($ClasseP == "Guerreiro") {
    $resist_for = $mod_for + $proficiencia;
    $resist_const = $mod_const + $proficiencia;
  }else if ($ClasseP == "Ladino") {
    $resist_dest = $mod_sab + $proficiencia;
    $resist_int = $mod_int + $proficiencia;
  }else if ($ClasseP == "Mago") {
    $resist_sab = $mod_sab + $proficiencia;
    $resist_int = $mod_int + $proficiencia;
  }else if ($ClasseP == "Monge") {
    $resist_dest = $mod_dest + $proficiencia;
    $resist_for = $mod_for + $proficiencia;
  }else if ($ClasseP == "Paladino") {
    $resist_sab = $mod_sab + $proficiencia;
    $resist_car = $mod_car + $proficiencia;
  }else if ($ClasseP == "Patrulheiro") {
    $resist_dest = $mod_dest + $proficiencia;
    $resist_for = $mod_for + $proficiencia;
  };

  //pericias

  if(isset($_POST['acrobacia']))
  {
      $acrobacia = 'checked';
  }else{
    $acrobacia = 'unchecked';
  };
  if(isset($_POST['arcanismo']))
  {
      $arcanismo = 'checked';
  }else{
    $arcanismo = 'unchecked';
  };
  if(isset($_POST['atletismo']))
  {
      $atletismo = 'checked';
  }else{
    $atletismo = 'unchecked';
  };
  if(isset($_POST['atuação']))
  {
      $atuação = 'checked';
  }else{
    $atuação = 'unchecked';
  };
  if(isset($_POST['blefar']))
  {
      $blefar = 'checked';
  }else{
    $blefar = 'unchecked';
  };
  if(isset($_POST['furtividade']))
  {
      $furtividade = 'checked';
  }else{
    $furtividade = 'unchecked';
  };
  if(isset($_POST['historia']))
  {
      $historia = 'checked';
  }else{
    $historia = 'unchecked';
  };
  if(isset($_POST['intimidação']))
  {
      $intimidação = 'checked';
  }else{
    $intimidação = 'unchecked';
  };
  if(isset($_POST['intuição']))
  {
      $intuição = 'checked';
  }else{
    $intuição = 'unchecked';
  };
  if(isset($_POST['investigação']))
  {
      $investigação = 'checked';
  }else{
    $investigação = 'unchecked';
  };
  if(isset($_POST['lidar_com_animais']))
  {
      $lidar_com_animais = 'checked';
  }else{
    $lidar_com_animais = 'unchecked';
  };
  if(isset($_POST['medicina']))
  {
      $medicina = 'checked';
  }else{
    $medicina = 'unchecked';
  };
  if(isset($_POST['natureza']))
  {
      $natureza = 'checked';
  }else{
    $natureza = 'unchecked';
  };
  if(isset($_POST['percepção']))
  {
      $percepção = 'checked';
  }else{
    $percepção = 'unchecked';
  };
  if(isset($_POST['persuação']))
  {
      $persuação = 'checked';
  }else{
    $persuação = 'unchecked';
  };
  if(isset($_POST['prestidigitação']))
  {
      $prestidigitação = 'checked';
  }else{
    $prestidigitação = 'unchecked';
  };
  if(isset($_POST['religião']))
  {
      $religião = 'checked';
  }else{
    $religião = 'unchecked';
  };
  if(isset($_POST['sobrevivência']))
  {
      $sobrevivencia = 'checked';
  }else{
    $sobrevivencia = 'unchecked';
  };
  //BOM DIA ANDRE
  //NAO DEIXE SEU NOTE ABERTO
  //BOM TRABALHO
  //EU GOSTO DE BATATA
  //
  //
  //
  //
  
  //Inserir as informações na table
  //$cad = "UPDATE ficha SET classe = '$ClasseP', nivel = '$nivel', exp = '$exp' WHERE '$id_usuario' = id_usuario;";
  
  $cad =   "UPDATE ficha SET 
  nivel = '$nivel', 
  exp = '$exp',

  idade = '$IdadeP', 
  altura = '$AlturaP', 
  peso = '$PesoP', 
  olho = '$OlhoP', 
  cabelo = '$CabeloP', 
  pele = '$PeleP', 
  antecedente = '$AntecedenteP', 
  tendencia = '$TendenciaP', 
  raca = '$RacaP', 
  classe = '$ClasseP',

  tracos = '$tracos', 
  ideais = '$ideais',
  ligacoes = '$ligacoes',
  defeitos = '$defeitos',
  idiomas = '$idiomas',
  caracteristicas = '$caracteristicas',
  aparencia = '$aparencia',
  historia_pg = '$historia_pg',
  aliados = '$aliados',

  tesouro = '$tesouro',
  cobre = '$cobre',
  prata = '$prata',
  electro = '$electro',
  ouro = '$ouro',
  platina = '$platina',
  equipamento = '$equipamento',

  forca = '$forca', 
  destreza = '$destreza', 
  constituicao = '$constituicao', 
  inteligencia = '$inteligencia', 
  carisma = '$carisma', 
  sabedoria = '$sabedoria',

  pontos_vida = '$pv', 
  pontos_vida_atual = '$pv_atual', 
  pontos_vida_temp = '$pv_temp', 
  dado_vida = '$dado_vida', 
  ca = '$ca',

  inspiracao = '$inspiracao', 
  iniciativa = '$iniciativa', 
  deslocamento = '$deslocamento', 
  proficiencia = '$proficiencia',

  resist_for = '$resist_for', 
  resist_dest = '$resist_dest', 
  resist_const = '$resist_const', 
  resist_int = '$resist_int', 
  resist_sab = '$resist_sab', 
  resist_car = '$resist_car',

  acrobacia = '$acrobacia', 
  arcanismo = '$arcanismo', 
  atletismo = '$atletismo', 
  atuacao = '$atuação', 
  blefar = '$blefar', 
  furtividade = '$furtividade' , 
  historia = '$historia', 
  intimidacao = '$intimidação', 
  intuicao = '$intuição', 
  investigacao = '$investigação', 
  lidar_com_animais = '$lidar_com_animais', 
  medicina = '$medicina', 
  natureza = '$natureza', 
  percepcao = '$percepção', 
  persuacao = '$persuação', 
  prestidigitacao = '$prestidigitação', 
  religiao = '$religião', 
  sobrevivencia = '$sobrevivencia'

  WHERE '$id_ficha' = id_ficha;";
  

  $confere = mysqli_query($con, $cad);

  if ($confere) {
    echo "<script type='text/javascript'>;location.href=\"perfil.php\"</script>";
  }else{
    echo "<script>alert('Não foi possível editar a ficha!')location.href=\"perfil.php\";</script>";
  }


?>