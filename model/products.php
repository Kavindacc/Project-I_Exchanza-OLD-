<?php

require 'dbconnection.php';

class Products extends Dbh
{
    private $productname, $price, $colour, $description, $category, $subcategory, $condition, $userid,$size;

    public function insertProduct($productname, $price, $colour, $description, $category, $subcategory,$size, $condition, $userid)
    {
        $this->productname = $productname;
        $this->price = $price;
        $this->colour = $colour;
        $this->description = $description;
        $this->category = $category;
        $this->subcategory = $subcategory;
        $this->size=$size;
        $this->condition = $condition;
        $this->userid = $userid;

        try {
            $query = "INSERT INTO products(product_name, price, colour, description, category, subcategory, size,`condition`, user_id) VALUES (?, ?, ?, ?, ?, ?, ?, ?,?)";
            $stmt = $this->connect()->prepare($query);
            $stmt->execute([$this->productname, $this->price, $this->colour, $this->description, $this->category, $this->subcategory, $this->size,$this->condition, $this->userid]);
            if ($stmt->rowCount() > 0) {
                echo "Product Added";
            }
        } 
        catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
}
