<?php
//creamos una clase para la conexión de la bbdd que es PBO

define('HOST', 'localhost'); 
define('PORT', '3306'); // Por defecto el puerto es 3306, si tienes varias bbdd mirar en el xampp el puerto que tiene conectado
define('DBNAME','tienda_web');
define('USER','root'); // root--> peligro, le estás dando acceso a todos a los derechos del root
define('PASSWORD', '');


class Database{  //usamos el MODELOSINGLETON -> SI EL OBJETO EXISTE NO SE VUELVE A INSTANCIAR, ES DECIR LA MISMA VARIABLE SE USA PARA TODAS LAS CONEXIONES = CONEXIÓN ESTÁTICA
    
    private static $instanciaDB = null; //definimos el objeto como null que no tiene nada, etático porque quiero que sea la copia, lo pones a null y llamando al constructor, se crea la conexión  a $bd
    private $db; 

    private function __construct(){

        $this->db= new PDO(   // importante!!! --- PDO ->Está configurado en apache, y pdo viene incorporado por defecto, a partir de php 5 tiene soporte con pdo, se le pasan varios argumentos
            'mysql:'.HOST.':'.PORT.';dbname='.DBNAME,   USER, PASSWORD  //la sintáxis es la siguiente-> mysql:localhost:3306; dbname=NOMBREDB
        ); 

    }

    public static function getInstancia(){ //esto devuelve la conexión activa --> se usa la variable estática 
        if(self::$instanciaDB=== null)
            {
            self::$instanciaDB = new Database(); //esto es el patrón, porque llama y falla y luego devuelve la conexión 
            }
            return self::$instanciaDB->db;
    }

    //ahora al ser una variable pdo se destruye la variable automáticamente
}

?>