<?php

include_once 'X_Wing.php';
include_once 'TIE_Fighter.php';
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $servername = "localhost";
  $username = "root";
  $password = "";
  $db = "StarWarsBattle";
  $wing = $_SESSION["wing"];
  $arr = $_SESSION["fighter"];
  $count = $_COOKIE["TFnumero"];
  $TF=$arr[$count];
  if(isset($_COOKIE["dataHora"])){
    if(isset($_POST["disparar"])){

        if($TF->getVida()<=0 && $TF->getSerie()==5 || $wing->getVida()<=0){

        }else{
          if(isset($_COOKIE["infoTF"])){
            $texto = $_COOKIE["infoTF"];
            $texto .= $_COOKIE["infoXW"];
            $texto .= $_COOKIE["history"];
            $cortar = substr($texto, 0,2500);
            setcookie("history", $cortar, time() + (86400 * 30), "/");
          }

          //Xwing dispara a TF
          $serieTF = $TF->getSerie();
          $dañoX = $wing->disparar($TF);
          $txt2 = "X_wing le ha quitado: ". $dañoX ." de vida a TF". $serieTF ."<br>" ;
          setcookie("infoXW", $txt2, time() + (86400 * 30), "/");


          //TF dispara a Xwing
          $accio = $TF->escollir_accio($wing);
          if($accio==3){
            $vida_antes_de_repararTF = $TF->getVida();
            $TF->reparar();
            $vida_despues_de_reparar = $TF->getVida();
            $vida_recuperada = $vida_despues_de_reparar - $vida_antes_de_repararTF;
            $txt = "TF". $TF->getSerie() ." se ha curado: ". $vida_recuperada ." de vida <br>";
            setcookie("infoTF", $txt, time() + (86400 * 30), "/");

          }else{
            $serieXW = $_COOKIE["serie"];
            $dañoTF = $TF->disparar($wing);
            $txt = "TF". $TF->getSerie() ." le ha quitado: ". $dañoTF ." de vida a X_Wing <br>";
            setcookie("infoTF", $txt, time() + (86400 * 30), "/");
          }
          setcookie("vidaXW", $wing->getVida() , time() + (86400 * 30), "/");
          setcookie("escutXW", $wing->getEscut() , time() + (86400 * 30), "/");
          setcookie("vidaTF", $TF->getVida() , time() + (86400 * 30), "/");

          if($TF->getVida()<=0){
            if($TF->getSerie()==5){
              $informe = "Todos los cazas destruidos. Has Ganado!! <br>";
              setcookie("informe", $informe , time() + (86400 * 30), "/");
              //borrar cookies
              setcookie("benvingut", "", time() - 1 , "/");
              setcookie("escutXW", "", time() - 1 , "/");
              setcookie("history", "", time() - 1 , "/");
              setcookie("infoTF", "", time() - 1 , "/");
              setcookie("infoXW", "", time() - 1 , "/");
              setcookie("vidaTF", "", time() - 1 , "/");
              setcookie("vidaXW", "", time() - 1 , "/");
              //insertar info en la tabla
              $conn = new mysqli($servername, $username, $password, $db);
              $serieXW = $_COOKIE["serie"];
              $serieXW = intval($serieXW);
              $inici = $_COOKIE["dataHora"];
              $inici = "'".$inici."'";
              $sql = "INSERT INTO Partida (x_wing, r2d2, inici, fi) VALUES ($serieXW, $R2D2, STR_TO_DATE($inici, '%d-%c-%Y %T'), now())";
              $conn->query($sql);
            }else{
              $count += 1;
              $informe = "Caza TF" . $TF->getSerie() . " ha sido destruido. <br>";
              setcookie("informe", $informe , time() + (86400 * 30), "/");
              setcookie("TFnumero", $count , time() + (86400 * 30), "/");
            }

          }
          if($wing->getVida()<=0){
            $informe = "No te queda vida. Has Perdido!! <br>";
            setcookie("informe", $informe , time() + (86400 * 30), "/");
            //borrar cookies
            setcookie("benvingut", "", time() - 1 , "/");
            setcookie("escutXW", "", time() - 1 , "/");
            setcookie("history", "", time() - 1 , "/");
            setcookie("infoTF", "", time() - 1 , "/");
            setcookie("infoXW", "", time() - 1 , "/");
            setcookie("vidaTF", "", time() - 1 , "/");
            setcookie("vidaXW", "", time() - 1 , "/");
            setcookie("TFnumero", "", time() - 1 , "/");
            //insertar info en la tabla
            $conn = new mysqli($servername, $username, $password, $db);
            $serieXW = $_COOKIE["serie"];
            $serieXW = intval($serieXW);
            $R2D2 = $_COOKIE["R2D2"];
            $inici = $_COOKIE["dataHora"];
            $inici = "'".$inici."'";
            $sql = "INSERT INTO Partida (x_wing, r2d2, inici, fi) VALUES ($serieXW, $R2D2, STR_TO_DATE($inici, '%d-%c-%Y %T'), now())";
            $conn->query($sql);
            $conn->close();
            setcookie("R2D2", "", time() - 1 , "/");
            setcookie("serie", "", time() - 1 , "/");
            setcookie("dataHora", "", time() - 1 , "/");
          }
        }


    }
    if(isset($_POST["reparar"])){
      if($TF->getVida()<=0 && $TF->getSerie()==5 || $wing->getVida()<=0){

      }else{
        if(isset($_COOKIE["infoTF"])){

          $texto .= $_COOKIE["infoTF"];
          $texto .= $_COOKIE["infoXW"];
          $texto .= $_COOKIE["history"];
          $cortar = substr($texto, 0,2500);
          setcookie("history", $cortar, time() + (86400 * 30), "/");
        }

      //Xwing se cura
      $R2D2 = $_COOKIE["R2D2"];
      $vida_antes_de_repararXW = $wing->getVida();
      $escut_antes_de_repararXW = $wing->getEscut();
      $vidae = $wing->reparar($R2D2);
      $vida_despues_de_repararXW = $wing->getVida();
      $escut_despues_de_repararXW = $wing->getEscut();
      $vida_recuperadaXW = ($vida_despues_de_repararXW+$escut_despues_de_repararXW) - ($vida_antes_de_repararXW+$escut_antes_de_repararXW);
      $txt2 = "X_wing se ha curado: ". $vida_recuperadaXW ." de vida <br>";
      setcookie("infoXW", $txt2, time() + (86400 * 30), "/");

      $accio = $TF->escollir_accio($wing);
      if($accio==3){
        $vida_antes_de_repararTF = $TF->getVida();
        $TF->reparar();
        $vida_despues_de_reparar = $TF->getVida();
        $vida_recuperada = $vida_despues_de_reparar - $vida_antes_de_repararTF;
        $txt = "TF". $TF->getSerie() ." se ha curado: ". $vida_recuperada ." de vida <br>";
        setcookie("infoTF", $txt, time() + (86400 * 30), "/");

      }else{
        $serieXW = $_COOKIE["serie"];
        var_dump($serieXW);
        $dañoTF = $TF->disparar($wing);
        $txt = "TF". $TF->getSerie() ." le ha quitado: ". $dañoTF ." de vida a X_Wing <br>";
        setcookie("infoTF", $txt, time() + (86400 * 30), "/");
      }
      setcookie("vidaXW", $wing->getVida() , time() + (86400 * 30), "/");
      setcookie("escutXW", $wing->getEscut() , time() + (86400 * 30), "/");
      setcookie("vidaTF", $TF->getVida() , time() + (86400 * 30), "/");
      if($TF->getVida()<=0){
        if($TF->getSerie()==5){
          $informe = "Todos los cazas destruidos. Has Ganado!! <br>";
          setcookie("informe", $informe , time() + (86400 * 30), "/");
          //borrar cookies
          setcookie("benvingut", "", time() - 1 , "/");
          setcookie("escutXW", "", time() - 1 , "/");
          setcookie("history", "", time() - 1 , "/");
          setcookie("infoTF", "", time() - 1 , "/");
          setcookie("infoXW", "", time() - 1 , "/");
          setcookie("vidaTF", "", time() - 1 , "/");
          setcookie("vidaXW", "", time() - 1 , "/");
          //insertar info en la tabla
          $conn = new mysqli($servername, $username, $password, $db);
          $serieXW = $_COOKIE["serie"];
          $serieXW = intval($serieXW);
          $R2D2 = $_COOKIE["R2D2"];
          $inici = $_COOKIE["dataHora"];
          $inici = "'".$inici."'";
          $sql = "INSERT INTO Partida (x_wing, r2d2, inici, fi) VALUES ($serieXW, $R2D2, STR_TO_DATE($inici, '%d-%c-%Y %T'), now())";
          $conn->query($sql);
        }else{
          $count += 1;
          $informe = "Caza TF " . $TF->getSerie() . " ha sido destruido. <br>";
          setcookie("informe", $informe , time() + (86400 * 30), "/");
          setcookie("TFnumero", $count , time() + (86400 * 30), "/");
        }

      }
      if($wing->getVida()<=0){
        $informe = "No te queda vida. Has Perdido!! <br>";
        setcookie("informe", $informe , time() + (86400 * 30), "/");
        //borrar cookies
        setcookie("benvingut", "", time() - 1 , "/");
        setcookie("escutXW", "", time() - 1 , "/");
        setcookie("history", "", time() - 1 , "/");
        setcookie("infoTF", "", time() - 1 , "/");
        setcookie("infoXW", "", time() - 1 , "/");
        setcookie("vidaTF", "", time() - 1 , "/");
        setcookie("vidaXW", "", time() - 1 , "/");
        //insertar info en la tabla
        $conn = new mysqli($servername, $username, $password, $db);
        $serieXW = $_COOKIE["serie"];
        $serieXW = intval($serieXW);
        $R2D2 = $_COOKIE["R2D2"];
        $inici = $_COOKIE["dataHora"];
        $inici = "'".$inici."'";
        $sql = "INSERT INTO Partida (x_wing, r2d2, inici, fi) VALUES ($serieXW, $R2D2, STR_TO_DATE($inici, '%d-%c-%Y %T'), now())";
        $conn->query($sql);
      }
    }
  }
  }
  header('Location: ../main.php');
	exit;
}
