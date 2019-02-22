<?php

require_once('../Banco de dados/criaConexãoBD.php');

require_once('../Banco de dados/tabelaCadastro.php');

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
	$usuario = BuscaUsuarioPorEmail($email);
	if ($usuario == false)
	{
		$erro = "Usuário não cadastrado";
	}
	else if (password_verify($senha, $usuario['senha']) == false)
	{
		$erro = "Senha inválida";
	}

}


session_start();
if ($erro == null)
{
		$_SESSION['usuariologado'] = $usuario['id'];
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
