<?php

include('httpPHPAltiria.php');

class sendSMS
{

  public function enviarSMS($telefono, $mensaje)
  {



    /* $altiriaSMS = new AltiriaSMS();
    $altiriaSMS->setLogin('abraham.misael.as@gmail.com');
    $altiriaSMS->setPassword('6bn26hmb');
    $altiriaSMS->setDebug(true);
    $sDestination = $telefono;
    $response = $altiriaSMS->sendSMS($sDestination, $mensaje);
    if (!$response)
      echo "El envío ha terminado en error";
    else
      echo $response; */
  }

  public function getCreditos($telefono, $mensaje)
  {

    $altiriaSMS = new AltiriaSMS();
    $altiriaSMS->setLogin('abraham.misael.as@gmail.com');
    $altiriaSMS->setPassword('6bn26hmb');
    $altiriaSMS->setDebug(true);
    $sDestination = $telefono;
    $response = $altiriaSMS->sendSMS($sDestination, $mensaje);
    if (!$response)
      echo "El envío ha terminado en error";
    else
      echo $response;
  }
}
