<?php
require_once('criaConexãoBD.php');

//Precisa finalizar a validação da senha abaixo...

$db = criaConexãoBD();

$sql = $db->prepare('UPDATE cadastro SET senha = :valSenha where id = :valId');

	$sql -> bindValue(':valSenha', $senha);
  $sql -> bindValue(':valId', $id);


?>
