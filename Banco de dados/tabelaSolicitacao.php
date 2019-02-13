<?php

require_once('criaConexãoBD.php');

function insereSolicitacao($solicit)
{
	$db = criaConexaoBD();

	$sql = $db->prepare(
	"INSERT INTO pedidos (cadastro, disciplina_turma, justificativa)
	VALUES (:nome, :sobrenome, :email, :senha, :matricula, :tipo);");

}
?>