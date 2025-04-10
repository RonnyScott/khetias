<!DOCTYPE html>
<html>
<head>
    <title>Cart Page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <link rel="stylesheet" href="css/carty.css">
</head>
<header>
        <h1>Khetias Online Store</h1>
        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="product_list.php">Shop</a></li>
                <li><a href="cart.php">Cart</a></li>
            </ul>
        </nav>
    </header>
<body>
    <h2>My Shopping Cart</h2>
    <div class="cart">
        <table>
            <tr>
                <th>Product Name</th>
                <th>Price</th>
                <th>Action</th>
            </tr>
            <?php
            session_start();

            if (isset($_POST['add_to_cart'])) {
                $product_id = $_POST['product_id'];
                $product_name = $_POST['product_name'];
                $amount = $_POST['amount'];

                // Check if the cart is not initialized and initialize it
                if (!isset($_SESSION['cart'])) {
                    $_SESSION['cart'] = array();
                }

                // Add the selected product to the cart
                $_SESSION['cart'][] = array('product_id' => $product_id, 'product_name' => $product_name, 'amount' => $amount);
            }

             // Check if the remove button is clicked
             if (isset($_POST['remove_from_cart'])) {
                $remove_product_id = $_POST['remove_product_id'];
                // Find the product to remove in the cart
                foreach ($_SESSION['cart'] as $key => $item) {
                    if ($item['product_id'] == $remove_product_id) {
                        // Remove the product from the cart
                        unset($_SESSION['cart'][$key]);
                        break;
                    }
                }
            }
            if (!empty($_SESSION['cart'])) {
                $total_cost = 0;
                foreach ($_SESSION['cart'] as $item) {
                    echo '<tr>';
                    echo '<td>' . $item['product_name'] . '</td>';
                    echo '<td>Ksh. ' . $item['amount'] . '</td>';
                    echo '<td>';
                    echo '<form method="post">';
                    echo '<input type="hidden" name="remove_product_id" value="' . $item['product_id'] . '">';
                    echo '<input type="submit" name="remove_from_cart" value="Remove">';
                    echo '</form>';
                    echo '</td>';
                    echo '</tr>';
                    $total_cost += $item['amount'];
                }
                echo '<tr>';
                echo '<td><strong>Total Cost:</strong></td>';
                echo '<td><strong>Ksh. ' . $total_cost . '</strong></td>';
                echo '<td>&mdash;</td>';
                echo '</tr>';
            } else {
                echo '<tr><td colspan="3">Your cart is empty.</td></tr>';
            }
            ?>
        </table>
        <form action="checkout.php" class="next">
            <button onclick="checkout.php">Checkout</button>
        </form>               
    </div>
</body>
</html>
