<?php
include("../connection.php");

$db = new DataBase('app_todo');

$sql = "CREATE TABLE todo_list (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    heading VARCHAR(255) NOT NULL,
    description TEXT,
    priority ENUM('low', 'medium', 'high') DEFAULT 'medium',
    due_date DATE,
    list_status INT DEFAULT 0,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";





if ($db->conn->query($sql) === TRUE) {
    echo "<script>alert('User Table  Created Succesfful Succesful')</script>";
} else {
    echo "Error creating database: " . $db->conn->error;
}
