<?php
$cookie = echo $_COOKIE["R2D2"];

$fighter;
for($i=1;$i<6;$i++){
	$clase = new TIE_Fighter();
	$clase->$numero_serie = i;
  $clase->$fabricant = "Imperio";
	$fighter[$i] = $clase;
}
$wing;
	$clase2 = new X_Wing();
	$clase2->$numero_serie = $_POST["serie"];
  $clase2->$fabricant = "Republica";
  $clase2->$R2D2 = $cookie;
	$wing = $clase2;
}

function iniciarPartida() {
    $cookie_name = "partidaIniciada";
    $cookie_value = "true";
    setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");
}

$cookie_name = "numeroSerie";
$cookie_value = $_POST["serie"];
setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");

$cookie_name = "dataHora";
$cookie_value = DateTime();
setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");

$cookie_name = "nombreFighters";
$cookie_value = $fighter[].length;
setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");



 ?>
