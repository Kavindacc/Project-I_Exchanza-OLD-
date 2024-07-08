<?php

class Visitor
{
    private $name, $gender, $country, $pnum, $password, $email, $otp;

    public function __construct($name, $email, $country, $gender, $pnum, $otp, $password)
    {
        $this->name = $name;
        $this->gender = $gender;
        $this->country = $country;
        $this->pnum = $pnum;
        $this->password = $password;
        $this->email = $email;
        $this->otp = $otp;
    }

    public function signup($pdo)
    {
        try {
            $query = "INSERT INTO usern (name, email, country, gender, password, phoneno, otp) VALUES (?, ?, ?, ?, ?, ?, ?)";
            $stmt = $pdo->prepare($query);
            $stmt->bindParam(1, $this->name);
            $stmt->bindParam(2, $this->email);
            $stmt->bindParam(3, $this->country);
            $stmt->bindParam(4, $this->gender);
            $stmt->bindParam(5, $this->password);
            $stmt->bindParam(6, $this->pnum);
            $stmt->bindParam(7, $this->otp);
            $stmt->execute();
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function accountactive($email, $pdo)
    {
        try {
            $query = "SELECT otp FROM usern WHERE email=?";
            $stmt = $pdo->prepare($query);
            $stmt->bindParam(1, $email);
            $stmt->execute();
            if ($stmt->rowCount() > 0) {
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
                return $row['otp'];
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function statusUpdate($email, $status, $pdo)
    {
        try {
            $query = "UPDATE usern SET status=? WHERE email=?";
            $stmt = $pdo->prepare($query);
            $stmt->bindParam(1, $status);
            $stmt->bindParam(2, $email);
            $stmt->execute();
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function emailexit($email, $pdo)
    {
        try {
            $query = "SELECT email FROM usern WHERE email=?";
            $stmt = $pdo->prepare($query);
            $stmt->bindParam(1, $email);
            $stmt->execute();

            if ($stmt->rowCount() > 0) {
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
                return $row['email'];
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
}
