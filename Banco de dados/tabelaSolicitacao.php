<?php

require_once('criaConexãoBD.php');

function insereSolicitacao($solicit)
{
	$db = criaConexaoBD();

	$sql = $db->prepare(
	"INSERT INTO pedidos (cadastro, disciplina_turma, justificativa, arquivo)
	VALUES (:cadastro, :disciplina_turma, :justificativa, :arquivo);");

	$sql->bindValue(':cadastro', $solicit['cadastro']);
	$sql->bindValue(':disciplina_turma', $solicit['disciplina_turma']);
	$sql->bindValue(':justificativa', $solicit['justificativa']);
	$sql->bindValue(':arquivo', $solicit['arquivo']);

	$sql -> execute();

}


?>
