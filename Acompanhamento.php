<?php

require_once('Banco de dados/tabelaSolicitacao.php');

session_start();
if(array_key_exists('username', $_SESSION))
{

  $username = $_SESSION['username'];
  $email = $_SESSION['usuariologado'];

}
else
  {
    $_SESSION['erroLogin'] = "Identifique-se para acessar o site";
    header('location: Index.php');
    exit();
  }

$acompanhamento = BuscaAcompanhamento();

 ?>
 <!DOCTYPE html>
 <html>
 <head>
   <meta charset="UTF-8"/>
   <title>Colégio Pedro II</title>

   <link rel="icon" href="Imagens/favi.ico" type="image/ico" sizes="64x64">
   <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
   <link rel="stylesheet" type="text/css" href="CSS/styleAcompanhamento.css">
 </head>

 <body>

   <div id="login-box">

     <div id="login-logo">
       <img src="logo.png" id="logo" alt="CP2">
     </div>
     <div class="container">
     </br></br></br>
       <table class="table table-hover">

         <thead>
           <tr>
             <th>Arquivo</th>
             <th>Justificativa</th>
             <th>Data/Hora</th>
           </tr>
         </thead>
         <tbody>
<?php foreach ($acompanhamento as $acon ){ ?>
    <tr>
       <td><a href="<?= $acon['arquivo'];?>"><?= $acon['nome']?></td>
       <td><?= $acon['justificativa']; ?></td>
       <td><?= $acon['datahora']; ?></td>

     </tr>
     <?php } ?>
       </table>
     </div>


  </body>
