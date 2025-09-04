<?php
class Users{
    private $id; //id autonomérico
    private $userName;
    private $email;
    private $password;


    public function __construct($userName, $email, $password, $id=0)
        { //parámetro por omisión, para que la bbdd cargue el nº id que le corresponde
    
            $this->userName=$userName;
            $this->email=$email;
            if(self:: isValidaContrasena($password)){
                $this->password=$password;    
            }
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


}


?>