<?php

abstract class Cuenta
{
  protected $cliente;
  protected $nroCuenta;
  protected $saldo;

  public function __construct (Cliente $cliente, int $nroCuenta, int $saldo)
  {
    $this->cliente = $cliente;
    $this->nroCuenta = $nroCuenta;
    $this->saldo = $saldo;
  }

  public function depositar(int $saldo)
    {
        $saldo = $saldo - 100;
        $this->saldo+=$saldo;
    }

  public function getNroCuenta()
  {
    return $this->nroCuenta;
  }
}
