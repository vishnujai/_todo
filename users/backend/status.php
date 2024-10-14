<?php
include("../../connection.php");
$db = new DataBase('app_todo');
$id = $_GET['id'];

if(!empty($id))
{
   

    $sql = "UPDATE todo_list 
            SET list_status = 1
            WHERE id = $id";

    if ($db->conn->query($sql) === TRUE) {
        $_SESSION['user']['mes'] = "successfully";
        header("Location: ../dashbord.php"); 
        exit;
    } else {
        $_SESSION['user']['errors'][] = $db->conn->error; 
        header("Location: ../dashbord.php"); 
        exit;
    }
}
else {
    $_SESSION['user']['errors'][] = "ID is required."; 
    header("Location: ../dashbord.php");
    exit;
}