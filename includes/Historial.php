<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {

  $servername = "localhost";
  $username = "root";
  $password = "";
  $bdname = "starwarsbattle";
  $conn = new mysqli($servername, $username, $password,$bdname);

  if(isset($_POST["historial"])){
    $sql = "SELECT id, x_wing, r2d2, inici, fi FROM partida";
    $result = $conn->query($sql);
    $var='';
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {

          $var.="x_wing: " . $row["x_wing"] . ", r2d2: " . $row["r2d2"] . ", inici: " . $row["inici"] . ", fi: " . $row["fi"] . "<br>";

        }
      }
    $_SESSION["historial"] = $var;
  }
  if(isset($_POST["borrar"])){
    $sql = "TRUNCATE TABLE partida";
    $conn->query($sql);
    $_SESSION["historial"] = "";
  }
  header('Location: ../main.php');
	exit;
}
?>
