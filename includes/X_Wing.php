<?php
include_once 'includes/Casa_estelar.php';
class X_Wing extends Casa_estelar{
    private $R2D2;
  private $escut_maxim = 150;
  private $escut;
  public function __construct($numero_serie,$fabricant,$R2D2){
    parent::__construct($numero_serie,$fabricant);
    $this->R2D2 = $R2D2;
    $this->escut = $this->escut_maxim;
  }
  public function getescut(){
    return $this->escudo;
  }
  public function setEscut($escut){
    $this->escut = $escut;
  }
  public function reparar($R2D2){
    if($this->vida<76){
      $vida = $this->vida +25;
      $this->setVida($vida);
    }else{
      $vida = $this->vida_maxima - $this->vida;
      $this->setVida($vida);
      $escudo = 25 - $vida;
      if($R2D2==true){
        $escut_restant = $this->escut_maxim - $this->escut;
        if($escut_restant<$escut){
          $this->setEscut(150);
        }else{
          $escut = $this->escut + $escut;
          $this->setEscut($escut);
        }
      }
    }
  }
  public function disparar($CE){
    parent::disparar($CE);
  }

}
?>
