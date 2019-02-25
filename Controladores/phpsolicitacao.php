<?php

require_once('../Banco de dados/tabelaSolicitacao.php');
require_once('../Banco de dados/tabelaDisciplinaTurma.php');

session_start();

$erro = null;

$request = array_map('trim', $_REQUEST);
$request = filter_var_array(
               $request,
               [
                'turma' => FILTER_VALIDATE_INT,
                'justificativa' => FILTER_DEFAULT,
                'disciplina' => FILTER_VALIDATE_INT
                 ]

           );

$justificativa = $request['justificativa'];
if ($justificativa == false)
{
	$erros = "Deve ter justificativa";
}

$request['disciplina_turma'] =  Busca_id_disciplinaturma($request);
if ($request['disciplina_turma'] == false)
{
  $erros = "Selecione as opções corretamente.";
}

$request['cadastro'] =  $_SESSION['usuariologado'];

if(array_key_exists('arquivo', $_FILES) == false)
{
	$erro = "Arquivo não carregado.";
}

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
   $msg = "Deu tudo certo";
}
else{
  echo "Deu tudo errado";
  echo $erro;
}

if ($erro != null)
{
	$_SESSION['erroSolicit'] = $erro;

	header('location: ../solicitacao.php');
}
else
{
  $request['arquivo'] = $caminhoCompleto;
  $request['nome'] = $nomeOrig;

	$id = insereSolicitacao($request);
  $_SESSION['arquivos'] = $id;
	header('location: ../Inicio.php');
  $_SESSION['sucesso'] = $msg;
}

?>
