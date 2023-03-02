<?php
session_start();
require 'conn.php';
global $conn;
$id = $_GET['id'];
    $query = "SELECT * FROM pending_feedback WHERE id = '$id';";
    $runquery = mysqli_query($conn , $query); 
        if ($runquery) {
        echo " 48aaal";
     }else echo "l2aaa";
    $fetch = mysqli_fetch_array($runquery);
    $insertquery = "INSERT INTO `approved_feedback`( `user_id`, `user_name`, `feedback`) VALUES ('$fetch[user_id]','$fetch[user_name]','$fetch[feedback]')";
    $runquery2 = mysqli_query($conn, $insertquery);
    $deleteQuery = "DELETE  FROM `pending_feedback` WHERE id = '$id' ;";
    $runQuery3 = mysqli_query($conn, $deleteQuery);
    header('location:admin.php');
    ?>