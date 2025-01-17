<?php
include '../db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // SQL query to delete the product by ID
    $sql = "DELETE FROM products WHERE id = $id";

    if (mysqli_query($conn, $sql)) {
        echo "Product deleted successfully!";
        header("Location: view_products.php");
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>
