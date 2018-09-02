<!doctype html>
<html lang="en">

<?php
require_once('funciones.php');
if (isset($_SESSION['id']) || isset($_COOKIE['id'])) {
    header('location:muro.php');
}
$nombre = '';
$apellido = '';
$email = '';
$errores = [];

if ($_POST) {
  $nombre = trim($_POST['nombre']);
  $apellido = trim($_POST['apellido']);
  $email = trim($_POST['email']);
  $errores = validar($_POST,'registro',$_FILES);
  if (empty($errores)) {

      registrar($_POST,$_FILES);

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
                <a class="nav-link" id="login-tab" href="login.php">Ingresá</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" id="registro-tab" data-toggle="tab" href="#registro" role="tab" aria-controls="registro" aria-selected="false">Registrate</a>
              </li>
            </ul>
            <div class="card border-top-0 rounded-0 bottom-radius">
              <div class="car-body">
                <div class="container mt-3">
                  <div class="row">
                    <div class="col-12">
                      <div class="tab-content">
                        <div class="tab-pane" id="login" role="tabpanel" aria-labelledby="login-tab">
                          <form method="post" enctype="multipart/form-data">
                            <div class="form-group">
                              <input name="useremail" type="email" class="form-control" aria-describedby="emailHelp" placeholder="Correo electrónico">
                            </div>
                            <div class="form-group">
                              <input name="userpassword" type="password" class="form-control" placeholder="Contraseña">
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
                        <div class="tab-pane fade show active" id="registro" role="tabpanel" aria-labelledby="profile-tab">
                          <form method="post" enctype="multipart/form-data">
                            <div class="form-label-group">
                              <input type="text" name="nombre" id="nombre" aria-describedby="nombreHelp" placeholder="Nombre" value="<?=$nombre?>" class="form-control <?= isset($errores['nombre']) ? strlen($errores['nombre']) > 0 ? 'errores-form-sr':'' : '' ?>">
                              <label for="nombre">Nombre</label>
                              <?php if (isset($errores['nombre'])): ?>
                                <small id="nombreHelp" class="form-text text-danger"><?= $errores['nombre'] ?></small>
                              <?php endif; ?>
                            </div>
                            <div class="form-label-group">
                              <input type="text" name="apellido" id="apellido" aria-describedby="apellidoHelp" placeholder="Apellido" value="<?=$apellido?>" class="form-control <?= isset($errores['apellido']) ? strlen($errores['apellido']) > 0 ? 'errores-form-sr':'' : '' ?>">
                              <label for="apellido">Apellido</label>
                              <?php if (isset($errores['apellido'])): ?>
                                <small id="apellidoHelp" class="form-text text-danger"><?= $errores['apellido'] ?></small>
                              <?php endif; ?>
                            </div>
                            <div class="form-label-group">
                              <input name="email" id="email" type="text" aria-describedby="emailHelp" placeholder="Correo electrónico" value="<?=$email?>" class="form-control <?= isset($errores['email']) ? strlen($errores['email']) > 0 ? 'errores-form-sr':'' : '' ?>">
                              <label for="email">Correo electrónico</label>
                              <?php if (isset($errores['email'])): ?>
                                <small id="emailHelp" class="form-text text-danger"><?= $errores['email'] ?></small>
                              <?php endif; ?>
                            </div>
                            <div class="form-label-group">
                              <input name="password" id="password" type="password" aria-describedby="passwordHelp" placeholder="Contraseña" class="form-control <?= isset ($errores['password']) ? strlen($errores['password']) > 0 ? 'errores-form-sr':'' : '' ?>">
                              <label for="password">Contraseña</label>
                              <?php if (isset($errores['password'])): ?>
                                <small id="passwordHelp" class="form-text text-danger"><?= $errores['password'] ?></small>
                              <?php endif; ?>
                            </div>
                            <div class="form-label-group">
                              <input name="imgperfil" id="imgperfil" type="file" aria-describedby="imgperfilHelp" placeholder="Imagen de perfil" class="form-control <?= isset($errores['imgperfil']) ? strlen($errores['imgperfil']) > 0 ? 'errores-form-sr':'' : '' ?>">
                              <label for="password">Imagen de perfil</label>
                              <?php if (isset($errores['imgperfil'])): ?>
                                <small id="imgperfilHelp" class="form-text text-danger"><?= $errores['imgperfil'] ?></small>
                              <?php endif; ?>
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
    <!-- Modal -->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalCenterTitle">Bienvenido!</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            Ya formás parte de la comunidad Single Riders, a continuación accederás a la página principal desde la que podrás compartir, publicar, buscar viajes.
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Save changes</button>
          </div>
        </div>
      </div>
    </div>

    <?php require_once('footer.php'); ?>

    </body>
</html>
