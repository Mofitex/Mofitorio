<?php
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
  public function disparar($Casa_estelar){
    parent::disparar($Casa_estelar);
  }
  public function escollir_accio($Casa_estelar){
    if ($this->fuerza_ataque > $Casa_estelar->vida) {
      $this->disparar($Casa_estelar);
    }else{
      if($this->vida<35){
      $this->reparar();
      }else{
        $this->disparar($Casa_estelar);
      }
    }
  }
}



?>
