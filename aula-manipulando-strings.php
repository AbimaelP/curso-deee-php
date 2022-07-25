<?php
    $texto = "O rato roeu a roupa do rei de roma";
    echo strlen($texto) ."<br/>";
    echo str_word_count($texto) ."<br/>";
    echo strrev($texto) ."<br/>";
    echo strpos($texto, "rei") ."<br/>";
    echo str_replace("rato","gato",$texto)
?>