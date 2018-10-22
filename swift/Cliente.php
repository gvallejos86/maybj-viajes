<?php

abstract class Cliente
{
  protected $nroCliente;

  public function __construct(int $nroCliente)
  {
    $this->nroCliente = $nroCliente;
  }

  public function ident()
  {
    return $this->nroCliente;
  }
}
