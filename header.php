
<?php

  require_once('funciones.php');

  if (isset($_SESSION['id'])) {
    $usuariologin = obtenerId($_SESSION['id']);
  }else if (isset($_COOKIE['id'])) {
    $usuariologin = obtenerId($_COOKIE['id']);
  }


?>
  <html>
  <head>
    <link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Abel|Montserrat:400,400i,700,700i|Pacifico" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
    <link rel="stylesheet" href="css/header.css">
  </head>
    <header>
      <nav class="navbar navbar-dark fixed-top">
        <a class="navbar-brand" href="index.php">
          <div>
            <div class="logo-container">
              <div class="single">
                S
              </div>
              <div class="riders">
                R
              </div>
            </div>
          </div>
        </a>
        <?php if (!isset($usuariologin)): ?>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <?php endif; ?>
        <?php if (isset($usuariologin)): ?>
        <div id="loguerla">
        <h2>Single Riders</h2>
        </div>
        <?php endif; ?>
        <?php // NOTE: Navbar no logueado ?>
        <?php if (!isset($usuariologin)): ?>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
              <li class="nav-item active">
                <a class="nav-link" href="index.php">Home<span class="sr-only">(current)</span></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="faqs.php">Faqs</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="login.php">Login</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="registro.php">Registro</a>
              </li>
            </ul>
          </div>
        <?php endif; ?>

        <?php // NOTE: navbar logueado ?>
        <?php if (isset($usuariologin)): ?>
          <div class="dropdown">
            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <?=$usuariologin['nombre']; ?>
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <a class="dropdown-item" href="perfil.php">Editar Perfil</a>
            <a class="dropdown-item" href="#">Mis Viajes</a>
            <a class="dropdown-item" href="#">Cambiar Cuenta</a>
            <a class="dropdown-item" href="faqs.php">faqs</a>

            <a class="dropdown-item" href="logout.php">Cerrar sesión</a>
            </div>
          </div>
        <?php endif; ?>
      </nav>
    </header>
  </html>
