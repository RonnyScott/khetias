<!DOCTYPE html>
<html>
<head>
    <title>Add Product</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
    
</head>
<body>
    <h2>Khetias: Add a Product</h2>
    <form action="php/add_products.php" method="POST" enctype="multipart/form-data">    
        <label for="image">Product Image:</label>
        <input type="file" name="image" accept="image/*" required><br>   

        <label for="product_name">Product Name:</label>
        <input type="text" name="product_name" required><br>

        <label for="product_description">Product Description:</label>
        <textarea name="product_description" rows="4" cols="50"></textarea><br>

        <label for="amount">Amount:</label>
        <input type="number" name="amount" step="0.01" required><br>
        

        <input type="submit" value="Add Product">
                
    </form>
    <form action="admin_page.php" class="next">
            <button onclick="admin_page.php">Cancel</button>
        </form>   
</body>
</html>
