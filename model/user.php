<?php

/* 'dbconnection.php';
session_start();

class User
{

    private $name, $gender, $country, $pnum, $password, $email, $filepath, $token, $expire, $token_hash, $userid, $otp, $status;

  
    public function loginAdmin($email) //email check login
    {

        $this->email = $email;

        try {
            $query = "SELECT * FROM usern WHERE email=?";
            $stmt = $this->pdo->prepare($query);
            $stmt->execute([$this->email]);


            if ($stmt->rowCount() > 0) {
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
                return $row['password'];
            } else {
                return false;
            }
        } catch (PDOException $e) {

            echo "Error: " . $e->getMessage();
        }
    }

   

   

    public function checkemail($email) //email check fogetpassword
    {

        $this->email = $email;

        try {
            $query = "SELECT * FROM usern WHERE email=?";
            $stmt = $this->pdo->prepare($query);
            $stmt->execute([$this->email]);



            if ($stmt->rowCount() > 0) {

                return true;
            } else {
                return false;
            }
        } catch (PDOException $e) {

            echo "Error: " . $e->getMessage();
        }
    }

    public function update($token, $expire, $email) //token insert forgetpasword
    {

        $this->token = $token;
        $this->expire = $expire;
        $this->email = $email;

        try {
            $query = "UPDATE usern SET reset_token_hash=?, reset_token_expire=? WHERE email=?";
            $stmt = $this->pdo->prepare($query);
            $stmt->execute([$this->token, $this->expire, $this->email]);
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function token($token_hash) //password reset token check
    {
        $this->token_hash = $token_hash;

        try {
            $sql = "SELECT * FROM usern WHERE reset_token_hash=?";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([$this->token_hash]);

            if ($stmt->rowCount() > 0) {
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
                return $row['reset_token_expire'];
                $row['userid'];
            } else {
                return false; //token not found
            }
        } catch (PDOException $e) {

            echo "Error: " . $e->getMessage();
        }
    }

    public function userid($token_hash) //password reset userid token check
    {
        $this->token_hash = $token_hash;

        try {
            $sql = "SELECT * FROM usern WHERE reset_token_hash=?";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([$this->token_hash]);

            if ($stmt->rowCount() > 0) {
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
                return $row['userid'];
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function updatepassword($passwordhash, $result) //update password
    {

        $this->password = $passwordhash;
        $this->userid = $result;

        try {

            $sql = "UPDATE usern SET password=?,reset_token_hash=NULL,reset_token_expire=NULL WHERE userid=?";

            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([$this->password, $this->userid]);
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }


    public function getInformation($userid){

        $this->userid=$userid;
        
        try {

            $query = "SELECT * FROM usern WHERE userid=?";
            $stmt = $this->pdo->prepare($query);
            $stmt->execute([$this->userid]);
            if ($stmt->rowCount() > 0) {
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
                
                return $row;
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
    public function updateImg($filePath,$userid){

        $this->userid=$userid;
        $this->filepath=$filePath;

        
        try {

            $query = "UPDATE usern SET profilepic =? WHERE userid =?";
            $stmt = $this->pdo->prepare($query);
            $stmt->execute([$this->filepath,$this->userid]);
            if ($stmt->rowCount() > 0) {
                $_SESSION['profilepic']=$this->filepath;
                return true;
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

}
?>*/