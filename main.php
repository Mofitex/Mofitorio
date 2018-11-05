<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="assets/css/estils.css?v=<?php echo time(); ?>">
</head>
<body>
  <?php

include_once 'includes/RD.php';
include_once 'includes/Historial.php';
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if(!isset($_COOKIE["partidaIniciada"])) {
  }else{
    $partidaIniciada = $_COOKIE["partidaIniciada"];
  }
}
?>
  <div class="container">
    <div class="text-center titulo">
      <h1>Star Wars Battle!</h1>
    </div>
    <div class="text-center formulario">
      <form class="form-inline" method="post" action="includes/iniciarPartida.php">
        <input type="text" class="form-control" name="serie" placeholder="Numero de serie">
        <span class="checkbox"><input type="checkbox" name="r2d2"> R2D2</span>
        <button type="submit" class="btn btn-success">Iniciar Partida</button>
      </form>
    </div>
    <div class="row">
      <div class="col-md-3">
        <div class="informe text-center"><?php if(isset($_COOKIE["informe"])){ echo $_COOKIE["informe"];}   ?></div>
        <div class="XWing">
          <?php
          if(isset($_COOKIE["vidaXW"]) && isset($_COOKIE["escutXW"])){
            $escut = ($_COOKIE["escutXW"]/150)*100;
            echo "<img src='assets/img/X_wing.jpg'>";
            echo "<div class='border'><div class='vida' style='width:".$_COOKIE["vidaXW"]."%'><div class='escudo' style='width:".$escut."%'></div></div></div>";
          }else{
            echo "<img src='assets/img/X_wing.jpg'>";
            echo "<div class='border'><div class='vida' style='width:100%'><div class='escudo' style='width:100%'></div></div></div>";
          }
           ?>

        </div>
        <div class="TF text-center">
          <?php
          if(isset($_COOKIE["vidaTF"])){
            echo "<img style='width:55%;height:55%' src='assets/img/T_fighter.png'>";
            echo "<div class='border'><div class='vida' style='width:".$_COOKIE["vidaTF"]."%'></div></div>";
          }else{
            echo "<img style='width:55%;height:55%' src='assets/img/T_fighter.png'>";
            echo "<div class='border'><div class='vida' style='width:100%'></div></div>";
          }
           ?>
        </div>
      </div>
      <div class="col-md-4 div1">
        <form method="post" action="includes/RD.php">
        <div class="botones">
          <button class="btn btn-danger button" name="disparar">Disparar</button>
          <button class="btn btn-info button" name="reparar">Reparar</button>
        </div>
        </form>
        <div class="info" name="textarea"><?php

        if(isset($_COOKIE["infoTF"])){
          echo $_COOKIE["infoTF"];
        }
        if(isset($_COOKIE["infoXW"])){
          echo $_COOKIE["infoXW"];
        }
        if(isset($_COOKIE["history"])){
          echo $_COOKIE["history"];
        }
        if(isset($_COOKIE["benvingut"])){
          echo $_COOKIE["benvingut"];
        }
        ?></div>
      </div>
      <div class="col-md-4">
        <form method="post" action="includes/Historial.php">
          <div class="botones">
            <button class="btn btn-info button" name="historial">Mostrar Historial</button>
            <button class="btn btn-danger button" name="borrar">Borrar Historial</button>
          </div>
        </form>
          <div class="info"><?php

          if(isset($_SESSION["historial"])){
            echo $_SESSION["historial"];
            
          }
          ?></div>
      </div>
    </div>
  </div>


</body>
</html>
