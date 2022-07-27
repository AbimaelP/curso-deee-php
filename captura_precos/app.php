<?php
$link = 'https://www.paodeacucar.com/produto/147749/cereal-matinal-nescau-tradicional-30g';
preg_match_all('/(produto\/)[0-9\/]{0,20}[a-z]{0,15}[-]{1}[a-z]{0,15}[-]{1}[a-z]{0,15}/',$link,$nomes);


$url = file_get_contents($link);
preg_match_all('/[R$ ]+[0-9]{1,3}[,][0-9]{2}/',$url,$conteudo);
//$resultado = $conteudo[0];
echo $nomes[0][0].": ". $conteudo[0][0];
?>
