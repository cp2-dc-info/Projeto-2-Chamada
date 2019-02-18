<?php

require_once('../Banco de dados/criaConexãoBD.php');

function BuscaUsuarioPorEmail(string $email)
	{
		$bd = criaConexaoBD();

		$sql = $bd->prepare("SELECT email, senha 
			FROM cadastro 
			WHERE email = :email");

		$sql -> bindValue(':email', $email);

		$sql->execute();

		return $sql -> fetch();
	}

$erro = null;

$request = array_map('trim', $_REQUEST);
$request = filter_var_array(
               $request,
               [ 'email' => FILTER_VALIDATE_EMAIL,
                 'senha' => FILTER_DEFAULT ]
           );


$email = $request['email'];
$senha = $request['senha'];

if ($email == false)
{
	$erro = "E-mail inválido ou não informado";
}
else if ($senha == false)
{
	$erro = "Senha inválida ou não informada";
}
else
{
	$usuário = BuscaUsuarioPorEmail($email);
	if ($usuário == false)
	{
		$erro = "Usuário não cadastrado";
	}
	else if (password_verify($senha, $usuário['senha']) == false)
	{
		$erro = "Senha inválida";
	}
	
}


session_start();
if ($erro == null)
{
		$_SESSION['emailUsuarioLogado'] = $usuário['email'];
		$user_name = $usuario['nome'];
		$_SESSION['username'] = $user_name;	
		header('Location: ../Inicio.php');

}
else
{
	$_SESSION['erroLogin'] = $erro;

	header('Location: ../Index.php');

}
?>