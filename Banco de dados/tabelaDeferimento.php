<?php 
require_once('criaConexãoBD.php');

function LançaDeferimento($def)
{
		$db = criaConexaoBD();

	$sql = $db->prepare(
	"INSERT INTO deferimento (justificativa , decisao , pedidos)
	VALUES (:justificativa, :decisao , :pedidos)");
	
	$sql->bindValue(':justificativa', $def['justificativa']);
	$sql->bindValue(':decisao', $def['decisao']);
	$sql->bindValue(':pedidos', $def['pedidos']);

	

	$sql -> execute();


}

?>