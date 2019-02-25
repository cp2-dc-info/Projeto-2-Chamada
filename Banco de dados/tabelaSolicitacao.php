<?php

require_once('criaConexãoBD.php');

function insereSolicitacao($solicit)
{
	$db = criaConexaoBD();

	$sql = $db->prepare(
	"INSERT INTO pedidos (cadastro, disciplina_turma, justificativa, arquivo,nome)
	VALUES (:cadastro, :disciplina_turma, :justificativa, :arquivo, :nome);");

	$sql->bindValue(':cadastro', $solicit['cadastro']);
	$sql->bindValue(':disciplina_turma', $solicit['disciplina_turma']);
	$sql->bindValue(':justificativa', $solicit['justificativa']);
	$sql->bindValue(':arquivo', $solicit['arquivo']);
	$sql->bindValue(':nome', $solicit['nome']);

	$sql -> execute();

}

function BuscaAcompanhamento()
	{
		$bd = criaConexaoBD();

		$sql = $bd->prepare("SELECT * FROM pedidos");

		$sql->execute();

		return $sql -> fetchall();
	}

?>
