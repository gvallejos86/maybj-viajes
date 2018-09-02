<!DOCTYPE html>
<html lang="en">
<?php
  require_once('funciones.php');
  $nombres = traerNombreDeUsuarios();
  msjAseleccionar();
  if($_POST){
    $guardarMsj = crearMensaje();
  }
  if (!isset($_SESSION['id']) && !isset($_COOKIE['id'])) {
    header('location:login.php');
  }else if (isset($_SESSION['id'])) {
    $usuariologin = obtenerId($_SESSION['id']);
  }else if (isset($_COOKIE['id'])) {
    $usuariologin = obtenerId($_COOKIE['id']);
  }else {
    header('location:login.php');
  }
?>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <!--FUENTES-->
  <link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/css?family=Abel|Montserrat:400,400i,700,700i|Pacifico" rel="stylesheet">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">

  <link rel="stylesheet" href="css/perfil.css">
  <title>Document</title>
</head>
<body class="home">
  <?php require_once('header.php'); ?>
  <header class="header" style="display:none;">
  <!-- OPCIONES DEL USUARIO-->
  <div class="dropdown">
    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Jonh Foo
    </button>
    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
    <a class="dropdown-item" href="#">Editar Perfil</a>
    <a class="dropdown-item" href="#">Mis Viajes</a>
    <a class="dropdown-item" href="#">Cambiar Cuenta</a>
    </div>
  </div>
    <div id="loguerla">
    <h2>Single Riders</h2>
    </div>
  <!-- MENU HAMBURGUESA-->
  <!--<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item active">
      <a class="nav-link" href="#">Home<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
      <a class="nav-link" href="#">Nosotros</a>
      </li>
      <li class="nav-item">
      <a class="nav-link" href="#">Faqs</a>
      </li>
      <li class="nav-item">
      <a class="nav-link" href="#">Login</a>
      </li>
    </ul>
    </div>
    </nav>-->
  </header>
  <section class="container-fluid bg-white mt-5">
  <div class="relleno" style="width: 100%; height: 50px;"></div>
  <article class="perfil">
    <div class="imagen_perfil">
    <?php if(!isset($usuariologin['srcImagenperfil'])): ?>
      <img src="images/perfil.jpg" alt="" width="100px">
    <?php else: ?>
      <img src=".<?=$usuariologin['srcImagenperfil']?>" alt="" width="100px">
    <?php endif; ?>
    </div>
     <div class="nombre_usuario">
     <h3><?= $usuariologin['nombre']; ?></h3>
     </div>
     <div class="estadisticas">
    <div class="estadisticas_indicadores">
    <div>
    <table>
      <tr>
      <th>100</th>
      </tr>
      <tr>
      <td>seguidores</td>
      </tr>
    </table>
    </div>
    <div>
    <table>
      <tr>
      <th>100</th>
      </tr>
      <tr>
      <td>seguidos</td>
      </tr>
    </table>
    </div>
    <div>
    <table style="width: 100%;">
      <tr>
      <th>6</th>
      </tr>
      <tr>
      <td>publicaciones</td>
      </tr>
    </table>
    </div>
    <div>
    <table>
      <tr>
      <th>3</th>
      </tr>
      <tr>
      <td>viajes realizados</td>
      </tr>
    </table>
    </div>
    </div>
    </div>
  </article>
  <article class="fotos container-fluid">
    <div id="accordion" style="text-align: center;">
    <div class="card-new">
      <div class="card-header" id="headingOne">
      <h5 class="mb-0">
      <button class="boton_fotos btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
      Fotos
      </button>
      </h5>
      </div>

      <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
      <div class="card-body">
        <article class="fotos">
          <div class="fotos_titulo">Galeria</div>
          <div class="fotos_contenido">
            <div class="card">
              <img class="card-img-top" src="images/imagenes_perfil/paisaje_uno.jpg" alt="Card image cap"  width="150px" height="150px">
              <div class="card-body">
                <p class="card-text">
                <div class="iconos_interaccion">
                <img src="images/iconos/fotos/me_gusta.png" alt="Me Gusta" width="28px" height="28px">
                <img src="images/iconos/fotos/comentario.png" alt="Comentar" width="25px" height="25px">
                <img src="images/iconos/fotos/compartir.png" alt="Compartir" width="25px" height="25px">
                </div>
                <div class="descripcion">
                <h8>Descripción</h8>
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Atque porro molestias pariatur blanditiis necessitatibus ut aspernatur! Praesentium, facilis totam? Est voluptatibus sint molestiae officia cum tenetur sapiente iste, rerum molestias?</p>
                </div>
                </p>
              </div>
              </div>
              <!-- IMAGEN DOS-->
              <div class="card">
                <img class="card-img-top" src="images/imagenes_perfil/paisaje_dos.jpg" alt="Card image cap"  width="150px" height="150px">
                <div class="card-body">
                <p class="card-text">
                  <div class="iconos_interaccion">
                  <img src="images/iconos/fotos/me_gusta.png" alt="Me Gusta" width="28px" height="28px">
                  <img src="images/iconos/fotos/comentario.png" alt="Comentar" width="25px" height="25px">
                  <img src="images/iconos/fotos/compartir.png" alt="Compartir" width="25px" height="25px">
                  </div>
                  <div class="descripcion">
                  <h8>Descripción</h8>
                  <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Atque porro molestias pariatur blanditiis necessitatibus ut aspernatur! Praesentium, facilis totam? Est voluptatibus sint molestiae officia cum tenetur sapiente iste, rerum molestias?</p>
                  </div>
                </p>
                </div>
                </div>
              <!-- IMAGEN TRES-->
              <div class="card">
                <img class="card-img-top" src="images/imagenes_perfil/paisaje_tres.jpg" alt="Card image cap"  width="150px" height="150px">
                <div class="card-body">
                <p class="card-text">
                  <div class="iconos_interaccion">
                  <img src="images/iconos/fotos/me_gusta.png" alt="Me Gusta" width="28px" height="28px">
                  <img src="images/iconos/fotos/comentario.png" alt="Comentar" width="25px" height="25px">
                  <img src="images/iconos/fotos/compartir.png" alt="Compartir" width="25px" height="25px">
                  </div>
                  <div class="descripcion">
                  <h8>Descripción</h8>
                  <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Atque porro molestias pariatur blanditiis necessitatibus ut aspernatur! Praesentium, facilis totam? Est voluptatibus sint molestiae officia cum tenetur sapiente iste, rerum molestias?</p>
                  </div>
                </p>
                </div>
                </div>
              <!-- IMAGEN CUATRO-->
              <div class="card">
                <img class="card-img-top" src="images/imagenes_perfil/paisaje_cuatro.jpg" alt="Card image cap"  width="150px" height="150px">
                <div class="card-body">
                <p class="card-text">
                  <div class="iconos_interaccion">
                  <img src="images/iconos/fotos/me_gusta.png" alt="Me Gusta" width="28px" height="28px">
                  <img src="images/iconos/fotos/comentario.png" alt="Comentar" width="25px" height="25px">
                  <img src="images/iconos/fotos/compartir.png" alt="Compartir" width="25px" height="25px">
                  </div>
                  <div class="descripcion">
                  <h8>Descripción</h8>
                  <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Atque porro molestias pariatur blanditiis necessitatibus ut aspernatur! Praesentium, facilis totam? Est voluptatibus sint molestiae officia cum tenetur sapiente iste, rerum molestias?</p>
                  </div>
                </p>
                </div>
                </div>
              <!-- IMAGEN CINCO-->
              <div class="card">
                <img class="card-img-top" src="images/imagenes_perfil/paisaje_cinco.jpg" alt="Card image cap"  width="150px" height="150px">
                <div class="card-body">
                <p class="card-text">
                  <div class="iconos_interaccion">
                  <img src="images/iconos/fotos/me_gusta.png" alt="Me Gusta" width="28px" height="28px">
                  <img src="images/iconos/fotos/comentario.png" alt="Comentar" width="25px" height="25px">
                  <img src="images/iconos/fotos/compartir.png" alt="Compartir" width="25px" height="25px">
                  </div>
                  <div class="descripcion">
                  <h8>Descripción</h8>
                  <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Atque porro molestias pariatur blanditiis necessitatibus ut aspernatur! Praesentium, facilis totam? Est voluptatibus sint molestiae officia cum tenetur sapiente iste, rerum molestias?</p>
                  </div>
                </p>
                </div>
                </div>
              <!-- IMAGEN SEIS-->
              <div class="card">
                <img class="card-img-top" src="images/imagenes_perfil/paisaje_seis.jpg" alt="Card image cap"  width="150px" height="150px">
                <div class="card-body">
                <p class="card-text">
                  <div class="iconos_interaccion">
                  <img src="images/iconos/fotos/me_gusta.png" alt="Me Gusta" width="28px" height="28px">
                  <img src="images/iconos/fotos/comentario.png" alt="Comentar" width="25px" height="25px">
                  <img src="images/iconos/fotos/compartir.png" alt="Compartir" width="25px" height="25px">
                  </div>
                  <div class="descripcion">
                  <h8>Descripción</h8>
                  <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Atque porro molestias pariatur blanditiis necessitatibus ut aspernatur! Praesentium, facilis totam? Est voluptatibus sint molestiae officia cum tenetur sapiente iste, rerum molestias?</p>
                  </div>
                </p>
                </div>
                </div>
          </div>
          <div class="paginacion">
            <nav aria-label="Page navigation example">
              <ul class="pagination">
                <li class="page-item">
                <a class="page-link" href="#" aria-label="Previous">
                <span aria-hidden="true">&laquo;</span>
                <span class="sr-only">Previous</span>
                </a>
                </li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item">
                <a class="page-link" href="#" aria-label="Next">
                <span aria-hidden="true">&raquo;</span>
                <span class="sr-only">Next</span>
                </a>
                </li>
              </ul>
              </nav>
          </div>
      </div>
      </div>
    </div>
  </article>
  <article class="muro-container mt-5 bg-white justify-content-center">

    <div class="lateral-izquierdo"></div>
    <div class="centro-muro">
        <div class="foto-publicar container">
            <div class="relleno_muro"></div>
            <div class="imagen_foto">
              <img src="images/perfil.jpg" alt="" width="50px">
            </div>
            <div class="caja_texto">
              <textarea name="" id="" cols="30" rows="10" placeholder="¿Que estas pensando?"></textarea>
              <br>
              <a href="#" class="btn btn-primary">Publicar</a>
            </div>
          </div>

        <div class="publicacion">
            <div class="publicacion_usuarios">
              <div class="publicacion_foto_usuario">
                <img src="images/perfil.jpg" alt="" width="60px">
              </div>
              <div class="publicacion_nombre_usuario">
                <h4>Jonh Foo</h4>
                <p>3hs</p>
              </div>
            </div>
            <div class="publicacion_contenido container">
              Lorem ipsum dolor, sit amet consectetur adipisicing elit. Voluptatum, eum sunt dolore repellendus molestiae accusantium necessitatibus nobis corrupti possimus mollitia hic nam, debitis illum? Est ipsa nisi omnis! Expedita, dolores.
            </div>
            <div class="barra_accion">
              <a href="#"><img src="images/iconos/fotos/me_gusta.png" alt="" width="23px" class="m_g"><p>Me gusta</p></a>
              <a href="#"><img src="images/iconos/fotos/comentario.png" alt="" width="20px"><p>Comentario</p></a>
              <a href="#"><img src="images/iconos/fotos/compartir.png" alt="" width="20px"><p>Compartir</p></a>
            </div>
            <div class="comentario">
              <div class="foto_comentario">
                <img src="images/perfil.jpg" alt="" width="25px;">
              </div>
              <div class="comentario_area">
                <textarea name="" id="" cols="30" rows="10" placeholder="Escribe tu comentario..."></textarea>
              </div>
          </div>
    </div>
    <div>
        <form method="post">
          <select name="to">
            <option value="elige_usuario">Selecciona un usuario</option>
            <?php print_r($nombres); foreach ($nombres['usuarios'] as $nombre) { ?>
            <option value="<?php echo $nombre; ?>"><?php echo $nombre; ?></option>
            <?php } ?>
          </select>
            
            <textarea name="mensaje" placeholder="Envia tu mensaje..."></textarea>

            <input type="submit">

        </form>
         
      </div>

      <div>
        <h3>Aca recibimos el msj</h3>
        <?php
          $msj = msjAseleccionar();
          $contenidoDelMsj;
          $remitente;
          foreach ($msj as $key) {
            $contenidoDelMsj = $key['msj'];
          }
        ?>
              <p></p>
      </div>

  </div>
    <div class="lateral-derecho">
    <article>

    </article>
    </div>
  </article>
  </section>
  <!--FOOTER-->
  <footer class="mt-5">
  <div class="footer">
    <div class="home">
    <a href="mis_fotos.php?home=seleccionada"><img src="images/iconos/footer/home.png" alt="" width="25px"></a>
    </div>
    <div class="search">
    <img src="images/iconos/footer/lupa.png" alt="" width="25px">
    </div>
    <div class="subir_foto">
    <form action="" method="post" enctype="multipart/form-data">
    <input type="hidden" name="nombre" value="value">
    <input type="file" name="subir" id="subir" class="input_file" width="25px">
    <label for="subir"><img src="images/iconos/footer/subir.png" alt="" width="25px"></label>
    </form>
    </div>
    <div class="interacciones">
    <img src="images/iconos/footer/campana.png" alt="" width="25px">
    </div>
    <div class="perfil">
    <a href="mis_fotos.html"><img src="images/iconos/footer/usuario.png" alt="" width="25px" ></a>
    </div>
  </div>
  </footer>
  <?php require_once('footer.php'); ?>
  </body>
</html>
