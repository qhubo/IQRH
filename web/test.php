<?php 

	$url = 'http://ads.rcn.com.gt/index.php/rest/publicidad';
			$postData["segmentacion"] = "SEG04";
			$postData["ubicacion"] = "UB03";
			$handler = curl_init();
			curl_setopt($handler, CURLOPT_RETURNTRANSFER, TRUE);
			curl_setopt($handler, CURLOPT_URL, $url);
			curl_setopt($handler, CURLOPT_POST, true);
			curl_setopt($handler, CURLOPT_POSTFIELDS, $postData);
			$resultado = curl_exec($handler);
			curl_close($handler);
			// echo "<pre>";
			// print_r($resultado);
			// echo "</pre>";
			$resultadoFinal = json_decode($resultado);
			// echo "<pre>";
			// echo print_r($resultadoFinal);
			// echo "</pre>";
                        
                        
			$listaApi = $resultadoFinal->lista;
//			echo "<pre>LISTA API:\n";
//			print_r($listaApi);
//			echo "</pre>";
                        $cont=0;

			foreach ($listaApi as $campana){
                            $cont++;
                            echo "campana ".$cont;
                            echo "<pre>";
				print_r( $campana );
                                     echo "</pre>";
			}
                        
                       