<?php

$erro = null;

/*if(array_key_exists('arquivo', $_FILES) == false)
{
	$erro = "Arquivo não carregado.";
}*/
var_dump($_FILES);
if(!isset($_FILES['arquivo']))
{
  $erro = "errou";
}
else
{
	$arq = $_FILES['arquivo'];
	$pastaDestino = "Carregamentos";
	mkdir("../$pastaDestino");
	$prefixo = uniqid();
	$nomeOrig = basename($arq['name']);
	$nomeArq = "$prefixo-$nomeOrig";
	$caminhoCompleto = "$pastaDestino/$nomeArq";
	if($arq['error'] != UPLOAD_ERR_OK)
	{
		$erro = "Erro ao carregar o arquivo para o servidor.";
	}
	else if(move_uploaded_file($arq['tmp_name'], "../$caminhoCompleto") == false)
	{
		$erro = "Erro ao salvar o arquivo no servidor.";
	}
}

if($erro == null){
  echo "Deu tudo certo";
}
else{
  echo "Deu tudo errado";
  echo $erro;
}



?>
