<?php

class cuentaCorriente extends Cuenta
{
  private$giroDescubierto;

  //funcion para depositar cheque//
  public function depositarCheque($cheque)
  {
    parent::depositar($cheque->informarMonto());

  }
//funcion para depositar tanto cheques como pesos//
  public function depositar($monto)
  {
    if($monto instanceof Cheque){
    $saldo+=$monto->PedirMonto();
    }
  else
  {
    $saldo+=$monto;
  }

}

?>
