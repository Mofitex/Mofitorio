<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="assets/css/estils.css">
</head>
<body>
  <?php

  if ($_SERVER["REQUEST_METHOD"] == "POST") {


       if(!isset($_COOKIE["partidaIniciada"])) {
       }
       else{
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
      <div class="col-md-4 div1">
        <form method="post" action="includes/RD.php">
          <button class="btn btn-danger disparar button">Disparar</button>
          <button class="btn btn-info reparar button">Reparar</button>
        </form>
        <div class="info" name="textarea" ><?php
        if(isset($_COOKIE["Benvingut"])){
          echo $_COOKIE["Benvingut"];
        }
        ?></div>
      </div>
      <div class="col-md-4">
          <button class="btn btn-info button historial2">Mostrar Historial</button>
          <button class="btn btn-danger button">Borrar Historial</button>
          <div class="historial"></div>
      </div>
    </div>
  </div>


</body>
</html>
