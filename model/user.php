<?php

require 'dbconnection.php';

class User extends Dbh
{

    protected $name, $gender, $country, $pnum, $password, $email,$filepath;

    public function emailexit($email)
    { //email exits function

        $this->email = $email;
        $query = "SELECT * FROM usern WHERE email=?";
        $stmt = $this->connect()->prepare($query);
        $stmt->execute([$this->email]);

        if ($stmt->rowCount()) {
            while ($row = $stmt->fetch()) {
                return $row['email'];
            }
        }
    }

    public function insertdb($name, $email, $country, $gender, $filepath,$pnum, $password)
    { //data inser database

        $this->name = $name;
        $this->email = $email;
        $this->country = $country;
        $this->gender = $gender;
        $this->filepath=$filepath;
        $this->pnum = $pnum;
        $this->password = $password;

        $query = "INSERT INTO usern(name,email,country,gender,propic,phoneno,password) VALUES (?,?,?,?,?,?,?)";
        $stmt = $this->connect()->prepare($query);
        $stmt->execute([$this->name, $this->email, $this->country, $this->gender, $this->filepath,$this->pnum, $this->password ]);
    }
}
