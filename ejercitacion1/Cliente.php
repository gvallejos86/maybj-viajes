<?php
require_once('cajaDeAhorro.php');
require_once('cuenta.php');

abstract class Cliente
{
  private $numCliente;


  public function __construct(int $numCliente,string $apellido,int $dni,int $cuit)
  {
      $this->$numCliente = $numCliente;

  }
  public function informarCliente($numCliente)
  {
    $this->numCliente=$numCliente;
  }
}



 ?>
