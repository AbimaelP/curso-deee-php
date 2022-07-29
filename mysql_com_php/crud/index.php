<?php
 $nome="";
 $erroNome="";
 $email="";
 $erroEmail="";
 $data="";
 $erroData="";
  if (isset($_POST['nome'])){
    $nome = $_POST['nome'];
  }else {
    $erroNome = 'Não foi digitado nenhum nome';
  }
  if (isset($_POST['email'])){
    $email = $_POST['email'];
  }else {
    $erroEmail = 'Não foi digitado nenhum nome';
  }
  if (isset($_POST['data'])){
    $data = $_POST['data'];
  }else {
    $erroData = 'Não foi digitado nenhum nome';
  }
  
  function securePost($value){
    $value = trim($value);
    $value = stripcslashes($value);
    $value = htmlspecialchars($value);
    return $value
  }
  //INSERIR NO BANCO (modo simples)
  require("db/conexao.php");
  //$sql = $pdo->prepare("INSERT INTO clientes VALUE (null,'Abimael','a.bimael2000@hotmail.com','18-09-2022')");
  //$sql->execute();

  //MODO CORRETO ANTI SQL INJECTION
  $sql = $pdo->prepare("INSERT INTO clientes VALUE (null,?,?,?)");
  $sql->execute(array($nome,$email,$data));
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cadastro</title>
</head>
<body>
  <form method="post">
    <input type="text" placeholder="Digite seu nome" name="nome" required><br/>
    <input type="email" name="email" placeholder="Digite um email" required><br/>
    <input type="date" name="data" required>
    <button type="submit" name="salvar">Salvar</button>
  </form>
  
</body>
</html>