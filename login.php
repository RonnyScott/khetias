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
            <p>KHETIAS</p>
        </div>             
    </nav>

<!----------------------------- Form box ----------------------------------->    
    <div class="form-box">
        
        <!------------------- login form -------------------------->

        <form method="POST" action="<?=SITEURL.'php/login.php'?>" class="login-container" id="login">
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
                <span>Don't have an account? <a href="signup.php" >Sign Up</a></span>
                <header>Login</header>
            </div>
            <div class="input-box">
                <input value="test@example.com" name='email' type="text" class="input-field" placeholder="Email">
                <i class="bx bx-envelope"></i>
            </div>
            <div class="input-box">
                <input value="password" name='password' type="password" class="input-field" placeholder="Password">
                <i class="bx bx-lock-alt"></i>
            </div>
            <div class="input-box">
                <input type="submit" class="submit" value="Sign In">
            </div>
            <div class="two-col">                
                <div class="two">
                    <label><a href="#">Forgot password?</a></label>
                </div>
            </div>
        </form>
       
    </div>
</div>   


</body>
</html>