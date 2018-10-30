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
      $TF = $_SESSION['fighter'];
      $r = rand(0, 4);
      $arr=$TF[$r];
      $wing->disparar($arr);

    }
    if(isset($_POST["reparar"])){

    }

  }
}
