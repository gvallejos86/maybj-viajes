<!doctype html>
<html lang="en">

<?php

  require_once('funciones.php');
  if (isset($_SESSION['id'])) {
    $usuariologin = obtenerId($_SESSION['id']);
  }else if (isset($_COOKIE['id'])) {
    $usuariologin = obtenerId($_COOKIE['id']);
  }


?>

  <head>
    <title>Single Riders</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Abel|Montserrat:400,400i,700,700i|Pacifico" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/styles.css">
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD7-_ujclOOF7-Rj28am_xiblQJUNrTd3c"></script>
  </head>
  <body>
    <?php require_once('header.php'); ?>
    <section class="mt-5">
      <div class="container-fluid pt-5">
        <div class="row p-0 m-0 bg-white rounded home-row-main">
          <div class="col-12 p-0 top-muro-image d-flex align-items-center justify-content-center">
            <h1 class="font-weight-bold">Crear viaje</h1>
          </div>
          <div class="col-12 pt-3 col-md-3 d-flex justify-content-center">
            <ul class="list-unstyled">
              <li>Mis viajes</li>
              <li>Mensajes</li>
              <li>Buscar destinos</li>
            </ul>
          </div>
          <div class="col-12 p-0 col-md-6">
            <div class="w-100 d-flex mt-4 pl-3 pr-3">
              <div class="d-flex justify-content-center align-items-center border rounded-circle stepper-muro">
                1
              </div>
              <div class="d-flex linea-steps" style="width:auto;height:1px;background:#cccccc">
              </div>
              <div class="d-flex justify-content-center align-items-center border rounded-circle stepper-muro">
                2
              </div>
              <div class="d-flex linea-steps" style="width:auto;height:1px;background:#cccccc">
              </div>
              <div class="d-flex justify-content-center align-items-center border rounded-circle stepper-muro">
                3
              </div>
            </div>
          </div>
          <div class="col-12 pt-3 col-md-3 d-flex align-items-center flex-column">
            <h5 class="mb-3">Top destinos</h5>
            <ul class="list-unstyled">
              <li>Europa del este</li>
              <li>Asia</li>
              <li>América</li>
            </ul>
          </div>
        </div>
      </div>
    </section>

    <?php require_once('footer.php'); ?>

    </body>
</html>
