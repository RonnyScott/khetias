<!DOCTYPE html>
<html>
<head>
  <title>Admin Page</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f4f4f4;
      margin: 0;
      padding: 0;
    }

    header {
      background-color: #333;
      color: #fff;
      padding: 20px;
      text-align: center;
    }

    h1 {
      margin: 0;
    }

    nav {
      background-color: #444;
      padding: 10px;
    }

    nav a {
      color: #fff;
      text-decoration: none;
      margin: 10px;
    }

    .container {
      max-width: 800px;
      margin: 20px auto;
      background-color: #fff;
      padding: 20px;
      border-radius: 5px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
  </style>
</head>
<body>
  <header>
    <h1>Admin Page</h1>
  </header>
  <nav>
    <a href="add_products.php">Add Products</a>
    <a href="product_management.php">Manage Products</a>
    <a href="user_management.php">Manage Users</a>
  </nav>
  <div class="container">
    <h2>Welcome, Admin!</h2>
    <p>Choose one of the following options:</p>
    <ul> <td>
      <li><a href="add_products.php">Add Products</a></li><br><br>
      <li><a href="product_management.php">Manage Products</a></li><br><br>
      <li><a href="user_management.php">Manage Users</a></li>
      </td>
    </ul>
  </div>
  
</body>
</html>
