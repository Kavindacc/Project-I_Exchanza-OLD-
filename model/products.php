<?php


class Item
{
    /*private $productname, $price, $colour, $description, $category, $subcategory, $condition, $userid, $size, $filePath;



    public function insertProduct($productname, $price, $colour, $description, $category, $subcategory, $size, $condition, $filePath, $userid)
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
            $stmt = $this->pdo->prepare($query);
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
                $product_id = $this->pdo->lastInsertId();

                // Insert into thrift table
                $thrift_query = "INSERT INTO thrift (product_id, user_id) VALUES (?, ?)";
                $thrift_stmt = $this->pdo->prepare($thrift_query);
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


    public function get($userid)
    {

        $this->userid = $userid;

        try {
            $query = "SELECT * FROM products WHERE userid=?";
            $stmt = $this->pdo->prepare($query);
            $stmt->execute([$this->userid]);
            if ($stmt->rowCount() > 0) {
                $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
                return $rows;
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }*/
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function delete($productid)
    {
        try {
            $query = "DELETE FROM products WHERE product_id = ?";
            $stmt = $this->pdo->prepare($query);
            $stmt->bindParam(1,$productid);
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

   /* public function getitem($category, $subcategory) //subcategory category product get
    {
        try {
            $query = "SELECT p.* FROM products p JOIN thrift t ON p.product_id = t.product_id WHERE p.category = ? AND p.subcategory = ?";
            $stmt = $this->pdo->prepare($query);
            $stmt->execute([$category, $subcategory]);
            if ($stmt->rowCount() > 1) {
                // Fetch all rows
                $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
            } elseif ($stmt->rowCount() == 1) {
                // Fetch the single row
                $rows = $stmt->fetch(PDO::FETCH_ASSOC);
            } else {
                // No rows found
                $rows = [];
            }

            return $rows;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
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
    }*/
}
