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
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- FUENTES -->
    <link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Abel|Montserrat:400,400i,700,700i|Pacifico" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
    <!-- FUENTE MENU DE NAVEGACION IZQUIERDO-->
    <link href="https://fonts.googleapis.com/css?family=Acme" rel="stylesheet">
    <!-- CSS-->
    <link rel="stylesheet" href="css/home.css">
    <title>Document</title>
</head>
<body>
    <header>
        
    </header>
    <section class="super-container container">
        <!-- CAJA RELLENO -->
        <div class="relleno"></div>
        <!-- CAJA IZQUIERDA -->
        <article class="izquierda">
            <div class="datos-perfil">
                <img src="images/perfil.jpg" alt="" id="foto-perfil">
                <button id="editar-foto"><img src="images/iconos/home/editar.png" alt=""> <p>Editar foto </p></button>
            </div>
            <div class="caja-navegacion-perfil">
                <ul class="navegacion-perfil">
                    <li>
                        <img src="images/iconos/home/perfil_chico.png" alt="" width="20px">
                        <a href="#">Ver mi Perfil</a>
                    </li>
                    <li>
                        <img src="images/iconos/home/crear_viaje.png" alt="">
                        <a href="#">Crear Viaje</a>
                    </li>
                    <li>
                        <img src="images/iconos/home/ver_mis_viajes.png" alt="">
                        <a href="#">Ver mis Viajes</a>
                    </li>
                    <li>
                        <img src="images/iconos/home/crear_grupo.png" alt="">
                        <a href="#">Crear Grupo</a>
                    </li>
                    <li>
                        <img src="images/iconos/home/unirte_a_viaje.png" alt="">
                        <a href="#">Unirte a Grupo</a>
                    </li>
                    <li>
                        <img src="images/iconos/home/sobre.png" alt="">
                        <a href="#">Ver mis Mensajes</a>
                    </li>
                </ul>
            </div>
            <div class="redes">
                <div class="redes-titulo">
                    <h5>
                        Social
                    </h5>
                </div>
                <div class="menu-social">
                    <ul>
                        <li>
                            <a href="#"><img src="images/iconos/home/redes/facebook.png" alt=""></a>
                        </li>
                        <li>
                            <a href="#"><img src="images/iconos/home/redes/instagram.png" alt=""></a>
                        </li>
                        <li>
                            <a href="#"><img src="images/iconos/home/redes/twitter.png" alt="" style="border-radius: 5px;"></a>
                        </li>
                        <li>
                            <a href="#"><img src="images/iconos/home/redes/google-plus.png" alt="" style="border-radius: 5px;"></a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="redes">
                <div class="redes-titulo">
                    <h5>
                        Viajes Aleatorios
                    </h5>
                </div>
                <div class="viajes_aleatorios">
                    <p>Proximamente</p>
                </div>
            </div>
        </article>
        <!-- CAJA CENTRO -->
        <article class="centro">
            <div class="muro">
                <div class="header_muro">
                     <p>Muro</p>
                </div>
                <div class="contenido_muro">
                    <div class="centro-muro container">
                        <div class="foto-publicar">
                            <div class="imagen_foto">
                                <img src="images/perfil.jpg" alt="" width="50px">
                                <p><?= $usuariologin['nombre']; ?></p>
                            </div>
                            <div class="caja_texto container">
                                <form action="get">
                                    <textarea name="publicacion" id="" cols="15" rows="3" placeholder="¿Que estas pensando?"></textarea>
                                    <br>
                                    <input type="submit" value="Publicar">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
        </article>
    </section>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>