<?php
$url = 'http://iqrh.viasagt.com';
   
$porst['archivo'] = '00100001010000000085_02_Firmado.xml';
$xml = simplexml_load_file("uploads/xml/".$porst['archivo']); 
$json = json_encode($xml);
$xmlArr = json_decode($json, true);
$RECEPTOR = $xmlArr['Receptor'];
$correo=$RECEPTOR['CorreoElectronico'];

     $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, $url . "/creaPdf.php");
                curl_setopt($ch, CURLOPT_POST, TRUE);
                curl_setopt($ch, CURLOPT_POSTFIELDS, $porst);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                $remote_server_output = curl_exec($ch);
                curl_close($ch);
            //  $correo= $remote_server_output;
              echo $correo;
   //          $correo='abrantar@gmail.com';
   $post['CORREO'] = $correo;
$ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, $url . "/correo.php");
                curl_setopt($ch, CURLOPT_POST, TRUE);
                curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                $remote_server_output = curl_exec($ch);
                curl_close($ch);
                echo "<br>";
                echo $remote_server_output;
                echo "<br>";
   die();
   
   
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
                $correo =(string) $remote_server_output;
                if (trim($correo) == '') {
                    $correo = 'sistemas@eskolor.com';
                }
            //    $correo='abrantar@gmail.com';
                echo $archivo." --> ".$correo." enviado ";
//                $correo = 'abrantar@gmail.com';
//               //$correo='yluna@visioneninformatica.com';
//                $correo='jdepaz@visioneninformatica.com';
//                echo $correo."<br>";
                $post['CORREO'] = $correo;
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, $url . "/correo.php");
                curl_setopt($ch, CURLOPT_POST, TRUE);
                curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                $remote_server_output = curl_exec($ch);
                curl_close($ch);
                echo "<br>";
                echo $remote_server_output;
                echo "<br>";
                
                 $post['CORREO'] = '';
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, $url . "/correo.php");
                curl_setopt($ch, CURLOPT_POST, TRUE);
                curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                $remote_server_output = curl_exec($ch);
                curl_close($ch);
                echo "<br>";
                echo $remote_server_output;
                echo "<br>";
                
				
				

            }
        }
    }
}
die();
?>
