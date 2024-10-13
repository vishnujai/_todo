<?php

include("../connection.php");
session_unset();
$db = new DataBase('app_todo');

$email = $_POST["email"];
$password = $_POST["password"];

$sql = "SELECT * FROM todo_users WHERE email = '$email' ";

$result = $db->conn->query($sql);

if($result->num_rows >0)
{
    $row = $result->fetch_assoc();
    if(password_verify($password,$row['cpassword']))
    {
        $_SESSION['authuser']= $row;
        header("location: ../users/dashbord.php");
        exit();
    }else{
      
    $_SESSION['login_error']= "Plz Enter a valid Password ! .";
    header("location: login.php");
    }
}
else
{
    $_SESSION['login_error']= "No user found with that email.";
     header("location: login.php");
}
?>