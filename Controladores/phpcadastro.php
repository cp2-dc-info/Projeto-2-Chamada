<?php
require_once('../Banco de dados/criaConexãoBD.php');
require_once('../Banco de dados/tabelaCadastro.php');

$erros = [];

$validar = array_map('trim', $_REQUEST);


$validar = filter_var_array(
	$validar,
	[
		'nome' => FILTER_DEFAULT,
		'sobrenome' => FILTER_DEFAULT,
		'email' => FILTER_VALIDATE_EMAIL,
		'senha' => FILTER_DEFAULT,
		'confirmaSenha' => FILTER_DEFAULT,
		'matricula'=>FILTER_DEFAULT,
		'tipo' => FILTER_VALIDATE_INT,
	]
);

$nome = $validar['nome'];
$sobrenome = $validar['sobrenome'];
$senha = $validar['senha'];
$confirmaSenha = $validar['confirmaSenha'];
$email = $validar['email'];
$matricula = $validar['matricula'];
$tipo = $validar['tipo'];

//nome
$nome = $validar['nome'];
if($nome == false)
{
	$erros[] = "O nome informado não é válido";
}
else if( strlen($nome) < 3 || strlen($nome) > 35)
{
	$erros[] = "A quantidade de caracteres do nome deve estar entre 3 e 35";
}

//sobrenome
$sobrenome = $validar['sobrenome'];
if($sobrenome == false)
{
	$erros[] = "O sobrenome informado não é válido";
}
else if( strlen($sobrenome) < 3 || strlen($sobrenome) > 35)
{
	$erros[] = "A quantidade de caracteres do sobrenome deve estar entre 3 e 35";
}


//email
$email = $validar['email'];
if ($email == false)
{
	$erros[] = "Insira um e-mail válido.";
}
else if (BuscaUsuarioPorEmail($email) == true)
{
	$erros[] = "Já existe um aluno cadastrado com esse e-mail";
}

//senha
$senha = $validar['senha'];

if($senha == false)
{
	$erros[] = "Insira uma senha";
}

else if ( strlen($senha) < 6 || strlen($senha) > 12 )
{
	$erros[] = "A quantidade de caracteres da senha deve estar entre 6 e 12";
}

//confirmaSenha
$confirmaSenha = $validar['confirmaSenha'];

if ($senha != $validar['confirmaSenha'])
{
	$erros[] = "As senhas não correspondem";
}

$validar['senha'] = password_hash("$senha", PASSWORD_DEFAULT);

//tipo
$tipo = $validar['tipo'];
if ($tipo == false)
{
	$erros[] = "Selecione a opção";
}

//matricula
$matricula = $validar['matricula'];
if($matricula == false)
{
	$erros[] = "matrícula inválida";
}
else if (strlen($matricula) > 9 || strlen($matricula) < 7)
{
	$erros[] = "A quantidade de caracteres da matrícula é inválida";
}

if (empty( $erros ))
	{ insereUsuario ($validar);	}

?>


<?php foreach($erros as $msg) { ?>
	<li><?= $msg ?></li>

<?php } ?>


<?php

if ($erros != null)
{
	session_start();
	$_SESSION['erroLogin'] = $erros;
	header('location: ../cadastro.php');
}
else if ($erros == null)
{
	session_start();
	$_SESSION['emailUsuarioLogado'] = $email;
	$_SESSION['username'] = $nome;
	header('location: ../index.php');
}



?>

