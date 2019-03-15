<?php

require_once('criaConexãoBD.php');

function insereSolicitacao($solicit)
{
	$db = criaConexaoBD();

	$sql = $db->prepare(
	"INSERT INTO pedidos (cadastro, disciplina_turma, justificativa, arquivo)
	VALUES (:cadastro, :disciplina_turma, :justificativa, :arquivo );");

	$sql->bindValue(':cadastro', $solicit['cadastro']);
	$sql->bindValue(':disciplina_turma', $solicit['disciplina_turma']);
	$sql->bindValue(':justificativa', $solicit['justificativa']);
	$sql->bindValue(':arquivo', $solicit['arquivo']);
	

	$sql -> execute();

}

function BuscaAcompanhamento($id)
	{
		$bd = criaConexaoBD();

		$sql = $bd->prepare("SELECT * FROM pedidos
			WHERE cadastro = :valId
			");

			$sql->bindValue(':valId', $id);


		$sql->execute();

		return $sql -> fetchall();
	}

	function BuscaAcompanhamentoAdmin()
		{
			$bd = criaConexaoBD();

			$sql = $bd->prepare("SELECT pedidos.*, cadastro.nome AS nomeAluno
				                   FROM cadastro JOIN pedidos
												   ON cadastro.id = pedidos.cadastro
			");

			$sql -> execute();

			return $sql -> fetchall();



	}


?>
