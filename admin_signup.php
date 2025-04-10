<?php
include('./php/constants.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="boxicons/css/boxicons.min.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="css/style.css">
    <title>Khetias Online Retail</title>
</head>

<body>
    <div class="wrapper">
        <nav class="nav">
            <div class="nav-logo">
                <p>KHETIAS Admin</p>
            </div>            
        </nav>

        <!----------------------------- Form box ----------------------------------->
        <div class="form-box">

            <!------------------- login form -------------------------->

            
          <form action="<?=SITEURL.'php/admin_signup.php'?>" method="POST"class="login-container" id="login" >
     
          <div class="alerts">
            <span>
            <?php
            if (isset($_SESSION['error'])) {
                echo $_SESSION['error'];
                unset($_SESSION['error']);
            }
            ?>
            </span>
            <span>
                <?php
            if (isset($_SESSION['success'])) {
                echo $_SESSION['success'];
                unset($_SESSION['success']);
            }
            ?>
            </span>
          </div>
                <div class="top">
                    <span>Already have an account? <a href="admin_login.php">Login</a></span>
                    <header>Sign Up</header>
                </div>
                <div class="input-box">
                    <input name="name" type="text" class="input-field" placeholder="Name">
                    <i class="bx bx-user"></i>
                </div>
                <div class="input-box">
                    <input name="email" type="text" class="input-field" placeholder="Email">
                    <i class="bx bx-envelope"></i>
                </div>
                <div class="input-box">
                    <input name="password" type="password" class="input-field" placeholder="Password">
                    <i class="bx bx-lock-alt"></i>
                </div>
                <div class="input-box">
                    <input name="password_confirmation" type="password" class="input-field" placeholder="Confirm Password">
                    <i class="bx bx-lock-alt"></i>
                </div>
                
                <div class="input-box">
                    <input type="submit" class="submit" value="Sign Up">
                </div>
          </form>

        </div>
    </div>

</body>

</html>