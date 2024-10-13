<?php

include("../connection.php");
session_unset();
$db = new DataBase('app_todo');
// session_unset();
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$password = $_POST['password'];
$cpassword = $_POST['cpassword'];


$sql = "SELECT * FROM todo_users WHERE email = '$email' ";
$result = $db->conn->query($sql);

if ($result->num_rows > 0) {
    $_SESSION['error'][] = 'Email Is Already Exits Here Try Anoter One !';
    header("location: Registration.php");
    exit;
}
if ($password !== $cpassword  || empty(($name) || empty($email) || empty($phone)
    || strlen($phone) < 10)) {
    if ($password !== $cpassword) {
        $_SESSION['error'][] = 'password did not match in Conform Password';
    }
    if (empty($name)) {
        $_SESSION['error'][] = 'Enter name';
    }
    if (empty($email) || !preg_match('/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/', $email)) {
        $_SESSION['errom'][] = 'Pleise enter valied email';
    }
    if (empty($phone)  || strlen($phone) < 10) {
        $_SESSION['error'][] = 'Plese valied phone number';
    }

    header("location: Registration.php");
    exit;
}
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

$sql = "INSERT INTO todo_users (username,email,phone,cpassword) 
VALUES ('$name','$email','$phone','$hashed_password')";


// echo "$sql";

if ($db->conn->query(query: $sql) === TRUE) {
    $_SESSION['reg']['mes'] = "Registation Successfull";
    header("location: Registration.php");
    exit;
} else {
    $_SESSION['error'][] = $db->conn->error;
    header('location: Registration.php');
    exit;
}
