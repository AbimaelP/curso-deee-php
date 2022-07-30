
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cadastro</title>
  <style> 
   table {
      border-collapse:collapse;
      width: 100%;
    }
  th,td {
    padding: 10px;
    text-align: center;
    border: 1px solid #ccc;
  }
  </style>
</head>
<body>
  <form method="post">
    <input type="text" placeholder="Digite seu nome" name="nome" ><br/>
    <input type="email" name="email" placeholder="Digite um email" ><br/>
    <input type="date" name="data" >
    <button type="submit" name="salvar">Salvar</button>
  </form>
</body>
</html>
<?php
  require("db/conexao.php");//INSERIR NO BANCO (modo simples)
  $sql = $pdo->prepare("SELECT * FROM clientes ORDER BY nome DESC LIMIT 0,5");
  $sql->execute();
  $dados = $sql->fetchAll();
?>

<?php
   //CRIACAO DA TABELA E IMPORTAÇÃO DE DADOS
   if(count($dados) > 0){
    echo 
    "<table>
    <tr>
      <th>ID</th>
      <th>Nome</th>
      <th>Email</th>
      <th>Ações</th>
    </tr>";
   foreach($dados as $chave => $valor){
    echo 
    "<tr>
      <td>".$valor['id']."</td>
      <td>".$valor['nome']."</td>
      <td>".$valor['email']."</td>
    </tr>";
   }
    echo "</table>";

   }else {
    echo "Nenhum cliente cadastrado";
   }
?>

<?php
$nome = "";
$email = "";
$data = "";
  
  if (isset($_POST['nome']) && isset($_POST['email']) && isset($_POST['data'])){
    $nome = filtraInput($_POST['nome']);
    $email = filtraInput($_POST['email']);
    $data = filtraInput($_POST['data']);

    switch (true) {
      case checaInput($nome):
        echo "Preencha um nome";
        exit();
        break;
      case checaInput($email):
        echo "Preencha um email";
        exit();
        break;
      case checaInput($data):
        echo "Insira uma data";
        exit();
        break;
      default:
        echo "<b style='color:green;'>Cadastro concluido</b>";
        break;
    }
    if (!filter_var($email,FILTER_VALIDATE_EMAIL)){
      echo "O email não é valido";
      exit();
    }
    foreach ($dados as $chave => $valor) {
     if($valor['nome'] == $nome || $valor['email'] == $email){
      echo "<br/>Esse nome de usuario ou email ja esta cadastrado";
      exit();
     } 
    }
      //MODO CORRETO ANTI SQL INJECTION
   $sql = $pdo->prepare("INSERT INTO clientes VALUE (null,?,?,?)");
   $sql->execute(array($nome,$email,$data));
  }

  /*$newNome = 'Paulo';
  $newEmail = 'paulomanso@hotmail.com';
  $nomeMuda = "abimaelsilva123";
  $sql = $pdo->prepare("UPDATE clientes SET nome=?,email=? WHERE nome=?");
  $sql->execute(array($newNome,$newEmail,$nomeMuda));
  */?>

  <?php
    $sql = $pdo->prepare("DELETE FROM clientes WHERE id=31");
    $sql->execute();
  ?>