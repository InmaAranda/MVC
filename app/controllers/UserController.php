<?php

    // El controlador se crea por clase-> a veces es necesario crear dos, uno para login y otro para las restantes funciones
    //incluimos el fichero de la clase
    require_once "app/models/Users.php";

    //Creamos la clase
    class UserController { //el controlador es el nexo de unión entre la vista y los modelos -> será el encargado de invocar al modelo para recuperar los datos de la bbd y enviarlos a la vista para que se encargue de su visualización
        
        private $db;

        //creamos un constructor
        public function __construct($db){
            $this->db=$db;
        }

        //hacemos formulario de registro ->//esta función debe ser pública para poder llamarla desde cualquier clase
        //FUNCIÓN DE CONTROLADOR QUE MUESTRA EL REGISTRO DE USUARIO
        public function mostrar_registro(){

            $vista= 'app/views/users/registro.php'; //se crean estos archivos con esta estructura que ayuda a tener una carpeta con vista del registro y otra con la interfaz
            require 'app/views/layout.php'; //se pone aqui el require para que cargue justo en la función, no se pone antes
        }
    }


?>