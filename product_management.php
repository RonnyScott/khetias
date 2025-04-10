<!DOCTYPE html>
<html>
<head>
    <title>Product Management</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">

</head>
<header>
        <h1>Khetias Online Store</h1>
        <nav>
            <ul>
                
                <li><a href="admin_page.php">Back to Dashboard</a></li>
            </ul>
        </nav>
    </header>
<body>
    <h1>Products Management</h1>
    
    <?php
    // Check if the user is logged in as an admin (simplified for demonstration purposes)
    $isAdmin = true; // In a real application, you would authenticate the admin.

    if ($isAdmin) {
        // Database connection setup (replace with your actual connection code)
        $servername = "localhost";
        $username = "root";
        $password = "";
        $database = "store";
        
        $conn = new mysqli($servername, $username, $password, $database);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Fetch user data from the 'users' table
        $sql = "SELECT * FROM items";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            echo '<table>';
            echo '<tr>';
            echo '<th>ID</th>';
            echo '<th>Product name</th>';
            echo '<th>Amount</th>';
            echo '<th>Action</th>';
            echo '</tr>';

            while ($row = $result->fetch_assoc()) {
                echo '<tr>';
                echo '<td>' . $row["id"] . '</td>';
                echo '<td>' . $row["product_name"] . '</td>';
                echo '<td>' . $row["amount"] . '</td>';
                echo '<td>';
                echo '<a href="edit_user.php?id=' . $row["id"] . '">Edit</a> | ';
                echo '<a href="delete_user.php?id=' . $row["id"] . '">Delete</a>';
                echo '</td>';
                echo '</tr>';
            }
            echo '</table>';
        } else {
            echo "No products found.";
        }
    } else {
        echo "Access denied. You are not authorized to view this page.";
    }
    ?>
</body>
</html>
