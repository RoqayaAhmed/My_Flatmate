<?php
session_start();
require 'conn.php';
global $conn;

if(isset($_SESSION['id'])) {

//$id = $_GET["id"];

//$query = "SELECT * FROM approved_apartments WHERE id = '$id';";
//$runquery = mysqli_query($conn , $query);
//$row = $runquery->fetch_assoc();
//$id = $row["id"];
?>
<!DOCTYPE html>
<html lang="eng" dir="ltr">

<head>
    <title>MY FLATMATE</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, intial-scale=1.0">
    <link rel="stylesheet" href="forms.css">
    <link rel="stylesheet" href="navfooter.css">


<!--RESPONSIVE 3 LINES ICON-->
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"/>

<!--FONT AWESOME-->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<!--FONTS-->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100&display=swap" rel="stylesheet">
<!--FONTS-->

<!--BOOTSTRAP-->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</head>
<body>
    <!--NAVBAR-->
    <?php
     include 'navUser.php';
    ?>
    <!--NAVBAR-->

<div class="df">
    <div class="or">
    <div class="container">

        <h1 class="title">BOOK YOUR APARTMENT</h1>
    
    <form action="booking.php" method="post">
        
            <div class="inputt">
                <span class="sp"> Check In</span>
                <input type="date" name="Check_In" required>

                <span class="sp"> Check Out</span>
                <input type="date" name="Check_Out" required>
                
            </div>
             <div class="link">
             <input type="submit" name="book" value="book" class="custom-btn btn-5">         
            </div>
    </form>
    </div>
    </div>        
</div>
    <!--FOOTER-->
    <?php
        include 'footer.php';
        ?>
    </body>   
    </html>

    <?php       
    if(isset($_POST['book'])){
                if(isset($_POST['Check_In']) && !empty($_POST['Check_In']))
                $in_date = $_POST['Check_In'];
                else
                echo "please enter your check in date";

                if(isset($_POST['Check_Out']) && !empty($_POST['Check_Out']))
                $out_date = $_POST['Check_Out'];
                else
                echo "please enter your check out date";
            }
            if (!empty($out_date)&&!empty($in_date)){
            $query = " UPDATE `booking` SET `in_date`='$in_date',`out_date`='$out_date' WHERE user_id = '$_SESSION[id]'";

            //$query = " INSERT INTO `booking`(`user_id`, `apartments_id`, `in_date`, `out_date`) VALUES ('$_SESSION[id]','$id','$in_date','$out_date')";
            $runquery = mysqli_query($conn , $query);
            if ($runquery) {
                echo"<script>
        alert('We Will Contact With You As Soon As Possible');
      </script>
      ";
            }
            }

}else header('location:login.php');
        ?>


