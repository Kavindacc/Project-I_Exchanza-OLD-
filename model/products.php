<?php

require 'dbconnection.php';

class Products extends Dbh
{
    private $productname, $price, $color, $description, $category, $subcategory, $size, $condition, $userid;

    public function insertProduct($productname, $price, $color, $description, $category, $subcategory, $size, $condition, $userid)
    {
        $this->productname = $productname;
        $this->price = $price;
        $this->color = $color;
        $this->description = $description;
        $this->category = $category;
        $this->subcategory = $subcategory;
        $this->size = $size;
        $this->condition = $condition;
        $this->userid = $userid;

        try {
            $query = "INSERT INTO products(productname,price,color,description,category,subcategory,size,condition,userid) VALUES (?,?,?,?,?,?,?,?,?)";
            $stmt = $this->connect()->prepare($query);
            $stmt->execute([$this->productname, $this->price, $this->color, $this->description, $this->category, $this->subcategory, $this->size, $this->condition, $this->userid]);
            if ($stmt->rowCount() > 0) {
                echo "Product Add";
            }
        } 
        catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
}
