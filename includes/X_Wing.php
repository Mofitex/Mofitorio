<?php
include_once 'Casa_estelar.php';
class X_Wing extends Casa_estelar{
    private $R2D2;
  private $escut_maxim = 150;
  private $escut;
  public function __construct($numero_serie,$fabricant,$R2D2){
    parent::__construct($numero_serie,$fabricant);
    $this->R2D2 = $R2D2;
    $this->escut = $this->escut_maxim;
  }

  public function getEscut(){
    return $this->escut;
  }
  public function getMaxEscut(){
    return $this->escut_maxim;
  }
  public function setEscut($escut){
    $this->escut = $escut;
  }
  public function reparar($R2D2){
    if($this->getVida()<=75){
      $vida = $this->getVida() + 25;
      $this->setVida($vida);
    }else{
      $vida = $this->getMaxVida() - $this->getVida();
      $escut = 25 - $vida;
      $this->setVida(100);

      if($R2D2==true){
        $escut_restant = $this->getMaxEscut() - $this->getEscut();
        if($escut_restant<$escut){
          $this->setEscut(150);
        }else{
          $escut = $this->getEscut() + $escut;
          $this->setEscut($escut);
        }
      }
    }
  }

}
?>
