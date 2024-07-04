<?php
// get_tops.php
include 'database.php';

// Get category and subcategory from URL parameters
$category = isset($_GET['category']) ? $_GET['category'] : 'women'; // Default to 'men' if not set
$subcategory = isset($_GET['subcategory']) ? $_GET['subcategory'] : 'tops'; // Default to 'tops' if not set

$sql = "SELECT imgSrc, title, size, price FROM items WHERE category='$category' AND subcategory='$subcategory'";
$result = $conn->query($sql);

$items = [];
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $items[] = $row;
    }
}
$conn->close();
?>