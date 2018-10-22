<?php


abstract class Cuenta
{
  protected $saldo;
  protected $cliente;
  protected $numCuenta;

  public function __construct(Cliente $cliente)
  {
      $this->$saldo = 0;
      $this->$cliente = $cliente;
  }

  public function depositar(int $monto);
  $this->saldo+=$saldo;


  public function extraer(int $saldo);
  if($saldo >=$saldo){
    $this->saldo-=$saldo;
    return=$saldo;
  }else
  {
    echo "No Cuentas con esa cantidad de dinero";
  }

  public function informarSaldo()
  {
    return $this->saldo;
  }


}


 ?>
