<!DOCTYPE html>
<html lang="en">
<head>
    <title>Checkout Confirmation</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <link rel="stylesheet" href="css/complete_checkout.css">
</head>
<body>
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

    <div class="confirmation">
        <?php
        // Process the checkout form
        session_start();

if (isset($_POST['checkout'])) {
    $name = $_POST['name'];
    $address = $_POST['address'];
    $payment_method = $_POST['payment'];
    $total_cost = $_POST['total_cost']; // Retrieve the total cost from the form

            // Display confirmation details
            echo "<h2>Thank you for your purchase, $name!</h2>";
            echo "<p>Shipping Address: $address</p>";
            echo "<p>Total Amount Paid: Ksh. " . number_format($total_cost, 2) . "</p>";
            echo "<p>Payment Method: $payment_method</p>";
            echo "<p>Your order will be processed shortly.</p>";
            echo '<p><a href="product_list.php">Continue Shopping</a></p>';
            echo '<p><a href="#">Track My order</a></p>';
        } else {
            // Redirect to the checkout page if the form is not submitted
            header("Location: checkout.php");
            exit();
        }
        ?>
    </div>
</body>
</html>
