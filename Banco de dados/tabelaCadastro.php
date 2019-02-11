<?php

require_once('criaConexãoBD.php');

function insereUsuario($dadosNovoUsuario)
{
	$db = criaConexaoBD();

	$sql = $db->prepare(
	"INSERT INTO cadastro (nome, sobrenome, email, senha, matricula, tipo)
	VALUES (:nome, :sobrenome, :email, :senha, :matricula, :tipo);");

	$hash = password_hash($dadosNovoUsuario['senha'], PASSWORD_DEFAULT);

	$sql->bindValue(':nome', $dadosNovoUsuario['nome']);
	$sql->bindValue(':sobrenome', $dadosNovoUsuario['sobrenome']);
	$sql->bindValue(':email', $dadosNovoUsuario['email']);
	$sql->bindValue(':senha', $hash);
	$sql->bindValue(':tipo', $dadosNovoUsuario['tipo']);
	$sql->bindValue(':matricula', $dadosNovoUsuario['matricula']);

	$sql->execute();
}
	function BuscaUsuarioPorEmail($email)
	{
		$bd = criaConexaoBD();

		$sql = $bd->prepare('SELECT * 
			FROM cadastro 
			WHERE email = :email');

		$sql->bindValue(':email', $email);

		$sql->execute();

		return $sql->fetch();
	}



?>