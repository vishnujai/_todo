<?php

include("../connection.php");
$db = new DataBase('app_todo');
$userId =  $_SESSION["authuser"]['id'];
// $sql = "SELECT * FROM   todo_users JOIN todo_list ON todo_users.id = todo_list.uid";



$sql = "SELECT * FROM todo_list WHERE user_id = $userId ORDER BY id DESC";

$showData = [];

$result = $db->conn->query($sql);
if($result->num_rows >0)
{
    while($row = $result->fetch_assoc()) {
        $showData[] = $row; 
    }

}


