<?php
include('../extenciones/sms/httpPHPAltiria.php');

class sendSMS
{

    public static function ctrEnviarSMS($telefono, $mensaje)
    {
        $altiriaSMS = new AltiriaSMS();
        $altiriaSMS->setLogin('abraham.misael.as@gmail.com');
        $altiriaSMS->setPassword('6bn26hmb');
        $altiriaSMS->setDebug(true);
        $sDestination = $telefono;
        $sMensaje = $mensaje . 'Creditos restantes :' . $altiriaSMS->getCredit();
        $response = $altiriaSMS->sendSMS($sDestination, $sMensaje);
        if (!$response)
            echo "El envío ha terminado en error";
        else
            echo $response;
    }
}

switch ($_POST["action"]) {
    case 'ctrEnviarSMS':
        var_dump($_POST);
        sendSMS::ctrEnviarSMS($_POST['telefono'], $_POST['mensaje']);
        break;
}
