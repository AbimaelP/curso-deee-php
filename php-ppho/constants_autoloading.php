<?php
//CONSTANTES
  class Nome {
    const nomePessoa = "Abimael";
    const idadePessoa = 21;
    function exibeIdade(){
      echo self::idadePessoa;
    }
  }

  $pessoa1 = new Nome();
  //echo $pessoa1->exibeIdade();

  require('autoload.php');

  $car1 = new Carro();
  $car1->teste();
//  
?>