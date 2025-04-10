<?php
include('./constants.php');

$password = mysqli_real_escape_string($db,$_POST['password']);
$email =mysqli_real_escape_string($db, $_POST['email']);

// save record to db
if (!preg_match(EMAILREGEX, $email) || strlen($email) > 255 || strlen($email) < 1) {
    $_SESSION['error'] = "email is invalid";
    header('location: '. SITEURL . 'admin_login.php');
    die();
}

if (strlen($_POST['password']) < 1 ) {
    $_SESSION['error'] = "password invalid";
    header('location: '. SITEURL . 'admin_login.php');
    die();
}

$query = "SELECT * FROM admin_table WHERE email = '$email' ";
$result = mysqli_query($db, $query);
$user = mysqli_fetch_assoc($result);

if (!password_verify($password, $user['password'])) {
    $_SESSION['error'] = "password invalid";
    header('location: ' . SITEURL . 'admin_login.php');
    die();
}

$_SESSION['auth'] = $user['email'];
header('location: ' . SITEURL . 'admin_page.php');
