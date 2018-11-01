<?php
include_once 'Casa_estelar.php';
class TIE_Fighter extends Casa_estelar{

  public function __construct($numero_serie,$fabricant){
    parent::__construct($numero_serie,$fabricant);
  }
  public function reparar(){
    if($this->getVida()<76){
      $vida = $this->getVida()+25;
      $this->setVida($vida);
    }else{
      $this->setVida(100);
    }
  }
  public function escollir_accio(){
    $r = rand(1,3);
    return $r;
  }
}
?>
