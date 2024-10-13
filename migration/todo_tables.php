<?php
include("../connection.php");

$db = new DataBase( 'app_todo');

$sql = "CREATE TABLE todo_table (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(30) NOT NULL,
    email VARCHAR(50),
    phone VARCHAR(50),
    cpassword VARCHAR(200),

    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);
";




if ($db->conn->query($sql) === TRUE) {
    echo "<script>alert('User Table  Created Succesfful Succesful')</script>";
} else {
    echo "Error creating database: " . $db->conn->error;
}
?>