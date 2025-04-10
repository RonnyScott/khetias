<?php
session_start();

if (isset($_POST['add_to_cart']) && is_array($_POST['add_to_cart'])) {
    foreach ($_POST['add_to_cart'] as $product_id => $value) {
        $product_id = (int)$product_id;
        $quantity = (int)$_POST['quantity'][$product_id];

        // Check if the quantity is valid
        if ($quantity > 0) {
            // Add or update the product in the cart
            if (isset($_SESSION['cart'][$product_id])) {
                $_SESSION['cart'][$product_id] += $quantity;
            } else {
                $_SESSION['cart'][$product_id] = $quantity;
            }
        }
    }
}

// Redirect back to the product list page
header("Location: product_list.php");
?>
