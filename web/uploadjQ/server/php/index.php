<?php
$id = $_GET["id"];
$valores =$_GET['id'];
$valores= explode("|", $id);
$id=$valores[0];
$baseDatos=$valores[1];
$usuario=$valores[2];
$clave=$valores[3];
$servidor = 'localhost';

       
error_reporting(E_ALL | E_STRICT);
require('UploadHandler.php');
$ruta = 'C:/home/adcon/public_html/uploads/'.$id.'/';
$ruta = 'C:/xampp/htdocs/adcon/web/uploads/'.$id.'/';
$url ='http://adcon:8080/uploads/'.$id.'/';
//home/prodcrackchapin/public_html/uploads/
$ruta = '/home/controlgospelrev/public_html/web/uploads/'.$id.'/';
$url ='http://control.gospelrevolution.group/uploads/'.$id.'/';






$upload_handler = new UploadHandler("/".$id."/",$ruta,$url, $servidor, $usuario,$clave,$baseDatos);

