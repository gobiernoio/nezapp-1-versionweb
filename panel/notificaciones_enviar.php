<?php include("encabezado.php"); ?>
	
	<?php if(isset($_SESSION['usuario'])) { ?>
    <!--  ********************************************* ESTA INFORMACIÖN CAMBIA  ********************************************* -->

<?php    

//$mensaje = $_POST['mensaje'];
//$destino = $_POST['destino'];


?>

<?php

$APPLICATION_ID = "A9xhApLQnP8OJGQNPAIkUKNBktKyp0mQyNmBA402";
$REST_API_KEY = "vfgdB5Dce145yh3x7hqbyU5mfia04CTg4V28lRYu";
$MESSAGE = $_POST['mensaje'];

 
        $url = 'https://api.parse.com/1/push';
        $data = array(

        	'where' => array(
        			'channels' => 'noticias'
        		),

            'data' => array(
                'alert' => $MESSAGE,
            ),
        );
        $_data = json_encode($data);
        $headers = array(
            'X-Parse-Application-Id: ' . $APPLICATION_ID,
            'X-Parse-REST-API-Key: ' . $REST_API_KEY,
            'Content-Type: application/json',
            'Content-Length: ' . strlen($_data),
        );

        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_POST, 1);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $_data);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        $response = curl_exec($curl);



?>

	<!--  ********************************************* ESTA INFORMACIÖN CAMBIA  ********************************************* -->	
    <?php } else { include("login.php"); } ?>
    
<?php include_once("pie.php"); ?>