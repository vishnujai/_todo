<?php
include("../connection.php");

$db = new DataBase( 'app_todo');

$sql = "RENAME TABLE todo_table TO todo_users";

if ($db->conn->query($sql) === TRUE) {
    echo "<script>alert('User Table  Created Succesfful Succesful')</script>";
} else {
    echo "Error creating database: " . $db->conn->error;
}

?>