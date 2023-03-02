<?php
session_start();
require 'conn.php';
global $conn;
$id = $_GET['id'];
$deleteQuery = "DELETE  FROM `approved_apartments` WHERE id = '$id' ;";
$runQuery = mysqli_query($conn, $deleteQuery);
header('location:admin.php');
