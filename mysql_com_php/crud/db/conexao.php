<?php
$servidor = "localhost";
$usuario = "rooter";
$senha = "123";
$banco = "primeiro_banco";
try {
  $pdo = new PDO("mysql:host=$servidor;dbname=$banco",$usuario,$senha);
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch(PDOException $error){
  echo "Falha ao conectar com o banco de dados".$error->getMessage();
}
//FUNÇÃO PARA LIMPAR ENTRADAS
function filtraInput($valor){
  $valor = trim($valor);
  $valor = stripslashes($valor);
  $valor = htmlspecialchars($valor);
  return $valor;
}

//FUNÇÃO PARA VERIFICAR SE AS ENTRADAS SÃO VALIDAS
function checaInput($valor){
  if ($valor == "" || $valor == null){
    return true;
  }
}
?>