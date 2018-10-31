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
  public function setEscut($escut){
    $this->escut = $escut;
  }
  public function disparar($CE){
    $r=rand(1,10);
    $atac_total = $r + $this->fuerza_ataque;
      $escut = $CE->getEscut;
      if($escut<$atac_total){
        $vidae = $CE->vida + $CE->escut;
        $vidae = $vidae - $atac_total;
        $CE->setVida($vidae);
      }else if($escut==0){
        $vida = $CE->vida;
        $vida = $vida - $atac_total;
        $CE->setVida($vida);
      }else{
        $escut = $escut - $atac_total;
        $CE->setEscut($escut);
      }
    return $atac_total;
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

}
?>
