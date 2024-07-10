<?php

session_start();
class User
{

    private $name, $gender, $country, $pnum;
    protected $email, $password;

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
            $stmt->bindParam(1, $this->userid, PDO::PARAM_INT);
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
            $stmt->bindParam(1, $this->filepath);
            $stmt->bindParam(2, $this->userid);
            $stmt->execute();
            if ($stmt->rowCount() > 0) {
                $_SESSION['profilepic'] = $this->filepath;
                return true;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function updateUserInfo($name, $phoneno, $pdo)
    {
        try {
            $query = "UPDATE usern SET name=?, phoneno=? WHERE userid =?";
            $stmt = $pdo->prepare($query);
            $stmt->bindParam(1, $name);
            $stmt->bindParam(2, $phoneno);
            $stmt->bindParam(3, $this->userid);
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

    public function verifyPassword($password, $pdo) //change password function
    {

        $query = "SELECT password FROM usern WHERE userid =?";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(1, $this->userid);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($result) {
            // Verify password hash
            return password_verify($password, $result['password']);
        }

        return false;
    }

    public function changepassword($hashedPassword, $pdo)
    { //password change function

        $query = "UPDATE usern SET password=? WHERE userid =?";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(1, $hashedPassword);
        $stmt->bindParam(2, $this->userid);
        $stmt->execute();

        if ($stmt->rowcount()>0) {
            
            return true;
        }

        return false;
    }


    public function browserProducts($pdo) //browser products function
    {

        try {
            $query = "SELECT * FROM products WHERE userid=?";
            $stmt = $pdo->prepare($query);
            $stmt->bindParam(1, $this->userid);
            $stmt->execute();
            if ($stmt->rowCount() > 0) {
                $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
                return $rows;
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function checkemail($email, $pdo) //email check fogetpassword
    {
        $this->email = $email;
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
            $stmt->bindParam(1, $this->token_hash);
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
            $stmt->bindParam(1, $this->token_hash);
            $stmt->execute();

            if ($stmt->rowCount() > 0) {
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
                return $row['userid'];
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function updatepassword($passwordhash, $result, $pdo) //update password
    {

        $this->password = $passwordhash;
        $this->userid = $result;

        try {

            $sql = "UPDATE usern SET password=?,reset_token_hash=NULL,reset_token_expire=NULL WHERE userid=?";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(1, $this->password);
            $stmt->bindParam(1, $this->userid);
            $stmt->execute();
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
}

class Seller extends RegisteredCustormer
{
    private $productname, $price, $colour, $description, $category, $subcategory, $condition, $userid, $size, $filePath;
    public function additemforthrifting($productname, $price, $colour, $description, $category, $subcategory, $size, $condition, $filePath, $userid, $pdo)
    {

        $this->productname = $productname;
        $this->price = $price;
        $this->colour = $colour;
        $this->description = $description;
        $this->category = $category;
        $this->subcategory = $subcategory;
        $this->size = $size;
        $this->condition = $condition;
        $this->filePath = $filePath;
        $this->userid = $userid;

        try {
            // Insert product into products table
            $query = "INSERT INTO products (product_name, price, colour, description, category, subcategory, size, `condition`, image, userid) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
            $stmt = $pdo->prepare($query);
            $stmt->bindParam(1, $this->productname);
            $stmt->bindParam(2, $this->price);
            $stmt->bindParam(3, $this->colour);
            $stmt->bindParam(4, $this->description);
            $stmt->bindParam(5, $this->category);
            $stmt->bindParam(6, $this->subcategory);
            $stmt->bindParam(7, $this->size);
            $stmt->bindParam(8, $this->condition);
            $stmt->bindParam(9, $this->filePath);
            $stmt->bindParam(10, $this->userid);
            $stmt->execute();

            if ($stmt->rowCount() > 0) {
                // Get the last inserted product ID
                $product_id = $pdo->lastInsertId();

                // Insert into thrift table
                $thrift_query = "INSERT INTO thrift (product_id, user_id) VALUES (?, ?)";
                $thrift_stmt = $pdo->prepare($thrift_query);
                $thrift_stmt->bindParam(1, $product_id);
                $thrift_stmt->bindParam(2, $this->userid);
                $thrift_stmt->execute();

                if ($thrift_stmt->rowCount() > 0) {
                    header("Location: ../view/thrift.php?success=Product Added.");
                    exit();
                }
            }
        } catch (PDOException $e) {

            echo "Error: " . $e->getMessage();
        }
    }
}
