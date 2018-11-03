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
    if($R2D2=="true"){
      if($this->getVida()<=75){
          $vida = $this->getVida() + 25;
          $this->setVida($vida);
      }else if($this->getVida()==100){
        if($this->getEscut()<=125){
          $escut = $this->getEscut() + 25;
          $this->setEscut($escut);
        }else{
          $this->setEscut(150);
        }
      }else{
        $vida = $this->getMaxVida() - $this->getVida();
        $escut = 25 - $vida;
        $this->setVida(100);
        $this->setEscut($escut);
      }

    }else{
      if($this->getVida()<=75){
          $vida = $this->getVida() + 25;
          $this->setVida($vida);
      }else{
        $this->setVida(100);
      }
    }
  }
}
?>
