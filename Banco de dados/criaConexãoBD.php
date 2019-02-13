<?php

	function criaConexaoBd()

	{
		$bd = new PDO('mysql:host=localhost;dbname=segundachamada;charset=utf8',
					'segundachamada',
					'123456');

		$bd ->setAttribute(PDO::ATTR_ERRMODE,
							PDO::ERRMODE_EXCEPTION);

		return $bd;
	}

?>
