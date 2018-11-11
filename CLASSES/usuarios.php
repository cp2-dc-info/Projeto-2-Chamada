<?php

class Usuario
{
    private $pdo;
    public msgERRO = ""; //Tudo OK

    public function conectar ($nome, $host, $usuario, $senha)  //Criar conexão com o Banco de Dados
    {
        global $msgErro
        global $pdo;  //para entender que é a mesma variável de cima
      try
      {
          $pdo = new PDO("mysql:dbname=".$nome.";host=".$host,$usuario,$senha);
      } catch (PDOException $e) {
        $msgErro = $e->getMessage();
      }

    }

    public function cadastrar($nome, $email, $emailResponsavel, $telefone, $matricula, $senha, $confSenha) //Enviar informações par ao Banco de Dados
    {
        global $pdo;
//Verificar se já existe o email cadastrado
        $sql = $pdo->prepare("SELECT id_usuario FROM usuario WHERE  email = :e");
        $sql->bindValue(":e", $email);
        $sql->execute();
        if($sql->rowCount() > 0)
        {
          return false; //Já está cadastrada
        }
        else
        {
            //Caso não, Cadastrar
          $sql = $pdo->prepare("INSERT INTO usuarios (nome, email, emailResponsavel, telefone, matricula, senha, confSenha) VALUES (:n, :e, :r, :t, :m, :s, :c)");
          $sql->bindValue(":n", $nome);
          $sql->bindValue(":e", $email);
          $sql->bindValue(":r", $emailResponsavel);
          $sql->bindValue(":t", $telefone);
          $sql->bindValue(":m", $matricula);
          $sql->bindValue(":s",md5 ($senha));
          $sql->bindValue(":c", $confSenha);
          $sql->execute();
          return true;
        }
      }


      public function logar($email, $senha) /*Verificar se estar logador ou não*/
      {
         global $pdo;
         //Verificar se o email e senha estão cadastrados, caso estejam
         $sql = $pdo->prepare("SELECT id_usuario FROM usuario WHERE email = :e AND senha :s");
         $sql->bindValue(":e",$email);
         $sql->bindValue(":s",md5 ($senha));
         $sql->execute();
         if($sql->rowCount() > 0)
         {
              //Entrar no sistema (Sessão)
              $dado = $sql->fetch(); //Pegar tudo que veio do banco e transformar em um array
              session_start();
              $_SESSION['id_usuario'] = $dado['id_usuario'];
              return true; //logado com Sucesso
         }
         else
         {
            return false; //Não foi possível logar
         }


      }
}


 ?>
