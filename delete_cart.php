<?php
session_start();
require 'conn.php';
global $conn;
$id = $_GET['id'];
$deleteQuery = "DELETE  FROM cart WHERE id = '$id' ;";
$runQuery = mysqli_query($conn, $deleteQuery);
if($runQuery)
{
    header('Location: cartAll.php ');
}
