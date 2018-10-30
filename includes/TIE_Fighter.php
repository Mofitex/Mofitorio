<?php
include_once 'Casa_estelar.php';
class TIE_Fighter extends Casa_estelar{

  public function __construct($numero_serie,$fabricant){
    parent::__construct($numero_serie,$fabricant);
  }
  public function reparar(){
    if($this->vida<76){
      $vida = $this->vida+25;
      $this->setVida($vida);
    }else{
      $this->setVida(100);
    }
  }

  public function getfabricant(){
    parent::getfabricant();
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
