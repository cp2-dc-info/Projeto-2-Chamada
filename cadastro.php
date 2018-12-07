<!DOCTYPE html>

<html>
<head>
  <meta charset="UTF-8"/>
  <title>Colégio Pedro II</title>
  <link rel="icon" href="Imagens/favi.ico" type="image/ico" sizes="64x64">
  <link rel="stylesheet" type="text/css" href="CSS/styleCadastrar.css">
  <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>

<body>
  <div id="login-box">


    <div id="login-logo">
      <img src="logo.png" id="logo" alt="CP2">
    </div>

    <div id="login-descricao">

      <p id=cadastre></p>
      <form id="formulario" method="POST" action='Controle/Usuario/cadastraUsuario.php' novalidate>

      </br><input name="nomeCompleto" type="text"  placeholder="Nome" style="width:150px;font-size:16px;" width minlenght=3 maxlength=60 required/>

        <input name="nomeUsuario" type="text" placeholder="Nome de usuário" style="width:150px; font-size:16px;" minlenght=3 maxlength=35 required/><br/>

        <br/><input name="senha" type="password" placeholder="Senha" style="width:150px; font-size:16px"  minlenght=6 maxlength=12 required/>

        <input name="confirmaSenha" type="password" placeholder="Confirmar senha" style="width:150px; font-size:16px" minlenght=6 maxlength=12 required/><br/>

        <br/><input name="email" type="email" placeholder="E-mail" style="width:150px; font-size:16px" required/><br/>


        <label><input name="alertasEmail" type="checkbox"/>Receber alertas por e-mail.</label><br/>

      </br><input class ="botao btn btn-primary" type="submit" value="Criar conta"/>

      </form>
    </div>


  </div>

</body>

</html>
