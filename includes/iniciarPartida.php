<?php

include_once 'includes/X_Wing.php';
include_once 'includes/TIE_Fighter.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
$cookie = $_COOKIE["R2D2"];

$fighter = array();
for($i=1;$i<6;$i++){
	$numero_serie = $i;
  $fabricant = "Imperio";
	$clase = new TIE_Fighter($numero_serie,$fabricant);
	array_push($fighter,$clase);
}
$cookie_name = "nombreFighters";
$cookie_value = count($fighter);
setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");

$wing = array();

	$numero_serie = $_POST["serie"];
  $fabricant = "Republica";
  $R2D2 = $cookie;
	$clase2 = new X_Wing($numero_serie,$fabricant,$R2D2);
	$wing = $clase2;


	$cookie_name = "numeroSerie";
	$cookie_value = $_POST["serie"];
	setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");

	$cookie_name = "dataHora";
	$cookie_value = date("Y-m-d h:i:sa");
	setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");

	$cookie_name = "partidaIniciada";
	$cookie_value = "true";
}





 ?>
