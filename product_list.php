<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Khetias Online Store</title>
    <link rel="stylesheet" href="css/shoppingstyles.css"> 
</head>


<body>
   <header>
        <h1>Khetias Online Store</h1>
        <nav class='navigation'>
            <ul>
               
                <li><a href="index.php">Home</a></li>
                <li><a href="product_list.php">Shop</a></li>
                <li><a href="cart.php">Cart</a></li>
            </ul>
        </nav>
    </header>
    
    <div class="product">
        <?php
        // Database connection setup
        $servername = "localhost";
        $username = "root";
        $password = "";
        $database = "store";

        $conn = new mysqli($servername, $username, $password, $database);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Fetch products from the database
        $sql = "SELECT id, product_name, product_description, amount, image_path FROM items";
        $result = $conn->query($sql);

        // Display products
        while ($row = $result->fetch_assoc()) {
            echo '<div class="product">';
    echo '<img src="php/' . $row['image_path'] . '" alt="' . $row['product_name'] . '">';
    echo '<h2>' . $row['product_name'] . '</h2>';
    echo '<p>' . $row['product_description'] . '</p>';
    echo '<p>Price: Ksh.' . $row['amount'] . '</p>';
    echo '<form method="post" action="cart.php">';
    echo '<input type="hidden" name="product_id" value="' . $row['id'] . '">';
    echo '<input type="hidden" name="product_name" value="' . $row['product_name'] . '">';
    echo '<input type="hidden" name="amount" value="' . $row['amount'] . '">';
    echo '<input type="submit" name="add_to_cart" value="Add to Cart">';
    echo '</form>';
    echo '</div>';
        }
        ?>
    </div>
    <footer>
        <p>&copy; 2023 Khetias Online Store</p>
    </footer>
</body>
</html>
