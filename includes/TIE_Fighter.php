<?php
include_once 'Casa_estelar.php';
class TIE_Fighter extends Casa_estelar{

  public function __construct($numero_serie,$fabricant){
    parent::__construct($numero_serie,$fabricant);
  }
  public function reparar(){

  }
  public function disparar($CE){
    parent::disparar($CE);
  }
  public function escollir_accio($CE){
    $r = rand(1,2);
    if($r==1){
      $this->reparar();
    }else{
      $this->disparar($CE);
    }
  }
}
?>
