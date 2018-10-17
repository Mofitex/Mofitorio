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
    $this->vida = $vida_maxima;
  }
  public function getfabricant(){
    return $this->fabricant;
  }
  public function setVida($vida){
    $this->vida = $vida;
  }
  public function disparar($Casa_estelar){
    $r=rand(1,10);
    $atac_total = $r + $this->fuerza_ataque;
    if($Casa_estelar->getfabricant == "Republica" ){
      $escut = $Casa_estelar->getescut;
      if($escut<$atac_total){
        $vidae = $Casa_estelar->vida + $Casa_estelar->escut;
        $vidae = $vidae - $atac_total;
        $Casa_estelar->setVida($vidae);
      }else if($escut==0){
        $vida = $Casa_estelar->vida;
        $vida = $vida - $atac_total;
        $Casa_estelar->setVida($vida);
      }else{
        $escut = $escut - $atac_total;
        $Casa_estelar->setEscut($escut);
      }

    }else{
      $vida = $Casa_estelar->vida;
      $vida = $vida - $atac_total;
      $Casa_estelar->setVida($vida);
    }
  }




 ?>
