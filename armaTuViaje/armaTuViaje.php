

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device
    -width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Abel|Montserrat:400,400i,700,700i|Pacifico" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
    <link rel="stylesheet" href="css/armaTuViaje.css">
    <title></title>
  </head>
  <body>
    <section class="container-fluid">
      <section class="foto-armaTuViaje">
        <div class="container-fluid">
          <div class="row">
            <div class= "col-12">
              <h1> CREA TU VIAJE<h1>
                <h2> y compartilo en linea con otros viajeros</h2>
                <h3 id="mensajes"></h3>
              </div>
            </div>
        </div>
      </section>
      <section class="formulario-viaje">
        <div class="container-fluid">
          <div class="row">
          <div class=" col-12 col-sm-8 border p-5">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
              <li class="nav-item">
                <a class="nav-link active" id="infoGeneral-tab" data-toggle="tab" href="#infoGeneral" role="tab" aria-controls="infoGeneral" aria-selected="true">Info General</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="destino-tab" data-toggle="tab" href="#destino" role="tab" >Destino</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="itinerario-tab" data-toggle="tab" href="#itinerario" role="tab" >Itinerario</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="presupuesto-tab" data-toggle="tab" href="#presupuesto" role="tab" >Presupuesto</a>
              </li>
            </ul>
            <div class="tab-content" id="myTabContent">
              <div class="tab-pane active" id="infoGeneral">
                  <form method="post">
                    <label for="textmensaje">Ponele un nombre a tu viaje</label>
                    <textarea id="textmensaje" onkeyup="$('#mensajes').text($('#textmensaje').val());" class="form-control" name="mensaje" placeholder="Escribí tu mensaje..."></textarea>
                    <div class="form-row">
                      <div class="form-group col-md-8">
                        <div class="input-group input-daterange">
                      <label for="input-group input-daterange">Selecciona tus fechas</label><br></br>
                      <input type="text" class="form-control" name="datein" value="2012-04-05">
                      <div class="input-group-addon">to</div>
                      <input type="text" class="form-control" name"dateout" value="2012-04-19">
                      </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                        <input type="text" class="dropdown-item" >Action</button>
                        <button class="dropdown-item" type="button">Another action</button>
                        <button class="dropdown-item" type="button">Something else here</button>
                      </div>
                      <label for="form-group"> ¿Tus Fechas son flexibles?</label>
                      <br></br>
                      <label class="checkbox-inline">
                        <input type="checkbox" name="Flexsi" value="">Si! Seguro!
                      </label>
                      <label class="checkbox-inline">
                        <input type="checkbox" name="Flexsoso" value="">Lo podemos charlar!
                      </label>
                      <label class="checkbox-inline">
                        <input type="checkbox" name="Flexno" value="">No. Estas son mis fechas.
                      </label>
                    </div>
              </div>
              <div class="tab-pane" id="destino">
                <label for="país">Elegí tu destino</label>
                <select class="form-control" name="país">
                <option value="">Selecciona el país a visitar</option>
              </select>
              <label for="actividades">¿Que tipo de viaje queres hacer?</label>
                <select class="form-control" name="actividades">
                  <option value="">Selecciona actividades</option>
                  <?php foreach ($actividades as $value): ?>
                  <?php if ($value == $actividades): ?>
                  <option selected value="<?=$value?>"><?=$value?></option>
                  <?php else: ?>
                  <option value="<?=$value?>"><?=$value?></option>
                  <?php endif; ?>
                  <?php endforeach; ?>
                </select>
              </div>
              <div class="tab-pane" id="itinerario">
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <label class="input-group-text" for="inputGroupSelect01">Dia 1</label>
                  </div>
                  <select class="custom-select" name="ciudad">
                    <option selected>Eleji la ciudad...</option>
                    <option value="1">Buenos Aires</option>
                    <option value="2">Cordoba</option>
                    <option value="3">Entre Rios</option>
                  </select>
                </div>
                <div class="descripcion">
                <textarea id="descripcion" class="form-control" name="mensaje-iti" placeholder="Que vas a hacer en esta ciudad?..."></textarea>
              </div>
            </div>
              <div class="tab-pane" id="presupuesto">
                <div class="row">
                  <div class="col-6">
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
            </div>
              </div>
            </div>
            <input type="submit" class="btn btn-primary" value="Guarda Tu Viaje">
            </form>
          </div>
        </div>
        </div>
        <div class="col-12 col-sm-4 border p-5">
        <div class="container-fluid">
          <div class="row">
            <a class="block destination caribe no_text_decoration" href="https://www.tripadvisor.es/TravelersChoice-Destinations-cTop-g13" target="_blank">
              <div class="text-wrapper">
                <h3 class="big bold white">Caribe</h3>
              </div>
            </a>
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
