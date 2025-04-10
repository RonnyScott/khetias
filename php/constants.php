<?php

session_start();

$db = mysqli_connect("localhost", "root", "" , "store");

define('SITEURL', 'http://localhost/khetias/' );
define('EMAILREGEX', "/^[a-zA-Z0-9+.-]+@[a-zA-Z0-9.-]+$/" );
define('NAMEREGEX', "/^[a-zA-Z0-9 ]+$/" );
?>