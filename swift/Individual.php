<?php

class Individual extends Cliente
{
  protected $nombre;
  protected $apellido;
  protected $dni;

  public function __construct (int $nroCliente, string $nombre, string $apellido, int $dni)
  {
    $this->nroCliente = $nroCliente;
    $this->nombre = $nombre;
    $this->apellido = $apellido;
    $this->dni = $dni;
  }

  public function getNombre()
  {
    return $this->nombre;
  }

  public function getApellido()
  {
    return $this->apellido;
  }

  public function getDni()
  {
    return $this->dni;
  }
}
