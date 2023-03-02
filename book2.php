<?php
session_start();
require 'conn.php';
global $conn;
$id = $_GET["id"];

  
if(isset($_SESSION['id'])){
    echo "mwgod";
} else echo "m4 mwgod";

    
    $query = " INSERT INTO `booking`(`user_id`, `apartments_id`) VALUES ('$_SESSION[id]','$id')";
    $runquery = mysqli_query($conn , $query);
    //$query = " UPDATE `booking` SET `in_date`='$in_date',`out_date`='$out_date' WHERE id = '$_SESSION[id]'";
    //$runquery = mysqli_query($conn , $query);
    if ($runquery) {
        header('Location: booking.php');}
//$query = " UPDATE booking SET apartments_id = '$ID' WHERE id = '$_SESSION[id]';";
//$runquery = mysqli_query($conn , $query);
    //if ($runquery) {
      //  echo"ya mosahl";
    //}else echo "lsa 4wia";
    
?>