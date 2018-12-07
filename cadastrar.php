<?php
  require_once 'CLASSES/usuarios.php';
  $u = new Usuario;
 ?>

<html lang="pt-BR">
<head>
    <meta charset="utf-8"/>
    <link rel="stylesheet" href="estilo.css">
</head>
<body>
<div id="corpo-form-cad">
  <h1>Cadastrar</h1>
  <form method="POST">
      <input type="text" name="nome" placeholder="Nome Completo" maxlength="30">
      <input type="email" name="email" placeholder="Email" maxlength="40">
      <input type="email" name="emailResponsavel" placeholder="Email do Responsável" maxlength="40">
      <input type="text" name="telefone" placeholder="Telefone" maxlength="30">
      <input type="text" name="matricula" placeholder="Matrícula" maxlength="30">
      <input type="password" name="senha" placeholder="Senha" maxlength="15">
      <input type="password" name="confSenha" placeholder="Confirmar Senha" maxlength="15">
      <input type="submit" value="Cadastrar">
    </form>
</div>
<?php
//Verificar se a pessoa clicou no botão
if(isset($_POST['nome']))
{
  $nome = addslashes($_POST['nome']);
  $email = addslashes($_POST['email']);
  $emailResponsavel = addslashes($_POST['emailResponsavel']);
  $telefone = addslashes($_POST['telefone']);
  $matricula = addslashes($_POST['matricula']);
  $senha = addslashes($_POST['senha']);
  $confSenha = addslashes($_POST['confSenha']);
  //Verificar se não estar vazio
  if(!empty($nome) && !empty($email) && !empty($emailResponsavel) && !empty($telefone) && !empty($matricula) && !empty($senha) && !empty($confSenha))
  {
    $u->conectar("Projeto_login","localhost","root","");
    if($u->msgErro == "") // Se está vazia, tudo OK
    {
        if($senha == $confSenha)
        {
            if($u->cadastrar($nome, $email, $emailResponsavel, $telefone, $matricula, $senha));
              {
                  ?>
                  <div id="msg-sucesso">
                  Cadastrado com Sucesso! Acesse para entrar!
                  </div>
                  <?php
              }
              else
              {
                ?>
                <div class="msg-erro">
                Email já cadastrado!
                </div>
                <?php
              }
        }
        else
        {
          ?>
          <div class="msg-erro">
          Senhas não correspondem!
          </div>
          <?php
        }

    }
    else
    {
        ?>
        <div class="msg-erro">
          <?php  echo "Erro: ".$u->msgErro;?>
        </div>
        <?php
    }
  }else
  {
    ?>
    <div class="msg-erro">
    Preencha todos os campos!
    </div>
    <?php
  }
}


?>

</body>
</html>
