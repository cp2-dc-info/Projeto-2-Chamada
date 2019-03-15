<?php 
require_once('../Banco de dados/tabelaDeferimento.php');
require_once('../Banco de dados/tabelaSolicitacao.php');
session_start();
$erros = null;


$request = array_map('trim', $_REQUEST);
$request = filter_var_array(
               $request,
               [
                
                'pedidos' =>FILTER_VALIDATE_INT,
                'justificativa' => FILTER_DEFAULT,
                'decisao' => FILTER_VALIDATE_INT,

                
                 ]

           );


$pedidos = $request['pedidos'];
if ($pedidos == false )
{
   $erros = "tem nada nn";
}


$justificativa = $request['justificativa'];
if ($justificativa == false)
{
	$erros = "Deve ter justificativa";
}
$decisao = $request['decisao'];
if ($decisao >1 && $decisao < 0)
{
  $erros = "So pode ser zero ou um seu otario";
} 

if ($erros != null)
{
	$_SESSION['erroSolicit'] = $erros;

	header('location: ../AcompanhamentoAdmin.php');
}
else
{
  
	$id = LançaDeferimento($request);
 	header('location: ../AcompanhamentoAdmin.php');
  	$_SESSION['sucesso'] = $msg;
}

?>