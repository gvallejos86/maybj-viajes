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
      <div class="container pt-5">
        <div class="row pt-3 pb-0 pl-0 pr-0 bg-white rounded home-row-main">
          <?php if (!isset($usuariologin)): ?>
          <div class="home-mod-login pt-5 mt-3 pt-md-0 mt-md-0">
            <a href="login.php" class="mr-1 btn btn-outline-primary">Ingresá</a>
            <a class="ml-1 btn btn-outline-secondary" href="registro.php">Registrate</a>
          </div>
          <div class="container titulo-sr-home">
            <div class="row justify-content-center">
              <h1 class="text-center mb-4"><span class="single-f mr-2">Single</span><span class="single-f">Riders</span></h1>
            </div>
          </div>
          <div class="col-12 p-0 home-carousel">
            <!-- Slider home -->
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
              <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
              </ol>
              <div class="carousel-inner">
                <div class="carousel-item active">
                  <div class="carousel-caption carousel-caption-top d-none d-md-block">
                    <h2>Red social para viajeros</h2>
                  </div>
                  <img class="d-block w-100" src="./images/home01.png" alt="First slide">
                  <div class="carousel-caption d-none d-md-block">
                    <h5><a href="registro.php" class="text-white">Registrate</a></h5>
                    <p>Es gratis!</p>
                  </div>
                </div>
                <div class="carousel-item">
                  <div class="carousel-caption carousel-caption-top d-none d-md-block" style="top:45%">
                    <h2>Red social para viajeros</h2>
                  </div>
                  <img class="d-block w-100" src="./images/home05.png" alt="Second slide">
                  <div class="carousel-caption d-none d-md-block">
                    <h5><a href="registro.php" class="text-white">Registrate</a></h5>
                    <p>Es gratis!</p>
                  </div>
                </div>
                <div class="carousel-item">
                  <div class="carousel-caption carousel-caption-top d-none d-md-block" style="top:45%">
                    <h2>Red social para viajeros</h2>
                  </div>
                  <img class="d-block w-100" src="./images/home06.png" alt="Third slide">
                  <div class="carousel-caption d-none d-md-block">
                    <h5><a href="registro.php" class="text-white">Registrate</a></h5>
                    <p>Es gratis!</p>
                  </div>
                </div>
                <div class="carousel-item">
                  <div class="carousel-caption carousel-caption-top d-none d-md-block" style="top:45%">
                    <h2>Red social para viajeros</h2>
                  </div>
                  <img class="d-block w-100" src="./images/home07.png" alt="Fourth slide">
                  <div class="carousel-caption d-none d-md-block">
                    <h5><a href="registro.php" class="text-white">Registrate</a></h5>
                    <p>Es gratis!</p>
                  </div>
                </div>
              </div>
              <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
              </a>
              <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
              </a>
            </div>
          </div>
          <?php endif; ?>
          <div class="col-12">
            <h3 class="mb-5 mt-5 pt-3 pb-3 text-center">Encontrá compañeros de viaje</h3>
            <ul class="items-home-slider">
              <li>Armá tu viaje</li>
              <li>Compartí tu itinerario</li>
              <li>Contactate con otros viajeros</li>
              <li>Unite a viajes de otros usuarios</li>
            </ul>
          </div>
          <div class="col-12 second-section mt-2">
            <h3 class="mb-5 mt-5 pt-3 pb-3 text-center">Últimos viajes publicados</h3>
            <div class="card-columns">
              <div class="card">
                <div class="fondo-card"></div>
                <img class="card-img-top" src="./images/flags/india.png" alt="Card image cap">
                <div class="card-body">
                  <h5 class="card-title text-center"><strong>India</strong></h5>
                  <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                </div>
              </div>
              <div class="card">
                <div class="fondo-card"></div>
                <img class="card-img-top" src="./images/flags/nuevaguinea.png" alt="Card image cap">
                <div class="card-body">
                  <h5 class="card-title text-center"><strong>Papua Nueva Guinea</strong></h5>
                  <p class="card-text">This card has supporting text below as a natural lead-in to additional content.</p>
                  <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                </div>
              </div>
              <div class="card">
                <div class="fondo-card"></div>
                <img class="card-img" src="./images/flags/egipto.png" alt="Card image">
              </div>
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title text-center"><strong>Egipto</strong></h5>
                  <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This card has even longer content than the first to show that equal height action.</p>
                  <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                </div>
              </div>
            </div>
          </div>
          <div class="col-12 mt-2 mb-5">
            <h3 class="mb-5 mt-5 pt-3 pb-3 text-center">Riders en el mundo</h3>
            <div class="container-fluid">
              <div id="map">
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <?php require_once('footer.php'); ?>
    <script type="text/javascript">
    function initialize() {

        var styleArray = [
          {
            featureType: 'all',
            stylers: [
              { saturation: 20 }
            ]
          },{
            featureType: 'road.arterial',
            elementType: 'geometry',
            stylers: [
              { hue: '#0097a7' },
              { saturation: 50 }
            ]
          },{
            featureType: 'poi.business',
            elementType: 'labels',
            stylers: [
              { visibility: 'off' }
            ]
          }
        ];

        var mapOptions = {
          styles: styleArray,
          center: new google.maps.LatLng(0, 0),
	        zoom: 2,
	        minZoom: 2,
          disableDefaultUI: true
        };

        var map = new google.maps.Map(document.getElementById('map'),
          mapOptions);

        var bounds = new google.maps.LatLngBounds();

        var contentString = '<div id="content" style="font-size:16px">'+
          '<div id="siteNotice">'+
          '</div>'+
          '<h3 id="firstHeading" class="firstHeading">Unite</h3>'+
          '<div id="bodyContent">'+
          '<p class="mb-1"><b>Explorá</b> el mundo, compartí tus experiencias, ' +
          'conocé gente.</p>'+
          '<p class="mb-1">Hacé como otros viajeros: <a href="registro.php">registrate</a> '+
          '(Equipo de Single Riders, 2018).</p>'+
          '</div>'+
          '</div>';

            var infowindow = new google.maps.InfoWindow({
              content: contentString
            });

        // Creamos marcadores
        var marker1 = new google.maps.Marker({position: {lat: -34.60408884171046, lng: -58.39950084686279},title:"Rider 1",icon: "./images/marcador7.png"});


        marker1.addListener('click', function() {
              infowindow.open(map, marker1);
            });
        infowindow.open(map, marker1);

        var marker2 = new google.maps.Marker({position: {lat: 13.577267, lng: 5.283430},title:"Rider 2",icon: "./images/marcador6.png"});
        var marker3 = new google.maps.Marker({position: {lat: 41.135223, lng: 90.365894},title:"Rider 2",icon: "./images/marcador5.png"});
        var marker4 = new google.maps.Marker({position: {lat: 47.432992, lng: 5.615819},title:"Rider 2",icon: "./images/marcador7.png"});
        var marker5 = new google.maps.Marker({position: {lat: -24.270152, lng: 113.933077},title:"Rider 2",icon: "./images/marcador6.png"});
        var marker6 = new google.maps.Marker({position: {lat: 51.882818, lng: -104.068776},title:"Rider 2",icon: "./images/marcador5.png"});

        // posicionamos en el mapa
        marker1.setMap(map);
        marker2.setMap(map);
        marker3.setMap(map);
        marker4.setMap(map);
        marker5.setMap(map);
        marker6.setMap(map);
        bounds.extend(marker1.position);
        bounds.extend(marker2.position);
        bounds.extend(marker3.position);
        bounds.extend(marker4.position);
        bounds.extend(marker5.position);
        bounds.extend(marker6.position);
        map.fitBounds(bounds);
      }


      google.maps.event.addDomListener(window, 'load', initialize);

    </script>
    </body>
</html>
