<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if(isset($_POST["historial"])){
    //mostrar historial
  }
  if(isset($_POST["borrar"])){
    //borrar historial
  }
  header('Location: ../main.php');
	exit;
}
?>
