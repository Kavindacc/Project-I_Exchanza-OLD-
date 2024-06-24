<?php

require 'dbconnection.php';

class Products extends Dbh
{
    private $productname, $price, $colour, $description, $category, $subcategory, $condition, $userid, $size, $filePath;

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
            $query = "INSERT INTO products(product_name, price, colour, description, category, subcategory, size, `condition`, image, userid) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
            $stmt = $this->connect()->prepare($query);
            $stmt->execute([$this->productname, $this->price, $this->colour, $this->description, $this->category, $this->subcategory, $this->size, $this->condition, $this->filePath, $this->userid]);
            if ($stmt->rowCount() > 0) {
                header("Location: ../view/thrift.php?success=Product Added.");//thrift page
                exit();
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
}
