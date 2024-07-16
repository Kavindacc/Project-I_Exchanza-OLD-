<?php


class Item
{
    private $productname, $price, $colour, $description, $category, $subcategory, $condition, $userid, $size, $filePath;

    private $pdo;

    public function __construct($pdo = null) //conection database
    {
        $this->pdo = $pdo;
    }


    public function delete($productid)
    {
        try {
            $query = "DELETE FROM products WHERE product_id = ?";
            $stmt = $this->pdo->prepare($query);
            $stmt->bindParam(1, $productid);
            $stmt->execute();
            if ($stmt->rowCount() > 0) {
                return true;
            } else {
                return false; // Failed to delete product
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false; // Failed to delete product due to exception
        }
    }

    public function updateitem($product_id, $product_name, $price, $image) //update iteam details
    {
        $sql = "UPDATE products SET product_name=?, price=?,image=? WHERE product_id=?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(1, $product_name);
        $stmt->bindParam(2, $price);
        $stmt->bindParam(3, $image);
        $stmt->bindParam(4, $product_id);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            return true;
        } else {
            //failed
        }
    }



    public function getproductid($userid)
    {
        try {
            $query = "SELECT product_id FROM products WHERE userid = ?";
            $stmt = $this->pdo->prepare($query);
            $stmt->bindParam(1, $userid);
            $stmt->execute();

            $productIds = $stmt->fetchAll(PDO::FETCH_COLUMN);

            return $productIds;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
    public function loaditemdetails($pid){
        try {
            $query = "SELECT * FROM products WHERE product_id = ?";
            $stmt = $this->pdo->prepare($query);
            $stmt->bindParam(1, $pid);
            $stmt->execute();
            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            return $row;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }

    }
}

class Thrift extends Item
{

    public $thriftitems = [];

    public function getdetails($category, $subcategory, $pdo) //subcategory category product get
    {
        try {
            $query = "SELECT p.* FROM products p JOIN thrift t ON p.product_id = t.product_id WHERE p.category = ? AND p.subcategory = ?";
            $stmt = $pdo->prepare($query);
            $stmt->bindParam(1, $category);
            $stmt->bindParam(2, $subcategory);
            $stmt->execute();
            $thriftitems = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $thriftitems;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
}

class wishlist
{


    public function getwishlistid($userid, $pdo)
    {

        $sql = "SELECT productid FROM wishlist WHERE userid=?";
        try {
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(1, $userid);
            $stmt->execute();

            $productsids = $stmt->fetchAll(PDO::FETCH_COLUMN);
            return $productsids;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function wishlistitemdetails($userid, $pdo)
    {

        $sql = "SELECT * FROM products p JOIN wishlist w ON p.product_id = w.productid WHERE w.userid=?";
        try {
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(1, $userid);
            $stmt->execute();
            if ($stmt->rowcount() > 0) {
                $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
                return $rows;
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function wishlistremove($wishlistid, $pdo)
    {

        $sql = "DELETE FROM wishlist WHERE wishlistid=?";
        try {
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(1, $wishlistid);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
}
