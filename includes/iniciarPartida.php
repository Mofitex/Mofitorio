<?php

include_once 'X_Wing.php';
include_once 'TIE_Fighter.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {

	$cookie_value;
	if (isset($_POST['r2d2'])) {
 		 $cookie_name = "R2D2";
 		 $cookie_value = "true";
 		 setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");
 	 }else{
 		 $cookie_name = "R2D2";
 		 $cookie_value = "false";
 		 setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");
 	 }
	 if(isset($_POST["serie"])){
		 $cookie_name = "serie";
		 $cookie_value = $_POST['serie'];
		 setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");
	 }

$fighter = array();
for($i=1;$i<6;$i++){
	$numero_serie = $i;
  $fabricant = "Imperio";
	$clase = new TIE_Fighter($numero_serie,$fabricant);
	array_push($fighter,$clase);
	setcookie("ArrayT", serialize($fighter), time() + (86400 * 30), "/");
}
$cookie_name = "nombreFighters";
$cookie_value = count($fighter);
setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");

$wing = array();
	$numero_serie = $_COOKIE["serie"];
  $fabricant = "Republica";
  $R2D2 = $cookie_value;
	$clase2 = new X_Wing($numero_serie,$fabricant,$R2D2);
	$wing = $clase2;
	setcookie("Wing", serialize($clase2), time() + (86400 * 30), "/");

	$cookie_name = "dataHora";
	$cookie_value = date("Y-m-d h:i:sa");
	setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");

	$cookie_name = "partidaIniciada";
	$cookie_value = "true";
	session_start();
	setcookie("Benvingut", "Benvingut a la partida!", time() + (86400 * 30), "/");

	header('Location: ../main.php');
	exit;
}





 ?>
