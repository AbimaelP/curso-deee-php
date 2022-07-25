<?php
    $pessoas = ["Carlos","João","Mateus"];
    foreach($pessoas as $x){
        global $nome;
        $nome = array($x);
        var_dump($nome);
        }

?>