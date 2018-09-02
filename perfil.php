<!DOCTYPE html>
<html lang="es">
<?php

  require_once('funciones.php');

  if (!isset($_SESSION['id']) && !isset($_COOKIE['id'])) {
    header('location:login.php');
  }else if (isset($_SESSION['id'])) {
    $usuariologin = obtenerId($_SESSION['id']);
  }else if (isset($_COOKIE['id'])) {
    $usuariologin = obtenerId($_COOKIE['id']);
  }else {
    header('location:login.php');
  }

  $nombre = $usuariologin['nombre'];
  $apellido = $usuariologin['apellido'];
  $email = $usuariologin['email'];
  $password = $usuariologin['password'];
  $errores = [];


  if ($_POST) {
    $nombre = trim($_POST['nombre']);
    $apellido = trim($_POST['apellido']);
    $email = trim($_POST['email']);
    $mailModificacion = '';
    if ($email != $usuariologin['email']) {
      $mailModificacion = $usuariologin['email'];
    }
    $errores = validar($_POST,'modificacion',$_FILES,$mailModificacion);
    if (empty($errores)) {

        actualizarUsuario($_FILES,$_POST,$usuariologin['id']);

    }

  }
  // NOTE: subir imagenes de usuario al muro
  function obtenerPublicacion($id) {
    $posteos = file_get_contents('posteos.json');
    $arrPosteosJSON = explode(PHP_EOL,$posteos);
    $arrUsuarioPosteo = [];
    $arrUsuarioPosteotmp = [];
    array_pop($arrPosteosJSON);
    $counter = 0;
    foreach ($arrPosteosJSON as $key => $usuario) {

        $arrUsuarioPosteotmp[] = json_decode($usuario,true);
        if ($arrUsuarioPosteotmp[0]['id'] == $id) {
          $counter++;
          $arrUsuarioPosteo[] = json_decode($usuario,true);
        }
        $arrUsuarioPosteotmp = [];

    }

    $usuariopost['counter'] = $counter+1;
    $usuariopost['posteos'] = $arrUsuarioPosteo;

    return $usuariopost;
  }
  function subirPublicacion($imagen,$idusuario){
      $userPosts = obtenerPublicacion($idusuario);
      $datosPosteo['counter'] = $userPosts['counter'];
      $datosPosteo['id'] = $idusuario;
      $ext = strtolower(pathinfo($imagen['imgposteo']['name'], PATHINFO_EXTENSION));
      $hasta = '/images/posteosImg/'.'posts'.$idusuario.'-'.$datosPosteo['counter'].'.'.$ext;
      $datosPosteo['srcImagenposteo'] = $hasta;
      $posteojson = json_encode($datosPosteo);

      if (subirImgPosteo($_FILES,$idusuario,$userPosts['counter'])) {
        file_put_contents('posteos.json', $posteojson . PHP_EOL, FILE_APPEND);
      }
  }

  function subirImgPosteo($imagen,$id,$counter=0){

    if ($imagen['imgposteo']['error'] === UPLOAD_ERR_OK) {
        $ext = strtolower(pathinfo($imagen['imgposteo']['name'], PATHINFO_EXTENSION));
        if ($ext == 'jpg' || $ext == 'png' || $ext == 'jpeg') {
            $hasta = dirname(__FILE__) .'/images/posteosImg/'.'posts'.$id.'-'.$counter.'.'.$ext ;
            $desde = $imagen['imgposteo']['tmp_name'];
            if (file_exists($hasta)) {
              return false;
            }else {
              move_uploaded_file($desde, $hasta);
              return true;
            }

        }else {
            var_dump('extension invalida!');
            return false;
        }
    }else {
        return false;
    }
  }


// NOTE: obtengo array con los posteos de usuario para mostrar las cards
$userPosts = obtenerPublicacion($usuariologin['id']);


?>
<head>
    <title>Perfil</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Abel|Montserrat:400,400i,700,700i|Pacifico" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/styles.css">
</head>
<body class="home">
  <?php require_once('header.php'); ?>
  <!-- OPCIONES DEL USUARIO-->
  <section class="home-container container-fluid mt-5">
    <div class="row justify-content-center">
      <div class="col-12 col-sm-8 bg-white rounded text-center">
        <article class="perfil">
          <div class="imagen_perfil pt-5 mb-2">
            <?php if(!isset($usuariologin['srcImagenperfil'])): ?>
              <img class="rounded-circle" src="images/perfil.jpg" alt="" width="100px">
            <?php else: ?>
              <img class="rounded-circle" src=".<?=$usuariologin['srcImagenperfil']?>" alt="" width="100px">
            <?php endif; ?>
          </div>
          <div class="nombre_usuario mb-2">
            <h3><?= $usuariologin['nombre']; ?></h3>
          </div>
          <div class="container mt-1">
            <div class="row justify-content-center">
              <div class="col-12 col-lg-2">
                <div>
                  <strong>100</strong>
                </div>
                <div>Seguidores</div>
              </div>
              <div class="col-12 col-lg-2">
                <div>
                  <strong>100</strong>
                </div>
                <div>Seguidos</div>
              </div>
              <div class="col-12 col-lg-2">
                <div>
                  <strong>100</strong>
                </div>
                <div>Publicaciones</div>
              </div>
              <div class="col-12 col-lg-2">
                <div>
                  <strong>100</strong>
                </div>
                <div class="text-center">Viajes realizados</div>
              </div>
            </div>
          </div>
        </article>
        <div class="row justify-content-center bg-white mt-5 text-left">
          <div class="col-11 col-md-10">
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
                <input name="password" id="password" type="password" aria-describedby="passwordHelp" placeholder="Contraseña" value="<?=$password?>" class="form-control <?= isset ($errores['password']) ? strlen($errores['password']) > 0 ? 'errores-form-sr':'' : '' ?>">
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
                  <button type="submit" class="btn btn-primary iniciar mb-3 mb-md-0">Modificar</button>
                </div>
                <div class="row mt-3">
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
    <?php require_once('footer.php'); ?>
  </body>
</html>
