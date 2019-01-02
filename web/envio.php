<?php

//use PHPMailer\PHPMailer\PHPMailer;
//use PHPMailer\PHPMailer\Exception;

require_once('phpmailer/class.phpmailer.php');
include("phpmailer/class.smtp.php");
require 'phpmailer/PHPMailerAutoload.php';

$__Mail = new PHPMailer(true);
$mail = new PHPMailer(true);

$valida=count($_POST);

if ($valida){
  $__Respuesta=[
   // 'datos_recibidos'=> $_POST,
    'datos_respuesta'=>''
  ];
  
  //DATOS DE CUENTA PARA ENVIO
  if (isset($_POST['correo'])){
    $__CuentaEnviaUsuario=$_POST['correo'];
  }
  if (isset($_POST['clave'])) {
    $__CuentaEnviaClave = $_POST['clave'];
  }
  if (isset($_POST['servidor'])) {
    $__CuentaEnviaServidor = $_POST['servidor'];
  }
  if (isset($_POST['puerto'])) {
    $__CuentaEnviaPuerto = $_POST['puerto'];
  }
  
  // DATOS CONTENIDO DE CORREOS
  if (isset($_POST['empresa'])) {
    $__DatosCorreoNombre = $_POST['empresa'];
  }
  if (isset($_POST['correo_cliente'])) {
    $__DatosCorreoCliente = $_POST['correo_cliente'];
  }
  if (isset($_POST['correo_cc'])) {
    $__DatosCorreoCC = $_POST['correo_cc'];
  }
  if (isset($_POST['correo_bcc'])) {
    $__DatosCorreoBCC = $_POST['correo_bcc'];
  }
  if (isset($_POST['correo_reply'])) {
    $__DatosCorreoReply = $_POST['correo_reply'];
  }
  
  // CONTENIDO DE CORREO
  if (isset($_POST['asunto'])) {
    $__ContenidoCorreoAsunto = $_POST['asunto'];
  }
  if (isset($_POST['mensaje'])) {
    $__ContenidoCorreoMensaje = $_POST['mensaje'];
  }
  if (isset($_POST['archivo'])) {
    $__ContenidoCorreoArchivo = $_POST['archivo'];
  }
  
  $__ContenidoCorreoMensaje = str_replace('recupaClave', "http://grupoap.com.gt:8080/registro/recupaClave", $__ContenidoCorreoMensaje);
//  echo $__ContenidoCorreoMensaje;
//  die();
  
  try {
    //Ajustes de servidor
    $__Mail->SMTPDebug = 0;
    $__Mail->isSMTP();
    if (isset($__CuentaEnviaServidor)) {
      $__Mail->Host = $__CuentaEnviaServidor;
    }
    $__Mail->SMTPAuth = true;
    if (isset($__CuentaEnviaUsuario)) {
      $__Mail->Username = $__CuentaEnviaUsuario;
    }
    if (isset($__CuentaEnviaClave)) {
      $__Mail->Password = $__CuentaEnviaClave;
    }
    $__Mail->SMTPSecure = 'ssl';
    if (isset($__CuentaEnviaPuerto)){
      $__Mail->Port = $__CuentaEnviaPuerto;
    }
    //Ajustes de envio
    if (isset($__CuentaEnviaUsuario) && isset($__DatosCorreoNombre)) {
      $__Mail->setFrom($__Mail->Username, utf8_decode($__DatosCorreoNombre));
    }
    if (isset($__DatosCorreoCliente) && isset($__DatosCorreoNombre)) {
      $__Mail->addAddress($__DatosCorreoCliente, utf8_decode($__DatosCorreoNombre));
    }
    if (isset($__DatosCorreoReply) && isset($__DatosCorreoNombre)) {
      $__Mail->addReplyTo($__DatosCorreoReply, utf8_decode($__DatosCorreoNombre));
    }
    if (isset($__DatosCorreoCC)){
      $__Mail->addCC($__DatosCorreoCC);
    }
    if (isset($__DatosCorreoBCC)) {
      $__Mail->addBCC($__DatosCorreoBCC);
    }
    //Archivo Adjunto
//    if (isset($__ContenidoCorreoArchivo)) {
//      $__Mail->addAttachment($__ContenidoCorreoArchivo);
//    }
    
      if (trim($__ContenidoCorreoArchivo) <> "") {
        $archivo = 'uploads/' . $__ContenidoCorreoArchivo;
        $fecha = date('YmdHi');
        $__Mail->AddAttachment($archivo);
    }
    
    
    
    //Ajuste de contenido
    $__Mail->isHTML(true);
    if (isset($__ContenidoCorreoAsunto)) {
      $__Mail->Subject = utf8_decode($__ContenidoCorreoAsunto);
    }
    if (isset($__ContenidoCorreoMensaje)) {
      $__Mail->Body = utf8_decode($__ContenidoCorreoMensaje);
      $__Mail->AltBody = strip_tags($__ContenidoCorreoMensaje);
    }
    $__Mail->send();
  
    $__Respuesta['datos_respuesta']='Su mensaje ha sido enviado';
  } catch (Exception $e) {
    $__Respuesta['datos_respuesta']=$__Mail->ErrorInfo;
  }
} else {
  $__Respuesta=[
    'datos_recibidos'=> 'No se enviaron datos',
    'datos_respuesta'=>'No es posible procesar los datos'
  ];
}

echo json_encode($__Respuesta);