<?php
$con = mysqli_connect('localhost', 'root', '', 'bentotec') or die("Não foi possível realizar a conexão");
$bd = mysqli_select_db($con, "bentotec");
?>
<?php
session_start();
$id_usuario = $_SESSION['id_usuario'];
$nome_jogador = $_SESSION['nome'];

//Dados gerais
$NomeP = $_POST['NomeP'];
$IdadeP = $_POST['IdadeP'];
$AlturaP = $_POST['AlturaP'];
$PesoP = $_POST['PesoP'];
$OlhoP = $_POST['OlhoP'];
$CabeloP = $_POST['CabeloP'];
$PeleP = $_POST['PeleP'];
$AntecedenteP = $_POST['AntecedenteP'];
$TendenciaP = $_POST['TendenciaP'];
$RacaP = $_POST['RacaP'];
$ClasseP = $_POST['ClasseP'];

//Atributos
$forca = $_POST['forca'];
$destreza = $_POST['destreza'];
$inteligencia = $_POST['inteligencia'];
$sabedoria = $_POST['sabedoria'];
$constituicao = $_POST['constituicao'];
$carisma = $_POST['carisma'];

//Modificadores
$mod_for = floor(($forca - 10) / 2);
$mod_dest = floor(($destreza - 10) / 2);
$mod_const = floor(($constituicao - 10) / 2);
$mod_int = floor(($inteligencia - 10) / 2);
$mod_car = floor(($carisma - 10) / 2);
$mod_sab = floor(($sabedoria - 10) / 2);

//Nível e exeperiência do personagem
$nivel = 1;
$exp = 0;

//PV e relacionados
if ($ClasseP == "Bárbaro") {
	$pv = 12 + $mod_const;
	$dado_vida = "1d12";
}else if ($ClasseP == "Bardo") {
	$pv = 8 + $mod_const;
	$dado_vida = "1d8";
}else if ($ClasseP == "Bruxo") {
	$pv = 8 + $mod_const;
	$dado_vida = "1d8";
}else if ($ClasseP == "Clérigo") {
	$pv = 8 + $mod_const;
	$dado_vida = "1d8";
}else if ($ClasseP == "Druida") {
	$pv = 8 + $mod_const;
	$dado_vida = "1d8";
}else if ($ClasseP == "Feiticeiro") {
	$pv = 6 + $mod_const;
	$dado_vida = "1d6";
}else if ($ClasseP == "Guerreiro") {
	$pv = 10 + $mod_const;
	$dado_vida = "1d10";
}else if ($ClasseP == "Ladino") {
	$pv = 8 + $mod_const;
	$dado_vida = "1d8";
}else if ($ClasseP == "Mago") {
	$pv = 6 + $mod_const;
	$dado_vida = "1d6";
}else if ($ClasseP == "Monge") {
	$pv = 8 + $mod_const;
	$dado_vida = "1d8";
}else if ($ClasseP == "Paladino") {
	$pv = 10 + $mod_const;
	$dado_vida = "1d10";
}else if ($ClasseP == "Patrulheiro") {
	$pv = 10 + $mod_const;
	$dado_vida = "1d10";
};

$pv_atual = $pv;
$pv_temp = NULL;

//CA
$ca = 10 + $mod_dest;

//Inspiração
$inspiracao = "Não inspirado";

//Iniciativa
$iniciativa = $mod_dest;

//Deslocamento
if (($RacaP == "Anão da Colina") || ($RacaP == "Anão da Montanha")) {
	$deslocamento = "7,5 metros";
}else if (($RacaP == "Alto Elfo") || ($RacaP == "Elfo Negro(Drow)")) {
	$deslocamento = "9 metros";
}else if ($RacaP == "Elfo da Floresta") {
	$deslocamento = "10,5 metros";
}else if (($RacaP == "Halfling Pés Leves") || ($RacaP == "Halfling Robusto")) {
	$deslocamento = "7,5 metros";
}else if ($RacaP == "Humano") {
	$deslocamento = "9 metros";
}else if ($RacaP == "Draconato") {
	$deslocamento = "9 metros";
}else if (($RacaP == "Gnomo da Floresta") || ($RacaP == "Gnomo das Rochas")) {
	$deslocamento = "7,5 metros";
}else if (($RacaP == "Meio-Elfo") || ($RacaP == "Meio-Orc")) {
	$deslocamento = "9 metros";
}else if ($RacaP == "Tiefling") {
	$deslocamento = "9 metros";
};

