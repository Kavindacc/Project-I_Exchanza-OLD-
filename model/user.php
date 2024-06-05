<?php

require 'dbconnection.php';

class User extends Dbh
{

    protected $name, $gender, $country, $pnum, $password, $email, $filepath, $token, $expire, $token_hash,$userid;

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

    public function insertdb($name, $email, $country, $gender, $filepath, $pnum, $password)
    { //data inser database

        $this->name = $name;
        $this->email = $email;
        $this->country = $country;
        $this->gender = $gender;
        $this->filepath = $filepath;
        $this->pnum = $pnum;
        $this->password = $password;

        $query = "INSERT INTO usern(name,email,country,gender,propic,phoneno,password) VALUES (?,?,?,?,?,?,?)";
        $stmt = $this->connect()->prepare($query);
        $stmt->execute([$this->name, $this->email, $this->country, $this->gender, $this->filepath, $this->pnum, $this->password]);
    }

    public function login($email) //email check login
    {

        $this->email = $email;

        $query = "SELECT * FROM usern WHERE email=?";
        $stmt = $this->connect()->prepare($query);
        $stmt->execute([$this->email]);

        if ($stmt->rowCount()) {
            while ($row = $stmt->fetch()) {
                return $row['password'];
            }
        } else {
            return false;
        }
    }

    public function checkemail($email) //email check fogetpassword
    {

        $this->email = $email;
        $query = "SELECT * FROM usern WHERE email=?";
        $stmt = $this->connect()->prepare($query);
        $stmt->execute([$this->email]);

        if ($stmt->rowCount()) {
            return true;
        } else {
            return false;
        }
    }

    public function update($token, $expire, $email) //token insert forgetpasword
    {

        $this->token = $token;
        $this->expire = $expire;
        $this->email = $email;

        $query = "UPDATE usern SET reset_token_hash=?, reset_token_expire=? WHERE email=?";
        $stmt = $this->connect()->prepare($query);
        $stmt->execute([$this->token, $this->expire, $this->email]);
    }

    public function token($token_hash) //password reset token check
    {
        $this->token_hash = $token_hash;

        $sql = "SELECT * FROM usern WHERE reset_token_hash=?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$this->token_hash]);
        if ($stmt->rowCount()) {
            while ($row = $stmt->fetch()) {
               return $row['reset_token_expire'];
               $row['userid'];
            }
        } else {
            return false; //token not found
        }
    }

    public function userid($token_hash) //password reset userid token check
    {
        $this->token_hash = $token_hash;

        $sql = "SELECT * FROM usern WHERE reset_token_hash=?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$this->token_hash]);
        if ($stmt->rowCount()) {
            while ($row = $stmt->fetch()) {
               return $row['userid'];
            }
        } 
    }

    public function updatepassword($passwordhash,$result){

        $this->password=$passwordhash;
        $this->userid=$result;

        $sql="UPDATE usern SET password=?,reset_token_hash=NULL,reset_token_expire=NULL WHERE userid=?";

        $stmt=$this->connect()->prepare($sql);
        $stmt->execute([ $this->password,$this->userid]);
    }
}
