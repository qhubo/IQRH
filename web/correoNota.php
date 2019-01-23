<?Php
header('Content-Type: application/json; charset=utf-8');
//include 'libs/DataBase.php';
require_once('phpmailer/class.phpmailer.php');
include("phpmailer/class.smtp.php");
require 'phpmailer/PHPMailerAutoload.php';


$asunto = 'Skolor Nota de Crédito Electrónica';
$correo = 'abraham.araujo@cybercompgt.net';
$clav = 'admin123';
$correo = 'sapsrvcr@eskolor.com';
$clave = 's@ps3rv3rcr';
$correo = 'facturacr@eskolor.com';
$clave = 'F1@1c2t3u5r8@13C21R34';

$archivo = 'Nota.pdf';
$texto = "Estimado Cliente: <br>
        Adjunto encontrará su nota de crédito creada electrónica. <br>
        Atentamente , <br>";
$nombre = 'Skolor';
//$correo_cliente = 'abrantar@gmail.com';
$correo_cliente = 'mvasquez@via.com.gt';
//$archivo=$_POST["archivo"];
$listaCorreo = null;
$unico = 0;
if (trim($_POST["CORREO"]) <> '') {
    $listaCorreo[] = trim($_POST["CORREO"]);
    $unico = 1;
}
$archivoXml = $_POST["archivo"];
$listaCorreo[] = 'ibalan@via.com.gt';
$listaCorreo[] = 'jdepaz@via.com.gt';
// $listaCorreo[]='abrantar@gmail.com';
$listaCorreo[] = 'facturacioncr@eskolor.com';
$correo_cliente = implode(",", $listaCorreo);

$nameField = $nombre;
$mensaje = $texto;
$mail = new PHPMailer(true);
$mail->IsSMTP();
$body = $mensaje;
try {
    //$mail->Host       = "mail.gmail.com"; // SMTP server
    $mail->SMTPKeepAlive = true;
    $mail->Mailer = "smtp";
    $mail->SMTPSecure = "ssl";                 // sets the prefix to the servier
    $mail->Host = "serv.grupomegatel.com";      // sets GMAIL as the SMTP server
    $mail->Port = 465;   //465  set the SMTP port for the GMAIL server
    $mail->SMTPDebug = 0;                     // enables SMTP debug information (for testing)
    $mail->From = $correo;
    $mail->FromName = utf8_decode('Nota Crédito Electronica Skolor ');
    $mail->Subject = utf8_decode($asunto);
    $mail->AddReplyTo($correo, $nombre);
    $mail->AltBody = utf8_decode($mensaje); // optional - MsgHTML will create an alternate automatically
    $mail->MsgHTML(utf8_decode($body));
    if ($unico == 1) {
        $mail->AddAddress($_POST["CORREO"]);
    } else {
        foreach ($listaCorreo as $correo_cliente) {
            $mail->AddAddress($correo_cliente);
        }
    }
    $mail->SMTPAuth = true;                  // enable SMTP authentication
    $mail->Username = $correo;  // GMAIL username
    $mail->Password = $clave;            // GMAIL password
    if (trim($archivo) <> "") {
        $archivo = 'uploads/' . $archivo;
        $fecha = date('YmdHi');
        $mail->AddAttachment($archivo, 'Nota Credito' . $fecha);
    }
    if (trim($archivoXml) <> "") {
        $rutaXml = 'uploads/nce/' . $archivoXml;
        echo $rutaXml;
        echo "<br>";
        if (file_exists($rutaXml)) {
        $fecha = date('YmdHi');
        $mail->AddAttachment($rutaXml, 'Firmado_' . $fecha);
        }
    }

    if (trim($archivoXml) <> "") {
        $archivoXml = str_replace("Firmado", 'Aceptado', $archivoXml);
        $rutaXml = 'uploads/aceptado/' . $archivoXml;
        if (file_exists($rutaXml)) {
            echo $rutaXml;
            echo "<br>";
            $fecha = date('YmdHi');
            $mail->AddAttachment($rutaXml, 'Aceptado_' . $fecha);
        }
    }
    if (trim($archivoXml) <> "") {
        $archivoXml = str_replace("Firmado", 'Aceptado', $archivoXml);
        $rutaXml = 'uploads/nce/' . $archivoXml;
        if (file_exists($rutaXml)) {
            echo $rutaXml;
            echo "<br>";
            $fecha = date('YmdHi');
            $mail->AddAttachment($rutaXml, 'Aceptado_' . $fecha);
        }
    }


    $mail->Send();
    echo "<br>";
    echo "Message Sent OK</p>\n";
} catch (phpmailerException $e) {
    echo "<br>";
    echo $e->errorMessage(); //Pretty error messages from PHPMailer
    echo "<br>";
} catch (Exception $e) {
    echo "<br>";
    echo $e->getMessage(); //Boring error messages from anything else!
    echo "<br>";
}





