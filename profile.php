<?php
session_start();
require 'conn.php';
global $conn;
if(isset($_SESSION['id'])) {
    $query5 = "SELECT * FROM user WHERE id = '$_SESSION[id]';";
    $runquery5 = mysqli_query($conn , $query5);
    $row5 = $runquery5->fetch_assoc();
   
?>
<!DOCTYPE html>
<html lang="eng" dir="ltr">

<head>
    <title>MY FLATMATE</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, intial-scale=1.0">
    <link rel="stylesheet" href="profilepage.css">
    <link rel="stylesheet" href="navfooter.css">
    

    

    <!--RESPONSIVE 3 LINES ICON-->
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"/>

<!--FONTS-->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Barlow+Condensed:wght@300&family=Montserrat:wght@100&family=Poppins:wght@100;200&display=swap" rel="stylesheet"> 
<!--FONTS-->

<!--FONT AWESOME-->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <script src="https://kit.fontawesome.com/dc33f86c8c.js" crossorigin="anonymous"></script>

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

<!--CONTENT-->
<div class="container">

<div class="profile-header">

    <div class="profile-img">
    <?php if(isset($row5["profile_img"])) {?>
    <img src="img1/<?php echo $row5["profile_img"]; ?>" >
<?php } ?>
</div>
    <div class="profile-nav-info">
        
    <h3 class="user-name"><?php echo $_SESSION['name'];?> </h3>
    </div>

</div>

<div class="main-bd">
    <?php

    ?>
    <div class="left-side">
     <div class="profile-side">
    <p class="mobile-no"><i class="fa fa-phone"></i> <?= $row5["phone"] ?></p>
    <p class="user-mail"><i class="fa fa-envelope"></i> <?= $row5["email"] ?></p>
    <p class="user-mail"><i class="fa fa-transgender"></i> <?= $row5["gender"] ?></p>

<div class="profile-btn">
    <form>
        
    <a class="custom-btn btn-5" href="edit.php" style = "padding:2px 10px 2px; " ><span>Edit</span></a>
    
    </button></form>
</div>

     </div>
    </div>

    <div class="right-side">
        <div class="nav1">
            <ul>
                <li class="user-post active">
                    History
                </li>

                
            </ul>
        </div>
        <div class="profile-body">
            <div class="profile-posts tab">
                <?php 
                $query = "SELECT * FROM `booking` WHERE `user_id`= '$_SESSION[id]' ";
                $runquery = mysqli_query($conn , $query);
                $row = $runquery->fetch_assoc();
                
                $query2 = "SELECT * FROM `approved_apartments` WHERE `host_id`= '$_SESSION[id]' ";
                $runquery2 = mysqli_query($conn , $query2);
                $row2 = $runquery2->fetch_assoc();

                if ($row) {
                   $query3="SELECT * FROM `images` WHERE apartment_id = '$row[apartments_id]'" ;
                   $runquery3 = mysqli_query($conn , $query3);
                   $row3 = $runquery3->fetch_assoc();

                   $query4="SELECT * FROM `approved_apartments` WHERE id = '$row[apartments_id]'" ;
                   $runquery4 = mysqli_query($conn , $query4);
                   $row4 = $runquery4->fetch_assoc();
                
                ?>

<!--CARDS-->
<div class="cards">
    
    <div class="article-contenar">
          <ul class="groups">
          <li>
              <div class="card">
                  <div class="image-session">
                  <div class="carousel-item active">
                              <img src="img1/<?php echo $row4["room_img"]; ?>" class="d-block" >
                              </div>
                  </div>
                  <div class="meta-session">
                  <div class="body">
                      

                    <h2 class="title"><i class="fa-solid fa-city"></i>District:<?= $row4["district"] ?><a href="cart.php?id=<?php echo $row4["id"]; ?>"><i class="fa-solid fa-cart-shopping shop"></i></a></h2>
                    <h2 class="title"><i class="fa-solid fa-bed"></i>Rooms: <?= $row4["room_no"] ?></h2>
                    <h2 class="title"><i class="fa-solid fa-building"></i>Apartment Size: <?= $row4["size"] ?></h2>
                    <h2 class="title"><i class="fa-solid fa-coins"></i>Price: <?= $row4["price"] ?></h2>
                  </div>
                  
              </div>
              </li>
        </ul>
    </div>

  </div>
</section>

<h4 >check in date:</h2>
<p><?= $row["in_date"] ?></p>
<h4 >check out date:</h2>
<p><?= $row["out_date"] ?></p>
<?php
}elseif ($row2){
?>
<h2 >APARTMENT INFO</h2>
<h4 >number of rooms:</h2>
<p><?= $row2["room_no"] ?></p>
<h4 >size:</h2>
<p><?= $row2["size"] ?></p>
<?php
}else echo "You dont have history yet!";
?>
            </div>

         
        </div>
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
}else header('location:login.php');
?>