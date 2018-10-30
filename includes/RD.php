<?php

include_once 'X_Wing.php';
include_once 'TIE_Fighter.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if(isset($_COOKIE["dataHora"])){
    if(isset($_POST["disparar"])){
      $wing = unserialize($_COOKIE["Wing"]);
      $TF = unserialize($_COOKIE["ArrayT"]);
      $r = rand(1, 5);
      $wing->disparar($TF[$r]);
      
    }
    if(isset($_POST["reparar"])){

    }

  }
  header('Location: ../main.php');
  exit;
}
