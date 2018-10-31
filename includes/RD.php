<?php

include_once 'X_Wing.php';
include_once 'TIE_Fighter.php';
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if(isset($_COOKIE["dataHora"])){
    if(isset($_POST["disparar"])){
      $wing = $_SESSION["wing"];
      $TF = $_SESSION["fighter"];
      $r = rand(0, 4);
      $arr=$TF[$r];
      //Xwing dispara a TF
      $serieTF = $arr->getSerie();
      $vida_antes_de_disparar = $arr->getVida();
      $wing->disparar($arr);
      $vida_despues_de_disparar = $arr->getVida();
      $dañoX = $vida_antes_de_disparar - $vida_despues_de_disparar;

      if(isset($_COOKIE["info"])){
        $txt = $_COOKIE["info"];
        $txt = "XWing le ha quitado: ". $dañoX ." vida a T_Fighter con ID: ". $serieTF ."<br>" . $txt;
        setcookie("info", $txt, time() + (86400 * 30), "/");
      }else{
        $txt = "XWing le ha quitado: ". $dañoX ." vida a T_Fighter con ID: ". $serieTF ."<br>";
        setcookie("info", $txt, time() + (86400 * 30), "/");
      }

      //TF dispara a Xwing
      $accio = $arr->escollir_accio($wing);
      if($accio==1){
        $vida_antes_de_reparar = $arr->getVida();
        $arr->reparar();
        $vida_despues_de_reparar = $arr->getVida();
        $vida_recuperada = $vida_despues_de_reparar - $vida_antes_de_reparar;
        if(isset($_COOKIE["info"])){
          $txt = $_COOKIE["info"];
          $txt = "TF se ha curado: ". $vida_recuperada ." vida con ID: ". $serieTF ."<br>" . $txt;
          setcookie("info", $txt, time() + (86400 * 30), "/");
        }else{
          $txt = "TF se ha curado: ". $vida_recuperada ." vida con ID: ". $serieTF ."<br>";
          setcookie("info", $txt, time() + (86400 * 30), "/");
        }
      }else{
        $serieXW = $wing->getSerie();
        $vida_antes_de_dispararX = $wing->getVida();
        $escudo_antes_de_dispararX = $wing->getEscut();
        $arr->disparar($wing);
        $vida_despues_de_dispararX = $wing->getVida();
        $escudo_despues_de_dispararX = $wing->getEscut();
        $dañoTF = ($vida_antes_de_dispararX + $escudo_antes_de_dispararX) - ($vida_despues_de_dispararX + $escudo_despues_de_dispararX);

        if(isset($_COOKIE["info"])){
          $txt = $_COOKIE["info"];
          $txt = "XWing le ha quitado: ". $dañoTF ." vida a T_Fighter con ID: ". $serieXW ."<br>" . $txt;
          setcookie("info", $txt, time() + (86400 * 30), "/");
        }else{
          $txt = "XWing le ha quitado: ". $dañoTF ." vida a T_Fighter con ID: ". $serieXW ."<br>";
          setcookie("info", $txt, time() + (86400 * 30), "/");
        }
      }



    }
    if(isset($_POST["reparar"])){

    }

  }
  header('Location: ../main.php');
	exit;
}
