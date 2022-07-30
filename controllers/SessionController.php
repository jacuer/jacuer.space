<?php

//A nivel de caracteristicas estos métodos deben cumplir los mismos criterios replicar exactamente lo mismo de StatusModel
//En el MVC StatusController no tiene que saber ABSOLUTAMENTE NADA de la base de datos

class SessionController{

    private $session;

    public function __construct(){
        $this->session = new UsersModel();
    }
    public function login($user,$pass){
        return $this->session->validate_user($user, $pass);
    }
    public function login_alumno($pass_token){
        return $this->session->validate_alumno($pass_token);
    }
    public function logout(){
        session_start();
        session_unset();
        session_destroy();
        header('Location: ./');
    }
    public function __destruct(){
        unset($this->model);
    }

}


?>