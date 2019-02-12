<?php

require_once('criaConexãoBD.php');

function insereUsuario($dadosNovoUsuario)
{
	$db = criaConexaoBD();

	$sql = $db->prepare(
	"INSERT INTO cadastro (nome, sobrenome, email, senha, matricula, tipo)
	VALUES (:nome, :sobrenome, :email, :senha, :matricula, :tipo);");

	$sql->bindValue(':nome', $dadosNovoUsuario['nome']);
	$sql->bindValue(':sobrenome', $dadosNovoUsuario['sobrenome']);
	$sql->bindValue(':email', $dadosNovoUsuario['email']);
	$sql->bindValue(':senha', $dadosNovoUsuario['senha']);
	$sql->bindValue(':tipo', $dadosNovoUsuario['tipo']);
	$sql->bindValue(':matricula', $dadosNovoUsuario['matricula']);

	$sql->execute();
}

?>