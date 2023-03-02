<?php
session_start();
require 'conn.php';
global $conn;
$id = $_GET['id'];
    $query = "SELECT * FROM apartments WHERE id = '$id';";
    $runquery = mysqli_query($conn , $query); 
    $fetch = mysqli_fetch_array($runquery);
    $insertquery = "INSERT INTO `approved_apartments`(`host_id`, `room_no`, `size`, `price`, `address`, `district`, `id_img`, `contract_img`,`room_img`, `description`) VALUES ('$fetch[host_id]','$fetch[room_no]','$fetch[size]','$fetch[price]','$fetch[address]','$fetch[District]','$fetch[id_img]','$fetch[contract_img]','$fetch[room_img]' ,'$fetch[description]')";
    $runquery2 = mysqli_query($conn, $insertquery);
    $deleteQuery = "DELETE  FROM `apartments` WHERE id = '$id' ;";
    $runQuery3 = mysqli_query($conn, $deleteQuery);
    header('location:admin.php');
    ?>