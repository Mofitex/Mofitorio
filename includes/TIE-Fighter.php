<?php
class TIE_Fighter extends Casa_estelar{

  public function __construct($numero_serie,$fabricant){
    parent::__construct($numero_serie,$fabricant);
  }
  public function reparar(){

  }
  public function disparar($Casa_estelar){
    parent::disparar($Casa_estelar);
  }
  public function escollir_accio($Casa_estelar){
    $r = rand(1,2);
    if($r==1){
      $this->reparar();
    }else{
      $this->disparar($Casa_estelar);
    }
  }
}



?>
