<?php
/*Inicia las sesiones HTTP para poder guardar las variables en la sesión y 
mantener estado entre unas páginas y otras*/
session_start();

//Cargamos los ficheros PHP necsarios
require_once 'config/Database.php';
require_once 'config/Router.php';


//recuperamos la bbdd-> como es estática es con el método get 
$db =Database::getInstancia();

//obtenemos la uri de la petición HTTP -> la url
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH); 
//URL PATH-> Saca solo la parte correspondiente a php para que deje /registro

//Falta enrutar
Router::enrutar($uri, $db);

?>
