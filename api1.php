<!-- 
https://algo.mx/2020/04/11/consumiendo-una-api-con-php/

https://home.openweathermap.org/

Alternativa:
https://www.weatherapi.com/docs/

http://api.weatherapi.com/v1/current.json?key=603a48bc731f420b91015239220208&q=Posadas


https://stackoverflow.com/questions/28858351/php-ssl-certificate-error-unable-to-get-local-issuer-certificate
-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php

$url= "https://api.openweathermap.org/data/2.5/weather?lat=-27&lon=-55&appid=d833fb14f2cafa4f946b8439d17a122d";
$url2 = "http://api.weatherapi.com/v1/current.json?key=603a48bc731f420b91015239220208&q=Posadas";

$curl = curl_init(); //inicia la sesión cURL

curl_setopt_array($curl, array(
	//CURLOPT_URL => "https://api.openweathermap.org/data/2.5/weather?lat=-27&lon=-55&appid=d833fb14f2cafa4f946b8439d17a122d", //url a la que se conecta
    CURLOPT_URL => $url2,
	CURLOPT_RETURNTRANSFER => true, //devuelve el resultado como una cadena del tipo curl_exec
	CURLOPT_FOLLOWLOCATION => true, //sigue el encabezado que le envíe el servidor
	CURLOPT_ENCODING => "", // permite decodificar la respuesta y puede ser"identity", "deflate", y "gzip", si está vacío recibe todos los disponibles.
	CURLOPT_MAXREDIRS => 10, // Si usamos CURLOPT_FOLLOWLOCATION le dice el máximo de encabezados a seguir
	CURLOPT_TIMEOUT => 30, // Tiempo máximo para ejecutar
	CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1, // usa la versión declarada
	CURLOPT_CUSTOMREQUEST => "GET", // el tipo de petición, puede ser PUT, POST, GET o Delete dependiendo del servicio
	
)); //curl_setopt_array configura las opciones para una transferencia cURL

$response = curl_exec($curl);// respuesta generada
$err = curl_error($curl); // muestra errores en caso de existir

curl_close($curl); // termina la sesión 

if ($err) {
	echo "cURL Error #:" . $err; // mostramos el error
} else {
	echo $response; // en caso de funcionar correctamente
   /*  $objeto = json_decode($response);
    $grados= intval($objeto->main->temp);
    $grados_celsius=($grados-32)/1.8; */
    //$grados=($grados-32)*5/9;
   /*  echo "Grados: ".$grados_celsius;
    echo '<br>';
    echo $objeto->name;
     echo '<br>';
    echo $objeto->sys->country; */
}

?>
</body>
</html>