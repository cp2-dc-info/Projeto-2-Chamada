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
        

<form id="formulario">

<div class="campo">
    <label>Nome Completo:</label>
    <input type="text" placeholder="Nome"/>
</div>


<div class="campo">
    <label>Matéria:</label>
    <input type="text" placeholder="Nome"/>
</div>

<div class="campo">
  <label>Série</label>
  <select value="Selecione(select)">
      <option disabled>1 Série</option>
      <option disabled>2 Série</option>
      <option disabled>3 Série</option>
  </select>
</div>

<div class="campo">
    <input type="text"  placeholder="Descrição"/>
</div>

<div id="checkbox" class="campo2">
    <label>Você é:</label>
    <input type="checkbox"> Integrado 
    <input type="checkbox"> Regular 
</div>

</form>


    </div>
<footer class="rodape">
  <article>Plataforma desenvolvida por alunos do Colégio Pedro II - Duque de Caxias</article>
</footer>

  </div>

</body>
</html>
