<?php

class Empresa extends Cliente
{
  protected $nombreFantasia;
  protected $cuit;

  public function __contruct(string $nombreFantasia, int $cuit)
  {
    $this->nombreFantasia = $nombreFantasia;
    $this->cuit = $cuit;
  }


}
