<?php
	$con = mysqli_connect('localhost', 'root', '', 'bentotec') or die("Não foi possível realizar a conexão");
	$bd = mysqli_select_db($con, 'bentotec');
?>

<?php
	
	// Início da sessão.
	session_start();

	// Recebimento dos dados da conta sendo cadastrada na página cadastro.html.
	$nome = $_POST['Nome'];
	$apelido = $_POST['Apelido'];
	$email = $_POST['Email'];
	$senha = $_POST['Senha'];
	$consenha = $_POST['SenhaCon'];

	// Verificação se já existe um usuário com o mesmo email.
	$resultado = mysqli_query($con, "SELECT * FROM usuarios WHERE email = '".$_REQUEST["Email"]."'");
	$row = mysqli_fetch_array($resultado);

	// IF caso já exista uma conta com o emais cadastrado.
	if ($row) {
		echo "<script>alert('Um cadastro já foi realizado com esse email, tente outro.');location.href=\"cadastro.html\"</script>";
	}
	// ELSE caso não acha outra conta com o memso email.
	else{

		// IF caso as senhas postas nos campos "senha" e "confirme a senha" sejam diferentes.
		if ($senha != $consenha) {
			echo "<script>alert('As senha digitadas são diferentes.');location.href=\"cadastro.html\"</script>";	
		}
		// ELSE para a criação da ficha caso seja permitida.
		else{

			// Inserção dos dados do usuário no banco de dados.
			$cad = "INSERT INTO usuarios (nome, apelido, email, senha, consenha) VALUES ('$nome', '$apelido', '$email', '$senha', '$consenha')";
			$confere = mysqli_query($con, $cad);

			// Notificação sobre se o cadastro foi feito ou não.
			if ($confere) {
				echo "<script type='text/javascript'>alert('Cadastro realizado com sucesso!');location.href=\"login.html\"</script>";
			}
			else{
				echo "<script>alert('Não foi possível realizar o cadastro!');location.href=\"cadastro.html\"</script>";
			}

		}

	}
	
	mysqli_free_result($resultado);
	$fechou = mysqli_close($con);
?>

