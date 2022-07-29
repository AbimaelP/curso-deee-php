<?php
    $nome_arquivo = date('y-m-d-H-i-s').'.txt';
    echo $nome_arquivo;
    $arquivo = fopen('pasta/'.$nome_arquivo,'a+');
    fwrite($arquivo,'linha injetada pelo php'.PHP_EOL);
    fwrite($arquivo,'linha injetada pelo php 2'.PHP_EOL);
    fclose($arquivo);
    if(file_exists('pasta/'.$arquivo) && is_file){
        
    }
?>