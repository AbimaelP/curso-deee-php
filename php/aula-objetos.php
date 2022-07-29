<?php
	class Carro {
		public $modelo;
		public $cor;
		public function __construct($modelo,$cor){
			$this->modelo = $modelo;
			$this->cor = $cor;
		}
		public function dirInform(){
			return "o carro é um $this->modelo e a cor é $this->cor";
		}
	}
	$carro1 = new Carro("Fusca","Azul");
	echo $carro1->dirInform();
?>
