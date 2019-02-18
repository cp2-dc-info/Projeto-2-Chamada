<?php
/*
$erro = null;

if(array_key_exists('arquivo', $_FILES) == false)
{
	$erro = "Arquivo não carregado.";
}
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

*/

<?php

require_once('../modelo/tabelaupload.php');
require_once('../modelo/tabelausuario.php');
$request = array_map('trim', $_REQUEST);
$request = filter_var_array(
               $request,
               [
                'justificativa' => FILTER_VALIDATE_INT
                 ]
           );
$erro = [];

$justificativa = $justificativa['ano'];
if ($justificativa == false)
{
	$erros[] = "Deve ter ano;";
}
else if($justificativa < 0 || $justificativa > 4)
{
	$erros = "Ano inválido";
}
if(isset($_FILES['arquivo'])):
	$formatosPermitidos =  array("pdf" ,"jpeg" , "docx" ,"doc","txt" ,"png"  );
	$extensao = pathinfo($_FILES['arquivo']['name'], PATHINFO_EXTENSION);
	if (in_array($extensao, $formatosPermitidos)):
		$temporario	= $_FILES['arquivo']['tmp_name'];
		$novoNome = basename($_FILES['arquivo']['name']);
		$pasta = "arquivos/$novoNome";
		if (Pesquisaarquivos($novoNome) != false)
		{		
			$erros[] = "o arquvo do mesmo nome ja foi adicionado";
  		}
		else if(move_uploaded_file($temporario,"../$pasta")):
			$request['arquivo'] = $pasta;
			$request['nome'] = $novoNome;
			$request['usuariosid'] = $master['id'];
			$menssagem = "Upload feito com sucesso!";
			$id = upload_feito($request);
   			
		else:
			$erros = "Erro, não foi possivel fazer o upload!";
		endif;
	else:
		$erros = "Formato inválido";
	endif;
endif;
 if (empty($erros))
    {
		
		 header("Location:../exercicios.php?ano=$ano");
	}
	
    else
    {
     
      $_SESSION['errosup'] = $erros;
      header("Location:../exercicios.php?ano=$ano");
      
    }
?>
?>
