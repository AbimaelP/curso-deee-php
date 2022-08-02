<?php
  function loadClass($nomeClass){
    $path = __DIR__.'/class/'.$nomeClass.'.php';
    if(is_file($path)){
      require($path);
    }
  }
  spl_autoload_register('loadClass');
?>