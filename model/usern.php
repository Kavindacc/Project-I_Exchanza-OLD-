<?php
session_start();
class User
{

    private $name, $gender, $country, $pnum;
    protected $email,$password;

    public function __construct($email = null)
    {
        $this->email = $email;
    }


    public function status($pdo)
    {

        try {

            $query = "SELECT * FROM usern WHERE email=?";
            $stmt = $pdo->prepare($query);
            $stmt->bindParam(1, $this->email);
            $stmt->execute();
            if ($stmt->rowCount() > 0) {
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
                return $row['status'];
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function login($pdo)
    {
        try {
            $query = "SELECT * FROM usern WHERE email=?";
            $stmt = $pdo->prepare($query);
            $stmt->execute([$this->email]);


            if ($stmt->rowCount() > 0) {
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
                $_SESSION['username'] = $row['name'];
                $_SESSION['userid'] = $row['userid'];
                $_SESSION['password'] = $row['password'];
                $_SESSION['profilepic'] = $row['profilepic'];
            } else {
                return false;
            }
        } catch (PDOException $e) {

            echo "Error: " . $e->getMessage();
        }
    }
}

class RegisteredCustormer extends User
{
    private $userid, $filepath, $token, $expire, $token_hash;



    public function __construct($userid = null)
    {
        $this->userid = $userid;
    }

    public function manageAccount($pdo)
    {

        try {

            $query = "SELECT * FROM usern WHERE userid=?";
            $stmt = $pdo->prepare($query);
            $stmt->bindParam(1, $this->userid);
            $stmt->execute();
            if ($stmt->rowCount() > 0) {
                $row = $stmt->fetch(PDO::FETCH_ASSOC);

                return $row;
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }


    public function updateImg($filePath, $pdo)
    {

        $this->filepath = $filePath;

        try {

            $query = "UPDATE usern SET profilepic =? WHERE userid =?";
            $stmt = $pdo->prepare($query);
            $stmt->execute([$this->filepath, $this->userid]);
            if ($stmt->rowCount() > 0) {
                $_SESSION['profilepic'] = $this->filepath;
                return true;
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function browserProducts($pdo) //browser products
    {

        try {
            $query = "SELECT * FROM products WHERE userid=?";
            $stmt = $pdo->prepare($query);
            $stmt->bindParam(1,$this->userid);
            $stmt->execute();
            if ($stmt->rowCount() > 0) {
                $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
                return $rows;
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function checkemail($email,$pdo) //email check fogetpassword
    {
        $this->email=$email;
        try {
            $query = "SELECT * FROM usern WHERE email=?";
            $stmt = $pdo->prepare($query);
            $stmt->bindParam(1, $this->email);
            $stmt->execute();
            if ($stmt->rowCount() > 0) {
                return true;
            } else {
                return false;
            }
        } catch (PDOException $e) {

            echo "Error: " . $e->getMessage();
        }
    }

    public function update($token, $expire, $pdo) //token insert forgetpasword
    {

        $this->token = $token;
        $this->expire = $expire;

        try {
            $query = "UPDATE usern SET reset_token_hash=?, reset_token_expire=? WHERE email=?";
            $stmt = $pdo->prepare($query);
            $stmt->execute([$this->token, $this->expire, $this->email]);
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function token($token_hash, $pdo) //password reset token check
    {
        $this->token_hash = $token_hash;

        try {
            $sql = "SELECT * FROM usern WHERE reset_token_hash=?";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(1,$this->token_hash);
            $stmt->execute();

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

    public function userid($pdo) //password reset userid token check
    {
    
        try {
            $sql = "SELECT * FROM usern WHERE reset_token_hash=?";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(1,$this->token_hash);
            $stmt->execute();

            if ($stmt->rowCount() > 0) {
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
                return $row['userid'];
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function updatepassword($passwordhash, $result,$pdo) //update password
    {

        $this->password = $passwordhash;
        $this->userid = $result;

        try {

            $sql = "UPDATE usern SET password=?,reset_token_hash=NULL,reset_token_expire=NULL WHERE userid=?";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(1,$this->password);
            $stmt->bindParam(1,$this->userid);
            $stmt->execute();
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
}
