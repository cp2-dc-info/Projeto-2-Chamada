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

	return $db -> lastInsertId();
}

function BuscaUsuarioPorEmail(string $email)
	{
		$bd = criaConexaoBD();

		$sql = $bd->prepare("SELECT id, email, senha ,nome, tipo
			FROM cadastro
			WHERE email = :email");

		$sql -> bindValue(':email', $email);

		$sql->execute();

		return $sql -> fetch();
	}

	function BuscaUsuarioPorMatricula($matricula)
		{
			$bd = criaConexaoBD();

			$sql = $bd->prepare("SELECT matricula
				FROM cadastro
				WHERE matricula = :matricula");

			$sql -> bindValue(':matricula', $matricula);

			$sql->execute();

			if ($sql -> rowCount() == 0)
    {
      return 0;
    }
    else
    {
      return 1;
    }
		}


?>
