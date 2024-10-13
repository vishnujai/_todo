<?php

include("../connection.php");

$db = new DataBase();

$sql = "CREATE DATABASE app_todo";

if($db->conn->query($sql)===true)
{
 echo "<script>alert(`create database successful`)</script>";
}else
{
echo " database not created".$db->conn->error;
}
?>