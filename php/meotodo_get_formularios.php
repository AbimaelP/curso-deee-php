<?php
    if (isset($_GET['nome']) && isset($_GET['idade'])){
        $nome = $_GET['nome'];
        $idade = $_GET['idade'];
        echo "<h2>meu nome é $nome e eu tenho $idade anos</h2>";
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="get">
        <input type="text" name="nome" placeholder="Digite seu nome aqui">
        <input type="text" name="idade" placeholder="Digite sua idade aqui">
        <button type="submit">Enviar</button>
    </form>
</body>
</html>