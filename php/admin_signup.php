<?php

include('./constants.php');

$password = mysqli_real_escape_string($db, password_hash($_POST['password'], PASSWORD_BCRYPT));
$email =mysqli_real_escape_string($db, $_POST['email']);
$name =mysqli_real_escape_string($db, $_POST['name']);

//validate email
if (!preg_match(EMAILREGEX, $email) || strlen($email) > 255 || strlen($email) < 3) {
    $_SESSION['error'] = ("email is invalid");
    header('location: '. SITEURL . 'admin_signup.php');

    die();
}

//validate name
if (!preg_match(NAMEREGEX, $name) || strlen($name) > 255 || strlen($name) < 1) {
    $_SESSION['error'] = ("name is invalid");
    header('location: '. SITEURL . 'admin_signup.php');

    die();
}

if (strlen($_POST['password']) < 1 ) {
    $_SESSION['error'] = "password invalid";
    header('location: '. SITEURL . 'admin_signup.php');
    die();
}
if (strlen($_POST["password"]) < 8){
    $_SESSION['error'] = "Password must be atleast 8 characters";
    header('location: '. SITEURL . 'admin_signup.php');
    die();
}



$query = "SELECT * FROM admin_table WHERE email = '$email'";
$result = mysqli_query($db, $query);
  
$count = mysqli_num_rows($result);

//ensure email is unique
if ($count > 0 ) {
 $_SESSION['error'] = ("email already taken");
    header('location: '. SITEURL . 'admin_signup.php');

 die();
}

$query = "INSERT INTO admin_table(name, email, password) VALUES('$name','$email','$password')";
$result = mysqli_query($db, $query);

$_SESSION['success'] = "$name Added Successfully. Log In to your new account ";
header('location: '. SITEURL . 'admin_signup.php');

