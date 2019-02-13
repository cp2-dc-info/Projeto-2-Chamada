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

</head>

<body>

  <div id="login-box">

    <div id="login-logo">
      <img src="logo.png" id="logo" alt="CP2">
    </div>

    <div class="Container">
        

<form id="formulario" method="POST" action='Controladores/phpsolicitacao.php' novalidate>

<div class="campo">
    <label>Disciplina:</label>
    <select>
      <option value="">Selecione a disciplina</option>
      <option value="1">Matemática</option>
      <option value="2">Português</option>
      <option value="3">Biologia</option>
      <option value="4">Geografia</option>
      <option value="5">História</option>
      <option value="6">Filosofia</option>
      <option value="7">Sociologia</option>
    </select>
</div>

<div class="campo">
  <label>Turma</label>
    <input type="text" placeholder="Turma">
  
</div>

<div class="campo">
     <label>Justifique:</label>
    <input type="text"  placeholder="Descrição"/>
</div>

<div id="checkbox" class="campo2">
    <label>Você é:</label>
    <input type="checkbox"> Integrado 
    <input type="checkbox"> Regular 
</div>
  <a href="Inicio.php" class="button" type="button"><button class="button">Voltar</button></a>
  <button type="button" class="button">Enviar</button>
</form>


    </div>
<footer class="rodape">
  <article>Plataforma desenvolvida por alunos do Colégio Pedro II - Duque de Caxias</article>
</footer>

  </div>

</body>
</html>
