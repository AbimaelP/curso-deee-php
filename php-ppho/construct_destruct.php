<?php
  class Pai {
    public $nome;
    public $idade;
    function __construct($nome,$idade){
      $this->nome = $nome;
      $this->idade = $idade;
    }
    function informe(){
      echo "O nome é $this->nome e a idade é $this->idade";
    }
  }
  $pai1 = new Pai('Abimael',21);
  $pai1->informe();
?>