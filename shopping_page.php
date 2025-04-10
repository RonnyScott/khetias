<?php
include('./php/constants.php');
//echo $_SESSION['auth'];
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Khetias Online Store</title>
    <link rel="stylesheet" href="shoppingstyles.css">
</head>
<body>
    <header>
        <h1>Khetias Online Store</h1>
        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="#">Shop</a></li>
                <li><a href="cart.php">Cart</a></li>
            </ul>
        </nav>
    </header>

    <?php
session_start();
$db = new mysqli("localhost", "root", "", "store");

if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}

// Fetch products from the database
$sql = "SELECT * FROM items";
$result = $db->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo '<div class="product">';
        echo '<img src="' . $row["image_path"] . '" alt="Product Image">';
        echo '<h2>' . $row['product_name'] . '</h2>';
        echo '<p>' . $row['product_description'] . '</p>';
        echo '<p>Ksh.' . $row['amount'] . '</p>';        
        echo '<form method="post" action="cart.php">';
        echo '<input type="hidden" name="id" value="' . $row['id'] . '">';
        echo '<input type="number" name="quantity" value="1" min="1" max="10">';
        echo '<input type="submit" name="add_to_cart" value="Add to Cart">';
        echo '</form>';
        echo '</div>';
    }
} else {
    echo 'No products available.';
}


?>


    <main>
        <section class="product">
            <img src="images/Watch.jpg" alt="Product 1">
            <h2>Rolex Watch</h2>
            <p>Rolex Luxury Chronograph</p>
            <p class="price">Ksh.7999</p>
            <button>Add to Cart</button>
        </section>

       

        <form action="shopping page2.php" class="next">
            <button onclick="shopping page2.php">Next Page</button>
        </form>   

        <!-- Repeat this structure for more products -->
    </main>

    <footer>
        <p>&copy; 2023 Khetias Online Store</p>
    </footer>
</body>
</html>
