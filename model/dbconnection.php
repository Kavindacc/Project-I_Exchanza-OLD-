<?php

Class Dbh{

    private $servername;
    private $username;
    private $password;
    private $dbname;

    protected function connect(){

        $this->servername="localhost";
        $this->username="Exchanze";
        $this->password="exchanze123@E";
        $this->dbname="exchanzedb";

        try {
            
            $dsn="mysql:host=".$this->servername.";dbname=".$this->dbname;
            $pdo=new PDO($dsn,$this->username,$this->password);
            $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);//pdo class eke static attributes
            return $pdo;
        } catch (PDOException $e) {
            echo "Connection failed".$e->getMessage();
        }

    }
}


?>