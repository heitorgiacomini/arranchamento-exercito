<?php
  require ('php/config.php'); 
  require ('php/connection.php'); #connection deve ser chamado antes do database 
  require ('php/database.php');

  
  $soldado = 601; 
  $novo;
  //for($i = 1; $i <= 41; $i++) {
    $novo ='13'.$soldado;
    echo $novo;
     DBUpdate("usuario", "nmr_posto= '12'", "numero= '2'");
    $soldado++;
  //}
?>