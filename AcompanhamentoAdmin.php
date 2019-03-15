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

$acompanhamento = BuscaAcompanhamentoAdmin();

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
             <th>Nome do Aluno</th>
             <th>Justificativa</th>
             <th>Arquivo</th>
             <th>Data/Hora</th>
             <!--<th>Deferimento</th> -->



           </tr>
         </thead>
         <tbody>
<?php foreach ($acompanhamento as $acon ){ ?>
    <tr>
      <td><?= $acon['nomeAluno']; ?></td>
      <td class="colJust"><?= $acon['justificativa']; ?></td>
       <td><a href="<?= $acon['arquivo'];?>"><?= $acon['arquivo']?></td>
       <td><?= $acon['datahora']; ?></td>

      <!--<td>
        <form action="Controladores/deferimento.php">
             <select name="decisao">
              <option>Selecione</option>
              <option value="0"> Deferir </option>
              <option value="1"> Indeferir </option>
            </select>

            <input name="pedidos" type="hidden" value="<?= $acon['id'] ?>">
            <br>
            <textarea name="justificativa" placeholder="Justificativa"></textarea>
           
            <input type="submit">

        </form>
      </td>
-->
     </tr>
     <?php } ?>
       </table>
     </div>


  </body>
