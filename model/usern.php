<?php
session_start();
class User
{

    private $name, $gender, $country, $pnum, $password, $email;

    public function __construct($email)
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
    private $userid, $filepath;

    public function __construct($userid)
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

    public function browserProducts($pdo)//browser products
    {

        try {
            $query = "SELECT * FROM products WHERE userid=?";
            $stmt = $pdo->prepare($query);
            $stmt->execute([$this->userid]);
            if ($stmt->rowCount() > 0) {
                $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
                return $rows;
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
}
