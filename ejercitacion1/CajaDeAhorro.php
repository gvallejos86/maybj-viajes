<?php

class cajaDeAhorro extends Cuenta{

  private $tasaInt;

  public function __construct(Cuenta $tasaInt)
  {
    $this->tasaInt=$tasaInt;

  }

  public function cobrarInteres()
  {


  }
  }


}


?>
