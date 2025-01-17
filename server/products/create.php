<?php
include '../db.php';

// Check if form is submitted
if (isset($_POST['submit'])) {
    $title = $_POST['title'];
    $image_url = $_POST['image_url'];
    $rating = $_POST['rating'];
    $price = $_POST['price'];
    $category = $_POST['category'];

    // SQL query to insert the product
    $sql = "INSERT INTO products (title, image_url, rating, price, category) 
            VALUES ('$title', '$image_url', '$rating', '$price', '$category')";

    if (mysqli_query($conn, $sql)) {
        echo "Product added successfully!";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>
