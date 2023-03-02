<?php
session_start();
require 'conn.php';
global $conn;
$query = "SELECT * FROM approved_feedback ;";
    $runquery = mysqli_query($conn , $query);
   
?>
<!DOCTYPE html>
<html lang="eng" dir="ltr">

<head>
    <title>MY FLATMATE</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, intial-scale=1.0">
    <link rel="stylesheet" href="navfooter.css">
    <link rel="stylesheet" href="homepage.css">


<!--RESPONSIVE 3 LINES ICON-->
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"/>

<!--FONT AWESOME-->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://kit.fontawesome.com/dc33f86c8c.js" crossorigin="anonymous"></script>

<!--FONTS-->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">
<!--FONTS-->

<!--BOOTSTRAP-->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<!--BOOTSTRAP-->
</head>
    
<body>
    <!--NAVBAR-->
<?php
if(isset($_SESSION['id'])) {
include 'navUser.php';
}else include 'navbar.php';
?>

    <!--LANDING PAGE-->

<section class="landing">

    <div class="layer">
    
        <div class="welcome">
        <p class="big">Welcome to "My FlatMate"</p>
        <p class="smoll">find secured residence opportunities with the right mate.</p>
        <a href="#scrol">
            
            <button class="custom-btn btn-6"><span>DISCOVER</span></button>
            <!--<button class="btnn">DISCOVER</button>-->
     
        </a>
     
        </div>

    </div>

</section>

<!--LANDING PAGE-->
 <br>

 <!--FIRST SECTION-->
<div class="container" id="scrol">
<h1 class="mainhead"> WHO ARE WE?</h1>
<h2 class="abou">ABOUT US</h2>
<h2 class="viss">VISSION</h2>
<h2 class="miss">MISSION</h2>

    <div class="aboutt">
      <div class="try">
        <p>My FlatMate helps you find residence opportunities that are secured and high quality from trusted landlords all over Cairo.</p>
        <br>
        </div>
    </div>
    <div class="vissionn">
        <div class="try">
          <p>The most expatriates form students or employees in Cairo can find suitable rooms easily with many features and services.</p>
          <br>
        </div>
      </div>
      <div class="missionn">
        <div class="try">

          <p class="missiontxt">Our mission is to offer the most useful, powerful and quickest way for expatriates from student and employees to find dormitory with suitable location, price and quality.
            Provide a platform that allows apartment’s owners to show their apartment/rooms available to rent.</p>
          <br>
        </div>
      </div>
  
  </div>
</div>

 <!--SECOND SECTION-->

<div class="container1">
    <h1 class="mainn"> WHAT WE SERVE?</h1>
    <h3 class="pos">POSTING APARTMENT</h3>
    <h3 class="vieww">VIEW APARTMENTS</h3>
    <h3 class="conn">CONNECTING</h3>

    <img class="postt" src="pprop1.png">

    <img class="view1" src="sprop1.png">

    <img class="conn1" src="conn.png">

<p class="ptxt parag">
    You can host your apartment to be shared with a partner here.</p>
    <a class="link1 links" href="host.php">Host Your Apartment</a>

<p class="vtxt parag">
    We provide variety of apartments to match your needs, and you also know who will be with you.
</p>
<a class="link2 links" href="apartments.php">View Avaliable Apartments</a>

<p class="contxt parag">
    We're connecting you with the other party, tenant or host, and help you to make it easier.
</p>

</div>

 <!--THIRD SECTION-->
<div class="container2">

<h1 class="heading2"> WHAT PEOPLE SAY</h1>

<h3 class="commentt">TESTIMONIALS FROM OUR CUSTOMERS USING OUR SERVICE</h3>

<img src="feedback.png" class="iconn">

<div class="part2">

<!--SLIDES CARD-->

    <div id="carouselExampleSlidesOnly" class="carousel slide wholecont" data-bs-ride="carousel">
    <div class="carousel-inner">
       <div class="carousel-item active">
            <p style = "color: black;"> Our Feedbacks</p>
            <div class="carousel-item">
            <?php while($row = $runquery->fetch_assoc()){?>
        <p class="slidee"  <?php $row["feedback"] ?>></p>
        <h5 <?php echo $row["user_name"] ;?>> </h5><?php
        }?>
        </div>
        </div>
    </div>
    </div> 
    <?php
  ?>
<!--SLIDES CARD-->

<div class="submm">
<p class="slidee">You Can Tell Us What's Your Feedback Using Our Service Here.</p>
    <a href="feedback.php" class="links">Submit Your Feedback </a>
</div>

</div>



</div>

</div>


<!--FOOTER-->
<footer>
    <div class="contact">
        
        <p class="co"> <p class="co">For Advertising</p>
        <p class="tex"> <i class="fa-brands fa-whatsapp favv" style=" margin-right: 15px;"></i>+20 1158656096 </p>
        <p class="tex"> <i class="fa fa-phone favv"></i>01158656096</p>
        <p class="tex"><i class="fa fa-envelope favv"></i>Myflatmate@gmail.com</p>
    </div>
    
   
    
    <div class="about">
        <p class="co"> about us</p>
    <p class="textt">My FlatMate helps you find residence opportunities that are secured and high quality from trusted landlords all over Cairo. </p>
    </div>
    

    <div class="contform">
        <p class="co"> Contact US</p>
        <form>
            <textarea placeholder="Leave Your Questions And Inquiries Here"></textarea>
            <button class="button1"> Submit </button>
        </form>
    </div>

    <div class="social">
        <p class="co"> SOCIAL MEDIA</p>
        <a class="btn btn-primary btn-floating m-1" style="background-color: #3b5998;" href="https://www.facebook.com/" role="button" >
            <i class="fa fa-facebook-f"></i>
        </a>
        <a class="btn btn-primary btn-floating m-1" style="background-color: #55acee;" href="https://twitter.com/" role="button">
            <i class="fa fa-twitter"></i>
        </a>
        <a class="btn btn-primary btn-floating m-1" style="background-color: #dd4b39;" href="#!" role="button">
            <i class="fa fa-google"></i>
        </a>
        <a class="btn btn-primary btn-floating m-1" style="background-color: #ac2bac;" href="https://www.instagram.com/" role="button">
            <i class="fa fa-instagram"></i>
    </a>
    </div>

    <div class="copyy">
        <p class="texa">©2022 MYFLATMATE.COM</p>
    </div>
    </footer>
    </body>   
    </html>