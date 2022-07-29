<?php
    if(isset($_GET['nome'])){
        $nome = $_GET['nome'];
    }else {
        $nome = "Vazio";
    }
    if(isset($_GET['cor'])){
        $cor = $_GET['cor'];
    }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            background-color: <?php echo $cor?>;
        }
    </style>
</head>
<body>
    <h2>Olá <?php echo $_GET['nome']?></h2>
    <a href="metodo_get.php?nome=Pedro&&cor=green">Pedro</a><br>
    <a href="metodo_get.php?nome=Lucas&&cor=orange">Lucas</a><br>
    <a href="metodo_get.php?nome=Jonas&&cor=yellow">Jonas</a><br>
</body>
</html>