//Proficiência
$proficiencia = 1 + ceil($nivel/4);

//Informações do personagem
$tracos = $_POST['tracos'];
$ideais = $_POST['ideais'];
$ligacoes = $_POST['ligacoes'];
$defeitos = $_POST['defeitos'];
$idiomas = $_POST['idiomas'];
$caracteristicas = $_POST['caracteristicas'];
$aparencia =  $_POST['aparencia'];
$historia_pg = $_POST['historia_pg'];
$aliados = $_POST['aliados'];

//Inventário
$tesouro = $_POST['tesouro'];

$cobre = $_POST['cobre'];
$prata = $_POST['prata'];
$electro = $_POST['electro'];
$ouro =  $_POST['ouro'];
$platina = $_POST['platina'];

$equipamento = $_POST['equipamento'];

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

//Inserir as informações na table
$cad = 
	"INSERT INTO ficha (
	id_usuario, nome, nome_pj, nivel, exp, idade, altura, peso, olho, cabelo, pele, antecedente, tendencia, raca, classe, 

	forca, destreza, constituicao, inteligencia, carisma, sabedoria, 

	pontos_vida, pontos_vida_atual, pontos_vida_temp, dado_vida, ca, inspiracao, iniciativa, deslocamento, proficiencia, 

	tracos, ideais, ligacoes, defeitos, idiomas, caracteristicas, aparencia, historia_pg, aliados,

	tesouro, cobre, prata, electro, ouro, platina, equipamento,

	resist_for, resist_dest, resist_const, resist_int, resist_sab, resist_car, 

	acrobacia, arcanismo, atletismo, atuacao, blefar, furtividade, historia, intimidacao, intuicao, investigacao, lidar_com_animais, medicina, natureza, percepcao, persuacao, prestidigitacao, religiao, sobrevivencia
	)
	VALUES (
	'$id_usuario', '$nome_jogador', '$NomeP', '$nivel', '$exp', '$IdadeP', '$AlturaP', '$PesoP', '$OlhoP', '$CabeloP', '$PeleP', '$AntecedenteP', '$TendenciaP', '$RacaP', '$ClasseP', 

	'$forca', '$destreza', '$constituicao', '$inteligencia', '$carisma', '$sabedoria', 

	'$pv', '$pv_atual', '$pv_temp', '$dado_vida','$ca', '$inspiracao','$iniciativa', '$deslocamento', '$proficiencia', 

	'$tracos', '$ideais', '$ligacoes', '$defeitos', '$idiomas', '$caracteristicas', '$aparencia', '$historia_pg', '$aliados',

	'$tesouro', '$cobre', '$prata', '$electro', '$ouro', '$platina', '$equipamento',

	'$resist_for', '$resist_dest', '$resist_const', '$resist_int', '$resist_sab', '$resist_car', 

	'$acrobacia', '$arcanismo', '$atletismo', '$atuação', '$blefar', '$furtividade', '$historia', '$intimidação', '$intuição', '$investigação', '$lidar_com_animais', '$medicina', '$natureza', '$percepção', '$persuação', '$prestidigitação', '$religião', '$sobrevivencia');";
$confere = mysqli_query($con, $cad);

if ($confere) {

	echo "<script type='text/javascript'>alert('Ficha criada com sucesso!');location.href=\"perfil.php\"</script>";
}else{
	echo "<script>alert('Não foi possível criar a ficha!')location.href=\"criar_ficha.php\";</script>";
}


?>
