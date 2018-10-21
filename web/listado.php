<?php

$url = 'http://iqrh:8080';
$carpetaArchivos = "uploads/xml/";
$carpeta = $carpetaArchivos . '/';
$linea = null;
$listaArchivo = null;
if (is_dir($carpeta)) {
    if ($dir = opendir($carpeta)) {
        $listaArchivo[] = '';
        while (($archivo = readdir($dir)) !== false) {
            if ($archivo != '.' && $archivo != '..' && $archivo != '.htaccess') {
                $porst['archivo'] = $archivo;
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, $url . "/creaPdf.php");
                curl_setopt($ch, CURLOPT_POST, TRUE);
                curl_setopt($ch, CURLOPT_POSTFIELDS, $porst);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                $remote_server_output = curl_exec($ch);
                curl_close($ch);
                $correo = $remote_server_output;
                if (trim($correo) <> '') {
                    $correo = 'sistemas@eskolor.com';
                }
                echo $correo." -- ";
                $correo = 'abrantar@gmail.com';
                $post['CORREO'] = $correo;
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, $url . "/correo.php");
                curl_setopt($ch, CURLOPT_POST, TRUE);
                curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                $remote_server_output = curl_exec($ch);
                curl_close($ch);
                echo $archivo;
                echo "<br>";
                echo $remote_server_output;
                echo "<br>";

            }
        }
    }
}
die();
?>