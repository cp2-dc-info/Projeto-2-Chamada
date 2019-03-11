<?php
session_start();
require_once('Banco de Dados/tabelaDisciplinaTurma.php');


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




$Listaturma = Listaturma();

$lista_disciplina_por_turma = [];
foreach (BuscaDisciplinasTurma() as $linha)
{
  $idTurma = $linha['idTurma'];
  $lista_disciplina_por_turma[$idTurma][] = $linha;
}

 ?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8"/>
  <title>Colégio Pedro II</title>

  <link rel="icon" href="Imagens/favi.ico" type="image/ico" sizes="64x64">
  <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="CSS/styleSolicitacao.css">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <script>
    const listaDisciplinasPorTurma = <?= json_encode($lista_disciplina_por_turma, JSON_UNESCAPED_UNICODE) ?>;

    function updateOrder(selectTurma)
    {
      const turma = selectTurma.value;

      const select = document.getElementById('disciplina');

      // Remove as disciplinas da turma selecionada anteriormente,
      // deixando apenas a 1ª aopção ("Selecione a disciplina"):
      select.options.length = 1;


      // Popula as opções de disciplina da turma
      const disciplinasTurma = listaDisciplinasPorTurma[turma];

      for (const i in disciplinasTurma)
      {
        const disciplina = disciplinasTurma[i];

        option = document.createElement('option');
        option.value = disciplina.id;
        option.text = disciplina.nome;
        select.add (option);
      }
    }

  </script>
</head>

<body>

  <div id="login-box">

    <div id="login-logo">
      <img src="logo.png" id="logo" alt="CP2">
    </div>

    <div class="Container">


<form id="formulario" method="POST" action='Controladores/phpsolicitacao.php' enctype="multipart/form-data">



<div class="campo">
  <label>Turma</label>
    <select id="turma" name="turma"  onchange = "updateOrder(this)">
            <option value="">Selecione a Turma</option>

      <?php foreach ($Listaturma as $turmas) { ?>
      <option value="<?= $turmas['id']?>"><?php echo $turmas['turma']?></option>
  <?php } ?>
    </select>

</div>

<div class="campo">
    <label>Disciplina:</label>
    <select id="disciplina" name="disciplina">
            <option value="">Selecione a disciplina</option>
    </select>
</div>

<div class="campo">
     <label>Justifique:</label>
     <textarea name="justificativa"></textarea>

        <br><b>Selecione o arquivo:</b></br> <input name="arquivo" size="10" type="file" required/>

        <button class="button" type="submit">Enviar</button>
</div>

  </form>

  <a href="Inicio.php" class="button" type="button"><button class="button">Voltar</button></a>

    </div>

<footer class="rodape">
  <article>Plataforma desenvolvida por alunos do Colégio Pedro II - Duque de Caxias</article>
</footer>

  </div>

</body>
</html>
