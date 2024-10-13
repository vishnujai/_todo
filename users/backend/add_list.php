<?php
include("../../connection.php");
// $_SESSION['user']= [];

$db = new DataBase('app_todo');

$user_id = $_SESSION["authuser"]['id'];

$heaser = $_POST['heading'];
$description = $_POST['description'];
$priority = $_POST['priority'];
$due_date = $_POST['due_date'];

$sql ="INSERT INTO todo_list (user_id,heading,description,due_date,priority) VALUES('$user_id','$heaser','$description', '$due_date','$priority')";



if ($db->conn->query(query: $sql) === TRUE) {
    $_SESSION['user']['mes'] = "savedata  Successfull";
    header("location: ../dashbord.php");
    exit;
} else {
    $_SESSION['user'][] = $db->conn->error;
    header('location: ../dashbord.php');
    exit;
}
