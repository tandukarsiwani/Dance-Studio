<?php
include '../db.php';
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $title = $_POST['title'];
    $image_url = $_POST['image_url'];
    $rating = $_POST['rating'];
    $price = $_POST['price'];
    $category = $_POST['category'];

    // SQL query to update the product
    $sql = "UPDATE products SET 
            title = '$title', 
            image_url = '$image_url', 
            rating = '$rating', 
            price = '$price', 
            category = '$category' 
            WHERE id = $id";

    if (mysqli_query($conn, $sql)) {
        echo "Product updated successfully!";
        header("Location: view_products.php");
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>