<?php
require_once "Conectar.php";

class Usuarios extends Conectar {
    public function get_usuarios() {
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "SELECT * FROM users";
        $sql = $conectar->prepare($sql);
        $sql->execute();
        return $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
    }
    public function loginvulnerable($user_name, $password) {
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "SELECT * FROM users WHERE user_name = '".$user_name."' AND password = '' OR '1'='1'";
        $sql = $conectar->prepare($sql);
        $sql->execute();
        $resultado = $sql->fetch(PDO::FETCH_ASSOC);
       return $resultado;
    }
    public function listavulnerable($user_name, $password) {
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "SELECT * FROM users WHERE user_name = '".$user_name."' AND password = '". $password."'";
        $sql = $conectar->prepare($sql);
        $sql->execute();
        $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
       return $resultado;
    }
   
    public function login($user_name, $password) {
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "SELECT user_name,full_name,password,email,fh_record FROM users WHERE user_name = ? AND password = ?";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $user_name);
        $sql->bindValue(2, $password);
        $sql->execute();
        $resultado = $sql->fetch(PDO::FETCH_ASSOC);
        return $resultado;
    }
}
?>