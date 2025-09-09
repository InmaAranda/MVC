<?php
require_once __DIR__ . '/../config/config.php';
/**
 *Clase auxiliar que se encarga de qué controlador 
 *hay que invocar con cada url que se introduzca en el navegador
 */
class Router{  //va a ser una clase estática porque  no la invocamos
    //como no tenemos un estado se usan métodos y clases (uri->universal resources identifier = identificador de recursos)
    public static function enrutar($uri, $db){
        switch($uri) {
            //registro usuarios
            case '/index.php':
            case '/':
                require_once __DIR__ . '/../app/controllers/UserController.php';
                    
            case "/registro";
                require_once "app/controllers/UserController.php";
                $controller = new UserController($db); //instanciamos un objeto de la clase conectado a la bbdd
                $controller->mostrar_registro(); //usamos la función mostrar registro
                break;

            
                default: //Si no encuentra al usuario te da un error-> también puedes hacer otro layout para que este error aparezca en web personalizado
                http_response_code(404); 
                echo "<h2> 404 - Página no encontrada</h2>";
                break;
        }
    }

}


?>