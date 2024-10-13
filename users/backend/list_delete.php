<?php
include("../../connection.php");
$db = new DataBase('app_todo');

// echo $_GET['id'];
$list_id = $_GET['id'];

$sql = "DELETE FROM todo_list where  id = $list_id";




if ($db->conn->query(query: $sql) === TRUE) {
    $_SESSION['list']['mes'] = "delete data  Successfull";
    header("location: ../dashbord.php");
    exit;
} else {
    $_SESSION['list'][] = $db->conn->error;
    header('location: ../dashbord.php');
    exit;
}

// if($result->num_rows > 0) {

// }




