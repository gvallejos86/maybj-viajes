

<!DOCTYPE html>
<html lang="en" dir="ltr">
<?php
require_once('funciones.php');
/*if (isset($_SESSION['id']) || isset($_COOKIE['id'])) {
    header('location:muro.php');
}*/
$textmensaje = '';
$datein = '';
$dateout = '';
$pais='';
$ciudad='';
$importe='';
$moneda='';
$errores = [];

$paises = traerPaises();
//$ciudades = traerCiudades();

if ($_POST) {
  //echo '<pre>';
  //echo var_dump($_POST);
  $textmensaje = trim($_POST['mensaje']);
  $datein = trim($_POST['checkin']);
  $dateout = trim($_POST['checkout']);
  $pais = trim($_POST['país']);
  //$ciudad = trim($_POST['ciudad']);
  $importe = trim($_POST['importe']);
  $moneda = trim($_POST['moneda']);
  $errores = validarviaje($_POST);
  if (empty($errores)) {

      guardarViaje($_POST);

  }
}
?>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device
    -width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Abel|Montserrat:400,400i,700,700i|Pacifico" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
    <link rel="stylesheet" href="css/crea.css">
    <title></title>
  </head>
  <body>
    <section class="container-fluid">
      <section class="titulos">
        <div class="container-fluid">
          <div class="row">
            <div class= "col-12">
              <img src="images/crea/torre.png">
                <h1> CREA TU VIAJE<h1>
                <h2> y compartilo en linea con otros viajeros</h2>
                <h3 id="mensajes"></h3>
              </div>
            </div>
        </div>
      </section>
      <section class="cuerpo-pagina">
      <div class="formulario-viaje">
        <div class="container">
          <div class="row">
            <div class="col-8">
              <div class="accordion" id="accordionExample">
                <form method="post" enctype="multipart/form-data">
                  <div class="card-infoGeneral">
                    <div class="card-header" id="card-infoGeneral">
                      <h5 class="mb-0">
                        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                          Informacion General
                        </button>
                      </h5>
                      </div>
                    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                      <div class="card-body">
                        <div class="form-group">
                          <input type="text" id="textmensaje" onkeyup="$('#mensajes').text($('#textmensaje').val());" class="form-control" name="mensaje" placeholder="Ponele un Titulo a tu viaje..."></textarea>
                          <br></br>
                          Check in: <input type="date" name="checkin">
                          Check out: <input type="date" name="checkout">
                          <br></br>
                          <br></br>
                          <label for="inlineRadioOptions"> ¿Tus Fechas son flexibles?</label>
                          <br></br>
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="infoGeneral" value="option1">
                            <label class="form-check-label" for="inlineRadio1">Si, seguro!</label>
                          </div>
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="infoGeneral" value="option2">
                            <label class="form-check-label" for="inlineRadio2">Lo podemos Charlar!</label>
                          </div>
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="infoGeneral" value="option3">
                            <label class="form-check-label" for="inlineRadio3">No puedo mover las fechas</label>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
              <div class="card-destino">
                  <div class="card-header" id="card-destino">
                    <h5 class="mb-0">
                      <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        Informacion de tu Destino
                      </button>
                    </h5>
                      </div>
                        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                          <div class="card-body">
                            <label for="país">Elegí tu destino</label>
                            <select class="form-control" name="país">
                              <option value="">Selecciona el país a visitar</option>
                              <?php foreach ($paises as $key => $value) :?>
                                  <option value="<?= $value['CODIGO'] ?>"><?= $value['NOMBRE'] ?></option>
                              <?php endforeach ?>
                            </select>

                            <!--<select class="form-control" name="ciudad">
                              <option value="">Selecciona la ciudad a visitar</option>
                              <?php foreach ($ciudades as $key => $value) :?>
                                  <option value="<?= $value['ciudad'] ?>"><?= $value['ciudad'] ?></option>
                              <?php endforeach ?>
                            </select>-->
                            <label for="actividades">¿Que tipo de viaje queres hacer?</label>
                            <select class="custom-select" size="3">
                              <option value="1">Aventura</option>
                              <option value="2">Impacto Social</option>
                              <option value="3">Relax y playa</option>
                              <option value="2">Proyectos Ecológcos</option>
                              <option value="3">Relax y playa</option>
                            </select>
                          </div>
                        </div>
                      </div>
                  <div class="card-itinerario">
                    <div class="card-header" id="headingThree">
                      <h5 class="mb-0">
                          <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                          Itinerario de tu viaje
                          </button>
                          </h5>
                        </div>
                          <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                            <div class="card-body">
                              <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                  <label class="input-group-text" for="inputGroupSelect01">Dia 1</label>
                                </div>
                                <select class="custom-select" name="ciudad">
                                </select>
                              </div>
                              <div class="descripcion">
                                <textarea id="descripcion" class="form-control" name="mensaje-iti" placeholder="Que vas a hacer en esta ciudad?..."></textarea>
                              </div>
                            </div>
                          </div>
                        </div>
                  <div class="card-itinerario">
                      <div class="card-header" id="headingFour">
                        <h5 class="mb-0">
                          <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                            Presupuesto
                          </button>
                        </h5>
                      </div>
                    <div class="card-presupuesto">
                      <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordionExample">
                        <div class="card-body">
                          <div class="input-group mb-3">
                            <div class="input-group-prepend">
                              <span class="input-group-text">Importe</span>
                              </div>
                              <input type="text" class="form-control" name="importe" aria-label="Amount (to the nearest dollar)">
                              <div class="input-group-append">
                                <span class="input-group-text">.00</span>
                              </div>
                            </div>
                              <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                <span class="input-group-text">Moneda</span>
                                </div>
                                <input type="text" class="form-control" name="moneda" aria-label="Amount (to the nearest dollar)">
                                <input type="submit" class="btn btn-primary" value="Guarda Tu Viaje">
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </form>
                </div>
                </div>
              </div>
            </div>
              <div class="info-destinos">
                <div class="container-fluid">
                  <div class="row">
                    <div class="col-4">
                      <div class="btn-group-vertical col-12">
                        <div class="btn-group-vertical">
                          <a class="btn btn-secondary" href="https://www.tripadvisor.es/TravelersChoice-Destinations-cTop-g13" target="_blank">Top 25 Caribe</a>
                          <a class="btn btn-secondary" href="https://www.tripadvisor.es/TravelersChoice-Destinations-cTop-g4" target="_blank">Top 25 Europa</a>
                          <a class="btn btn-secondary" href="https://www.tripadvisor.com.ar/TravelersChoice-Destinations-cTop-g191" target="_blank">Top 25 Estados Unidos</a>
                          <a class="btn btn-secondary" href="https://www.tripadvisor.com.ar/TravelersChoice-Destinations-cTop-g2"  target="_blank">Top 25 Sudeste Asíatico</a>
                          <a class="btn btn-secondary" href="https://www.tripadvisor.es/TravelersChoice-Beaches-cTop-g147237" target="_blank">Top 25 Caribe</a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </section>
              </section>
            </body>
            <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
</html>
