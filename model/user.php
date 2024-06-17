<?php

require 'dbconnection.php';
session_start();

class User extends Dbh
{

    private $name, $gender, $country, $pnum, $password, $email, $filepath, $token, $expire, $token_hash,$userid,$otp,$status;

    public function emailexit($email)
    { //email exits function

        $this->email = $email;
        $query = "SELECT * FROM usern WHERE email=?";
        $stmt = $this->connect()->prepare($query);
        $stmt->execute([$this->email]);

        if ($stmt->rowCount()>0) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
                return $row['email'];
            
        }
    }

    public function insertdb($name, $email, $country, $gender,$pnum,$otp, $password)
    { //data inser database

        $this->name = $name;
        $this->email = $email;
        $this->country = $country;
        $this->gender = $gender;
        $this->otp = $otp;
        $this->pnum = $pnum;
        $this->password = $password;

        $query = "INSERT INTO usern(name,email,country,gender,password,phoneno,otp) VALUES (?,?,?,?,?,?,?)";
        $stmt = $this->connect()->prepare($query);
        $stmt->execute([$this->name, $this->email, $this->country, $this->gender,$this->password,$this->pnum, $this->otp]);
    }

    public function statusUpdate($email,$status){

        $this->email=$email;
        $this->status=$status;
        $query = "UPDATE usern SET status=? WHERE email=? ";
        $stmt=$this->connect()->prepare($query);
        $stmt->execute([$this->status,$this->email]);

        
    }

    public function loginAdmin($email) //email check login
    {

        $this->email = $email;

        $query = "SELECT * FROM usern WHERE email=?";
        $stmt = $this->connect()->prepare($query);
        $stmt->execute([$this->email]);

        if ($stmt->rowCount()>0) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
                return $row['password'];
            
        } else {
            return false;
        }
    }

    public function status($email){

        $this->email=$email;

        $query="SELECT * FROM usern WHERE email=?";
        $stmt=$this->connect()->prepare($query);
        $stmt->execute([$this->email]);
        if ($stmt->rowCount()>0) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
                return $row['status'];
            
        }

    }

    public function loginUser($email) //email check login
    {

        $this->email = $email;

        $query = "SELECT * FROM usern WHERE email=?";
        $stmt = $this->connect()->prepare($query);
        $stmt->execute([$this->email]);

        if ($stmt->rowCount()>0) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
                $_SESSION['username']=$row['name'];
                return $row['password'];
            
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

        if ($stmt->rowCount()>0) {
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
        if ($stmt->rowCount()>0) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
               return $row['reset_token_expire'];
               $row['userid'];
            
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
        if ($stmt->rowCount()>0) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC); 
               return $row['userid'];
            
        } 
    }

    public function updatepassword($passwordhash,$result){

        $this->password=$passwordhash;
        $this->userid=$result;

        $sql="UPDATE usern SET password=?,reset_token_hash=NULL,reset_token_expire=NULL WHERE userid=?";

        $stmt=$this->connect()->prepare($sql);
        $stmt->execute([ $this->password,$this->userid]);
    }

    public function accounta($email){

        $this->email=$email;

        $query="SELECT otp FROM usern WHERE email=?";
        $stmt=$this->connect()->prepare($query);
        $stmt->execute([$this->email]);
        if($stmt->rowCount()>0){
            $row=$stmt->fetch(PDO::FETCH_ASSOC);
                return $row['otp'];
            
        }
       


    }

}
