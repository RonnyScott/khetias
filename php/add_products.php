<?php
include('./constants.php');
// Database connection settings
$servername = "localhost";
$username = "root";
$password = "";
$database = "store";

// Create a database connection
$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $product_name = $_POST["product_name"];
    $product_description = $_POST["product_description"];
    $amount = $_POST["amount"];

    // Handle image upload
    $targetDirectory = "uploads/"; // Specify the target directory where you want to store the product images

    if (!file_exists($targetDirectory)) {
        mkdir($targetDirectory, 0777, true); // Create the directory if it doesn't exist
    }

    $image_path = $targetDirectory . basename($_FILES["image"]["name"]);

    if (move_uploaded_file($_FILES["image"]["tmp_name"], $image_path)) {
        // Insert product information into the database
        $sql = "INSERT INTO items (product_name, product_description, amount, image_path) 
                VALUES ('$product_name', '$product_description', $amount, '$image_path')";

        if ($conn->query($sql) === TRUE) {
            $_SESSION['success'] = "Product Added Successfully. ";
            header('location: '. SITEURL . 'add_products.php');
            
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "Sorry, there was an error uploading the product image.";
    }
}

// Close the database connection
$conn->close();
?>
