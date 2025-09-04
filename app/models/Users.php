<?php
class Users{
    private $id; //id autonomérico
    private $userName;
    private $email;
    private $password;
    private $bd;  //copia de la conexión



    public function __construct($userName, $email, $password, $id=0, $bd) //$bd-> es la conexión que vamos a usar, al crear el objeto se pasa la conexión
        { //parámetro por omisión, para que la bbdd cargue el nº id que le corresponde
    
            $this->userName=$userName;
            $this->email=$email;
            if(self:: isValidaContrasena($password)){
                $this->password=$password;    
            }
            $this->bd->$bd; //como vas a necesitar la conexión se hace directamente en el constructor
        }


    /**
     * Get the value of id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     */
    public function setId($id): self
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of userName
     */
    public function getUserName()
    {
        return $this->userName;
    }

    /**
     * Set the value of userName
     */
    public function setUserName($userName): self
    {
        $this->userName = $userName;

        return $this;
    }

    /**
     * Get the value of email
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the value of email
     */
    public function setEmail($email): self
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get the value of password
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set the value of password
     */
    public function setPassword($password): self
    {
        $this->password = $password;

        return $this;
    }

    //Método para verificar la contraseña
    public static function isValidaContrasena ($password){ //se pone static para que se valide o salga
        $patron = '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[^a-zA-Z\d]).{8,}$/';
        return preg_match($patron, $password);
    }

    //HACEMOS CRUD pero normalmente se hace en otro archivo php (otra clase)
    //READ
    public function getUsuarioPorNU($userName){ //getUsuarioPorNombreD
    
        $stmt = $this->bd->prepare(
            "SELECT * FROM users where user_name=?"
        );
        
        //creamos un array con los usuarios guardados
        $stmt->execute([$userName]);
        
        //fetch(PDO::FETCH_ASSOC)- recoge en $user el array que es asociativo, porque al haber hecho la consulta hemos usado select *
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        //comprabamos que existe
        if($user){
            $this->id=$user['id'];
            $this->userName=$user['user_name'];
            $this->password=$user['password'];
            $this->email=$user['email'];
        }

    }

    public static function getListaUsuarios($bd){ //Estática, quieres del tirón devuelva la lista, no quieres un objeto, llamas a la conexión bd pasándolo por parámetro
        
        $stmt= $bd->query("SELECT * FROM users");
        return $stmt->fetchAll(PDO::FETCH_ASSOC); //fechAll ->DEVUELVE EL ARRAY PHP CON TODOS LOS OBJETOS DE LA CONSULTA
    }

    //Método de la clase que inserta o actualiza un usuario - se usa para create o replace --> cuando creas con el constructor el id está a 0 por lo que sabes que viene a crear,y el otro es cambiar
    public function guardar(){

        if($this->id==0){
            //queremos insertar
            $stmt = $this->bd->prepare("INSERT INTO users (user_name, email, password) VALUES (?,?,?");
            $resultado=$stmt->execute([$this->userName, $this->email,  
            //esto es super peligroso, no se guarda en plano una contraseña, hay que cifrarlas, haces un hash 
            password_hash($this->password, PASSWORD)]);

            //Recuperamos el id que le ha puesto la bbdd porque es auto increment
            if($resultado){

                $this->id=$this->bd->lastInsertId();
            }
    
        }else{

            //queremos actualizar
            $stmt =$this->bd->prepare("UPDATE users SET user_name=?, email=?, password=? WHERE id=?");
            $stmt=$stmt->execute([$this->userName, $this->email, $this->password, $this->id]);
        }
    }

}

?>