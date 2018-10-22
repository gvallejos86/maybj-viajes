<?php

$actividades=['Turismo en Bicicleta','Rafting','Sock cultural','Tour vino y comida','Moto Tour','Montañismo','Safari','Navegacion','Snorkeling','Sky',
'Trekking','Voluntariado','Ecologico']


function validar($data){
    $textmensaje = trim($data['textmensaje']);
    $datein = trim($data['datein']);
    $dateout = trim($data['dateout']);
    $pais=    trim($data['pais']);
    $ciudad=  trim($data['ciudad']);
    $importe= trim($data['importe']);
    $moneda= trim($data['moneda']);
    $errores = [];
    }
    if ($textmensaje == '') {
            $errores['textmensaje']  = 'Por favor compelta el nomre de tu viaje';
        }
    if ($datein == '') {
            $errores['datein']  = 'Por favor compelta la fecha salida';
        }
    if ($dateout == '') {
              $errores['dateout']  = 'Por favor compelta la fecha de regreso';
        }
    if ($pais == '') {
              $errores['pais']  = 'Por favor indica el País al que viajas';
       }
    if ($ciudad == '') {
              $errores['ciudad']  = 'Por favor indica la ciudad a visitar';
       }
    if ($importe == '') {
              $errores['importe']  = 'Por favor indica tu presupuesto';
      }
    if ($moneda == '') {
              $errores['moneda']  = 'Por favor indica que moneda presupuestas';
      }

   function guardarViaje($data,$archivo){
      $viaje=[
        "textmensaje" -> $data['textmensaje'],
        "datein" ->$data['datein'],
        "dateout" ->$data['dateout'],
        "pais" ->$data['pais'],
        "actividades" ->$data['actividades'],
        "ciudad" ->$data['ciudad'],
        "mensajeiti" ->$data['mensajeiti'],
        "importe" ->$data['importe'],
        "moneda" ->$data['moneda'],
      ];

    $viajeJSON= json_encode($viaje);

    file_put_contents('viajes.json', $viajeJSON . PHP_EOL, FILE_APPEND);
  }

?>
