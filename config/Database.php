<?php

class Database {
    private $host = '127.0.0.1';
    private $db_name = 'myblog';
    private $user_name = 'root';
    private $password = '';
    private $conn;

    public function connect() {
        $this->conn = null;

        try {
            $this->conn = new PDO(
                "mysql:host=" . $this->host . ";dbname=" . $this->db_name , 
                $this->user_name , 
                $this->password
            );
            $this->conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        }catch (PDOException $e){
            echo 'Erreur de connexion a la base de données :'.$e->getMessage();
        }

        return $this->conn;
    }

}