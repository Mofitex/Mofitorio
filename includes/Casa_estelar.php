<?php
class Casa_estelar {
private $numero_serie;
private $fabricant;
private $vida;
private $vida_maxima = 100;
private $fuerza_ataque = 10;

  public function __construct($numero_serie,$fabricant){
    $this->numero_serie = $numero_serie;
    $this->fabricant = $fabricant;
    $this->vida = $this->vida_maxima;
  }

  public function getSerie(){
    return $this->numero_serie;
  }

  public function getfabricant(){
    return $this->fabricant;
  }
  public function getVida(){
    return $this->vida;
  }
  public function setVida($vida){
    $this->vida = $vida;
  }
  public function disparar($CE){
    $r=rand(1,10);
    $atac_total = $r + $this->fuerza_ataque;
    if($CE->getfabricant() == "Republica" ){
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

    }else{
      $vida = $CE->vida;
      $vida = $vida - $atac_total;
      $CE->setVida($vida);
    }
    return $atac_total;
  }
}
 ?>
