<?php
    class Conectar {
        protected $dbh;
            protected function Conexion(){
             $host = 'localhost';
             $user = 'root';
             $password = '123456';
             $database = 'grupo_jueves';
            try {
                // Conexión a la base de datos
                $conectar = $this->dbh = new PDO("mysql:local=".$host.";dbname=".$database."",$user,$password);
                return $conectar;
            } catch (Exception $e) {
                print "¡Error DB!: " . $e->getMessage() . "<br/>";
                die();
            }
        }
    
        public function set_names() {
            return $this->dbh->query("SET NAMES 'utf8'");
        }
    }
    ?>