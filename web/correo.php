<?Php

header('Content-Type: application/json; charset=utf-8');
//include 'libs/DataBase.php';
require_once('phpmailer/class.phpmailer.php');
include("phpmailer/class.smtp.php");
require 'phpmailer/PHPMailerAutoload.php';


$asunto = 'facturación Electrónica';
$correo = 'abraham.araujo@cybercompgt.net';
$clave = 'admin123';
$archivo = 'FacturaFace.pdf';
$texto = "Estimado Cliente: <br>
        Adjunto encontrará su factura electrónica. <br>
        Atentamente, <br>";
$nombre='Skolor';
$correo_cliente='abrantar@gmail.com';
//$archivo=$_POST["archivo"];
$correo_cliente= $_POST["CORREO"]; 
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
    $mail->Host = "smtp.gmail.com";      // sets GMAIL as the SMTP server
    $mail->Port = 465;   //465  set the SMTP port for the GMAIL server
    $mail->SMTPDebug = 0;                     // enables SMTP debug information (for testing)
    $mail->From = $correo;
    $mail->FromName = $nombre;
    $mail->Subject = utf8_decode($asunto);
    $mail->AddReplyTo($correo, $nombre);
    $mail->AltBody = utf8_decode($mensaje); // optional - MsgHTML will create an alternate automatically
    $mail->MsgHTML(utf8_decode($body));
    $mail->AddAddress($correo_cliente, '');
    $mail->SMTPAuth = true;                  // enable SMTP authentication
    $mail->Username = $correo;  // GMAIL username
    $mail->Password = $clave;            // GMAIL password
    if (trim($archivo) <> "") {
        $archivo = 'uploads/' . $archivo;
        $fecha = date('YmdHi');
        $mail->AddAttachment($archivo, 'FacturaFace' . $fecha);
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

