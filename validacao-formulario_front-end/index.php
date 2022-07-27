<?php
$erroNome = "";
$erroEmail = "";
$erroSenha = "";
$erroRepeteSenha = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    //VERIFICA VALOR DO NOME SE ESTA VAZIO
    if (empty($_POST['nome'])){
      $erroNome = 'Por favor, preencha um nome';
    }else {
      //SE NAO ESTIVER VAZIO ELE RECEBE O QUE ESTA NO INPUT, E REALIZA UMA VERIFICAÇÃO
      //SE A VERIFICAÇÃO NÃO PASSAR NO pre_match ELA RETORNA UM ERRO
      $nome = cleanPost($_POST['nome']);
      if(!preg_match("/^[a-zA-Z-']*$/",$nome)){
        $erroNome = "Apenas aceitamos letras e espaços em branco";
     }
    }
  if (empty($_POST['email'])){  
    $erroEmail = 'Por favor, preencha o campo email';
  }else {
    $email = cleanPost($_POST['email']);  
    if (!filter_var($email,FILTER_VALIDATE_EMAIL)){
      $erroEmail = "E-mail inválido";
    }
  }
  //VERIFICAR SE A SENHA ESTA VAZIA
  if(empty($_POST['senha'])){
    $erroSenha = "Por favor insira uma senha";
  }else {
    //VERIFICAR SE ELA TEM O NUMERO MINIMO DE CARACTERES
    $senha = $_POST['senha'];
    if (strlen($senha) < 6){
      $erroSenha = "A senha precisa ter no minimo 6 digitos";
  }
  }
    //VERIFICAR SE REPETE SENHA TA VAZIO
  if(empty($_POST['repete_senha'])){
    $erroRepeteSenha = "Por favor insira uma senha";
  }else {
    //VERIFICAR SE ELA É IGUAL A SENHA
    $repeteSenha = $_POST['repete_senha'];
    if ($repeteSenha !== $senha){
      $erroRepeteSenha = "Precisa ser igual a senha";
  }
  }
}
  
  function cleanPost($valor){
    $valor = trim($valor);
    $valor = stripcslashes($valor);
    $valor = htmlspecialchars($valor);
    return $valor;
  }
  function digitaValue($n){
    if(isset($_POST[$n])){
      echo "value='$_POST[$n]'";
    }
  }
  function checaSeValido($n){
    if(!empty($n)){echo "class='invalido'";}
  }
  if (empty($erroNome) && empty($erroEmail) && empty($erroSenha) && empty($erroRepeteSenha)){
    header('Location: obrigado.php');
  }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Validação de Formulário</title>
    <link href="css/estilo.css" rel="stylesheet">
</head>
<body>
    <main>
    <h1><span>AULA PHP</span><br>Validação de Formulário</h1>

     <form method="post">

        <!-- NOME COMPLETO -->
        <label> Nome Completo </label>
        <input type="text" name="nome" <?php checaSeValido($erroNome)?><?php digitaValue('nome')?> placeholder="Digite seu nome" required>
        <br><span class="erro"><?php echo $erroNome;?></span>

        <!-- EMAIL -->
        <label> E-mail </label>
        <input type="email" name="email" <?php checaSeValido($erroEmail)?><?php digitaValue('email')?> placeholder="email@provedor.com" required>
        <br><span class="erro"><?php echo $erroEmail;?></span>

        <!-- SENHA -->
        <label> Senha </label>
        <input type="password" name="senha" <?php checaSeValido($erroSenha)?><?php checaSeValido($erroSenha)?><?php digitaValue('senha')?> placeholder="Digite uma senha" required>
        <br><span class="erro"><?php echo $erroSenha;?></span>

        <!-- REPETE SENHA -->
        <label> Repete Senha </label>
        <input type="password" name="repete_senha" <?php checaSeValido($erroRepeteSenha)?> placeholder="Repita a senha" required>
        <br><span class="erro"><?php echo $erroRepeteSenha;?></span>

        <button type="submit"> Enviar Formulário </button>

      </form>
    </main>
</body>
</html>