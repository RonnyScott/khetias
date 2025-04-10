<!DOCTYPE html>
<html>
<head>
    <title>Checkout</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <link rel="stylesheet" href="css/checkout.css">

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
    <h1>Checkout</h1>
    
    <?php
    session_start();
    
    // Check if the cart is empty
    if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
        echo "<p>Your cart is empty. Please add items to the cart before proceeding to checkout.</p>";
    } else {
        // Display the cart items and total
       // echo "<h2>Shopping Cart</h2>";
        echo '<table>';
        echo '<tr>';
        echo '<th>Product Name</th>';
        echo '<th>Price</th>';
        echo '<th> </th>';
        //echo '<th>Subtotal</th>';
        echo '</tr>';
        
        $total_cost = 0;
        foreach ($_SESSION['cart'] as $product_id => $item) {
            $subtotal = $item['amount']; //* $item['quantity'];
            $total_cost += $subtotal;
            echo '<tr>';
            echo '<td>' . $item['product_name'] . '</td>';
            echo '<td>Ksh. ' . number_format($item['amount'], 2) . '</td>';
            //echo '<td>' . $item['quantity'] . '</td>';
            //echo '<td>$' . number_format($subtotal, 2) . '</td>';
            echo '</tr>';
        }
        echo '<tr>';
        echo '<td colspan="3"><strong>Total:</strong></td>';
        echo '<td><strong>Ksh. ' . number_format($total_cost, 2) . '</strong></td>';
        echo '</tr>';
        echo '</table>';
        
        // Checkout form
        echo '<form method="post" action="complete_checkout.php">';
echo '<input type="hidden" name="total_cost" value="' . $total_cost . '">';
echo '<label for="name">Name:</label>';
echo '<input type="text" id="name" name="name" required><br>';
echo '<label for="address">Shipping Address:</label>';
echo '<input type="text" id="address" name="address" required><br>';
echo '<label for="payment">Payment Method:</label>';
echo '<select id="payment" name="payment" required>';
echo '<option value="Credit Card">Credit Card</option>';
echo '<option value="M-Pesa">M-Pesa</option>';
echo '</select><br>';
echo '<input type="submit" name="checkout" value="Complete Checkout"> ';
echo '</form>';

    }
    ?>
</body>
</html>
