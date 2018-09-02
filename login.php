<!doctype html>
<html lang="en">

<?php

  require_once('funciones.php');

  if (isset($_SESSION['id']) || isset($_COOKIE['id'])) {
    header('location:muro.php');
  }

  $email = '';
  $errores = [];

  if ($_POST) {
    $email = trim($_POST['email']);
    $errores = validar($_POST,'login');
    if (empty($errores)) {
      $usuariologin = buscarUsuario($email);
      $_SESSION['id'] = $usuariologin['id'];
      if(!isset($_COOKIE['id']) && $_POST['recordarme']) {
        setcookie('id', $usuariologin['id'], time() + 3600);
      }
      login();
    }
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
  </head>
  <body>
    <?php require_once('header.php'); ?>
    <section class="ingresar mt-5">
      <div class="container-fluid">
        <div class="row justify-content-center">
          <div class="col-10 col-lg-5 bg-white p-4 mt-5 rounded shadow">
            <h1 class="titulo-sr-home text-center mb-4"><span class="single-f mr-2">Single</span><span class="single-f">Riders</span></h1>
            <!--<div class="dropdown-divider mb-4 mt-4 ml-3 mr-3"></div>-->
            <!-- NOTE: tabs -->
            <ul class="nav nav-tabs" role="tablist">
              <li class="nav-item">
                <a class="nav-link active" id="login-tab" data-toggle="tab" href="#login" role="tab" aria-controls="login" aria-selected="true">Ingresá</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="registro-tab" href="registro.php" aria-selected="false">Registrate</a>
              </li>
            </ul>
            <div class="card border-top-0 rounded-0 bottom-radius">
              <div class="car-body">
                <div class="container mt-3">
                  <div class="row">
                    <div class="col-12">
                      <div class="tab-content">
                        <div class="tab-pane fade show active" id="login" role="tabpanel" aria-labelledby="login-tab">
                          <form method="post" enctype="multipart/form-data">
                            <div class="form-label-group">
                              <input name="email" id="useremail" aria-describedby="useremailHelp" type="text" placeholder="Correo electrónico" value="<?=$email?>" class="form-control <?= strlen($errores['email']) > 0 ? 'errores-form-sr':'' ?>">
                              <label for="useremail">Email</label>
                              <?php if (isset($errores['email'])): ?>
                                <small id="useremailHelp" class="form-text text-danger"><?= $errores['email'] ?></small>
                              <?php endif; ?>
                            </div>
                            <div class="form-label-group">
                              <input name="password" id="userpassword" aria-describedby="userpasswordHelp" type="password" placeholder="Contraseña" class="form-control <?= strlen($errores['password']) > 0 ? 'errores-form-sr':'' ?>">
                              <label for="userpassword">Contraseña</label>
                              <?php if (isset($errores['password'])): ?>
                                <small id="userpasswordHelp" class="form-text text-danger"><?= $errores['password'] ?></small>
                              <?php endif; ?>
                            </div>
                            <div class="container">
                              <div class="row flex-column flex-md-row justify-content-md-between align-items-md-center">
                                <button type="submit" class="btn btn-primary iniciar mb-3 mb-md-0">Iniciar sesión</button>
                                <a class="text-center text-md-left" href="#">¿Olvidaste tu contraseña?</a>
                              </div>
                              <div class="row mt-3">
                                <label>
                                  <input type="checkbox" value="1" name="recordarme" checked="checked">
                                    Recordarme
                                </label>
                              </div>
                            </div>
                          </form>
                        </div>
                        <div class="tab-pane fade" id="registro" role="tabpanel" aria-labelledby="profile-tab">
                          <form method="post" enctype="multipart/form-data">
                            <div class="form-group">
                              <input type="text" name="nombre" class="form-control" aria-describedby="nombreHelp" placeholder="Nombre">
                            </div>
                            <div class="form-group">
                              <input type="text" name="apellido" class="form-control" aria-describedby="apellidoHelp" placeholder="Apellido">
                            </div>
                            <div class="form-group">
                              <input name="email" type="email" class="form-control" aria-describedby="emailHelp" placeholder="Correo electrónico">
                            </div>
                            <div class="form-group">
                              <input name="password" type="password" class="form-control" placeholder="Contraseña">
                            </div>
                            <div class="container">
                              <div class="row flex-column flex-md-row justify-content-md-between align-items-md-center">
                                <button type="submit" class="btn btn-primary iniciar mb-3 mb-md-0">Registrate</button>
                              </div>
                              <div class="row mt-3">
                              </div>
                            </div>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <article class="mt-4 objetive">
              <div class="card">
                <div class="card-body">
                  <div class="container">
                    <div class="row">
                      <!--<div class="features-sr">
                       <h5 class="mb-3"><span class="sr-textdecoration">Single Riders</span> te facilita</h5>
                       <ul class="mb-0 pl-2">
                         <li><i class="fa fa-search"></i> Buscar y contactar a otros viajeros:
                            <ul>
                              <li>Para unirte a un viaje</li>
                              <li>Durante un viaje</li>
                            </ul>

                         </li>
                         <li><i class="fa fa-map-marker-alt"></i>Explorar viajes de otras personas para ver consejos y opiniones</li>
                         <li><i class="fa fa-share-alt"></i> Compartir tus experiencias para ayudar a otros viajeros</li>
                       </ul>
                     </div>-->
                      <div class="col-12 col-sm-6 text-center features-sr overbuttons" onclick="$('.card-viajes').collapse('hide');$('#collapsebuscar').collapse('toggle')">
                        <div>
                          Buscá
                          <i class="fa fa-search"></i>
                        </div>
                        <i class="fa fa-angle-down"></i>
                      </div>
                      <div class="col-12 col-sm-6 text-center features-sr overbuttons" onclick="$('.card-viajes').collapse('hide');$('#collapsecrear').collapse('toggle')">
                        <div>
                          Creá
                          <i class="fa fa-plus"></i>
                        </div>
                        <i class="fa fa-angle-down"></i>
                      </div>
                    </div>
                  </div>
                  <div class="container">
                    <div class="row">
                      <div class="col-12 obj-viajes text-uppercase text-center p-1 font-weight-bold">
                        viajes
                        <i class="fa fa-suitcase"></i>
                        <div class="collapse card-viajes" id="collapsebuscar">
                          <div class="card card-body border-0">
                            Buscá: Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident.
                          </div>
                        </div>
                        <div class="collapse card-viajes" id="collapsecrear">
                          <div class="card card-body border-0">
                            Creá: Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident.
                          </div>
                        </div>
                        <div class="collapse card-viajes" id="collapseunirse">
                          <div class="card card-body border-0">
                            Unite: Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident.
                          </div>
                        </div>
                        <div class="collapse card-viajes" id="collapsecompartir">
                          <div class="card card-body border-0">
                            Compartí: Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident.
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="container">
                    <div class="row">
                      <div class="col-12 col-sm-6 text-center features-sr overbuttons" onclick="$('.card-viajes').collapse('hide');$('#collapseunirse').collapse('toggle')">
                        <i class="fa fa-angle-up"></i>
                        <div>
                          Unite
                          <i class="far fa-hand-pointer"></i>
                        </div>
                      </div>
                      <div class="col-12 col-sm-6 text-center features-sr overbuttons" onclick="$('.card-viajes').collapse('hide');$('#collapsecompartir').collapse('toggle')">
                        <i class="fa fa-angle-up"></i>
                        <div>
                          Compartí
                          <i class="fa fa-share-alt"></i>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </article>
          </div>
        </div>
      </div>
    </section>

    <?php require_once('footer.php'); ?>

    </body>
</html>
