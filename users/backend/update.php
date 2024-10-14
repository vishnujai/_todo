<?php
session_start();

if (!empty($_POST['id'])) {
    include("../../connection.php");

    $db = new DataBase('app_todo');
    $id = intval($_POST['id']); 
    $heading = $db->conn->real_escape_string($_POST['heading']);
    $description = $db->conn->real_escape_string($_POST['description']);
    $priority = $db->conn->real_escape_string($_POST['priority']);
    $due_date = $db->conn->real_escape_string($_POST['due_date']);

    $sql = "UPDATE todo_list 
            SET heading = '$heading', 
                description = '$description', 
                due_date = '$due_date', 
                priority = '$priority' 
            WHERE id = $id";

    if ($db->conn->query($sql) === TRUE) {
        $_SESSION['user']['mes'] = "Data saved successfully";
        header("Location: ../dashbord.php"); 
        exit;
    } else {
        $_SESSION['user']['errors'][] = $db->conn->error; 
        header("Location: ../dashbord.php"); 
        exit;
    }
} else {
    $_SESSION['user']['errors'][] = "ID is required."; 
    header("Location: ../dashbord.php");
    exit;
}
?>
