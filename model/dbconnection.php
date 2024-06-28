<?php


Class Dbh{

    private $servername;
    private $username;
    private $password;
    private $dbname;

    public function connect(){

        $this->servername="localhost";
        $this->username="root";//username add karanna
        $this->password="";//password add karanna
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