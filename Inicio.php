<?php
session_start();

if(array_key_exists('usuariologado', $_SESSION ) && array_key_exists('username' ,$_SESSION  ))
{
  $username = $_SESSION['username'];
  $id = $_SESSION['usuariologado'];

}

if(array_key_exists('sucesso', $_SESSION))
{
  $msg = $_SESSION['sucesso'];
  unset($_SESSION['sucesso']);
}
else {
  $msg = null;
}

?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8"/>
  <title>Colégio Pedro II</title>

  <link rel="icon" href="Imagens/favi.ico" type="image/ico" sizes="64x64">
  <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="CSS/styleInicio.css">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>

<body>

  <div id="login-box">

    <div id="login-logo">
      <img src="logo.png" id="logo" alt="CP2">
    </div>

    <?php if ($msg != null) { ?>
      <div class="alert alert-success">
        <?= $msg ?>
      </div>
    <?php } ?>

     <H3> Seja bem vindo a <?php echo $username; ?></H3>
    <a href="solicitacao.php" class="button" type="button"><button class="button">Solicitação</button></a>
    <a href="Acompanhamento.php" class="button" type="button"><button class="button">Acompanhamento</button></a>
    <button type="button" class="button">Contato</button>
    <a href="Controladores/sair.php" class ="button" type="button"><button class="button"> Sair </button> </a>

<footer class="rodape">
  <article>Plataforma desenvolvida por alunos do Colégio Pedro II - Duque de Caxias</article>
</footer>

  </div>

</body>
</html>
