<?php
session_start();
session_unset();
$_SESSION['login_error']= "Logout Succesfully !";
header("location: login.php");