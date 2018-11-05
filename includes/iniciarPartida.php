<?php

include_once 'X_Wing.php';
include_once 'TIE_Fighter.php';
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  //crear BBDD
  $servername = "localhost";
  $username = "root";
  $password = "";
  $db = "StarWarsBattle";
  $conn = new mysqli($servername, $username, $password);
  $sql = "CREATE DATABASE IF NOT EXISTS StarWarsBattle";
  $conn->query($sql);
  $conn->close();
  $conn = new mysqli($servername, $username, $password, $db);
  $sql = "CREATE TABLE IF NOT EXISTS Partida (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    x_wing INT(10),
    r2d2 varchar(5),
    inici datetime,
    fi datetime
    )";
  $conn->query($sql);
  $conn->close();
  //*********************************************


  //borrar cookies
  setcookie("informe", "", time() - 1 , "/");
  setcookie("escutXW", "", time() - 1 , "/");
  setcookie("history", "", time() - 1 , "/");
  setcookie("infoTF", "", time() - 1 , "/");
  setcookie("infoXW", "", time() - 1 , "/");
  setcookie("vidaTF", "", time() - 1 , "/");
  setcookie("vidaXW", "", time() - 1 , "/");
	$cookie_value;
	if (isset($_POST['r2d2'])) {
 		 setcookie("R2D2", "true" , time() + (86400 * 30), "/");
 	 }else{
 		 setcookie("R2D2", "false" , time() + (86400 * 30), "/");
 	 }
	 if(isset($_POST["serie"])){
		 setcookie("serie", $_POST['serie'], time() + (86400 * 30), "/");
	 }

$fighter = array();
for($i=1;$i<6;$i++){
	$numero_serie = $i;
  $fabricant = "Imperio";
	$clase = new TIE_Fighter($numero_serie,$fabricant);
	array_push($fighter,$clase);

}

$_SESSION['fighter']=$fighter;
setcookie("TFnumero", 0, time() + (86400 * 30), "/");

	$numero_serie = $_COOKIE["serie"];
  $fabricant = "Republica";
  $R2D2 = $cookie_value;

	$wing = new X_Wing($numero_serie,$fabricant,$R2D2);
	$_SESSION['wing']=$wing;
	$cookie_value = date('d-m-Y H:i:s');
	setcookie("dataHora", $cookie_value, time() + (86400 * 30), "/");

	$cookie_name = "partidaIniciada";
	$cookie_value = "true";

	setcookie("benvingut", "Benvingut a la partida!<br>", time() + (86400 * 30), "/");

	header('Location: ../main.php');
	exit;
}





 ?>
