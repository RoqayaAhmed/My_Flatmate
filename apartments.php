<?php
session_start();
require 'conn.php';
global $conn;
$query = "SELECT * FROM approved_apartments ;";
$runquery = mysqli_query($conn , $query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MY FLATMATE</title>

    <link rel="stylesheet" href="apartmentt.css">
    <link rel="stylesheet" href="navfooter.css">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.13.0/css/all.css">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
   

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
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</head>
<body>
      <!--NAVBAR-->
<?php
if(isset($_SESSION['id'])) {
  include 'navUser.php';
  }else include 'navbar.php';
?>
<!--NAVBAR-->

<!--COTNENT-->
<section class="container">
<!--FILTERATION DROPDOWNS-->
    <div class="filter">
      <h1>Filterations</h1>

    <form action="apartments.php" method="post">
      <select name="room">
        <option selected>Room Numbers</option>
          <option value="One">One</option>
          <option value="Two">Two</option>
          <option value="Three">Three</option>
      </select>
      <br>
      <select name="size">
        <option selected>Apartment Size</option>
        <option value="90">70-90</option>
        <option value="120">100-120</option>
        <option value="170">120-170</option>
      </select>
    <br>
      <select name="price">
      <option selected>Price Range</option>
        <option value="2000">1000-2000</option>
        <option value="3000">2000-3000</option>
        <option value="4000">3000-4000</option>
        <option value="5000">4000-5000</option>
      </select>
      <br>
      <select name="district">
        <option selected>District</option>
        <option value="Haram">Haram</option>
        <option value="Faisal">Faisal</option>
        <option value="Downtown">Downtown</option>
        <option value="Shobra">Shobra</option>
        <option value="Helwan">Helwan</option>
        <option value="Maadi">Maadi</option>
        <option value="Dokki">Dokki</option>
        <option value="Matareyya">Matareyya</option>
        <option value="New Cairo">New Cairo</option>
        <option value="Helioplis">Helioplis</option>
    
    
      </select>
      <br>
      <input type="submit" name="filter" value="FILTER" class="custom-btn btn-5" />

    </form>
    
    </div>
    <!--CARDS-->
  <div class="cards">
    <h1 class="avap">Avaliable Apartments</h1>
    <div class="article-contenar">
          <ul class="groups">
    
<?php
if (isset($_POST['filter'])){
if (isset($_POST['room']))  {
  $room= $_POST['room'];}

  if (isset($_POST['size'])) {
    $size= $_POST['size'];}

    if (isset($_POST['price'])) {
      $price= $_POST['price'];}

      if (isset($_POST['district'])) {
        $district= $_POST['district'];}
  $query2= "SELECT * FROM `approved_apartments`WHERE `room_no` = '$room' OR `size` = '$size' OR `price`= '$price' OR `district`= '$district' ; ";
  $runquery2 = mysqli_query($conn , $query2);
  while ($row2 = $runquery2->fetch_assoc()){
    $id2 = $row2["id"];
  ?>
  
      
              <li>
              <div class="card">
                  <div class="image-session">
                      <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                          <div class="carousel-inner">
                            <div class="carousel-item active">
                            <img src="secapa.jpeg" class="d-block" alt="...">
                            </div>
                          </div>
                          <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                          </button>
                          <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                          </button>
                        </div>
                  </div>
                  <div class="meta-session">
                  <div class="body">
                      

                    <h2 class="title"><i class="fa-solid fa-city"></i>District:<a href="cart.php?id=<?php echo $row2["id"]; ?>"><i class="fa-solid fa-cart-shopping shop"></i></a></h2>
                    <h2 class="title"><i class="fa-solid fa-bed"></i>Rooms: <?= $row2["room_no"] ?></h2>
                    <h2 class="title"><i class="fa-solid fa-building"></i>Apartment Size: <?= $row2["size"] ?></h2>
                    <h2 class="title"><i class="fa-solid fa-coins"></i>Price: <?= $row2["price"] ?></h2>
                  </div>
                  <div class="footer">
                    <a href="apartment1.php?id=<?php echo $row2["id"]; ?>" class="button1">View →</a>
                    <a href="booking.php?id=<?php echo $row2["id"]; ?>" class="button">Book →</a>
                  </div>
              </div>
              <?php




            
}}else{  while ($row = $runquery->fetch_assoc()){
      $id = $row["id"];
    ?><!--CARDS-->
    <div class="cards">
                <li>
                <div class="card">
                    <div class="image-session">
                              <div class="carousel-item active">
                              <img src="img1/<?php echo $row["room_img"]; ?>" class="d-block" >
                              </div>
                    </div>
                    <div class="meta-session">
                    <div class="body">
                      <h2 class="title"><i class="fa-solid fa-city"></i>District:<?= $row["district"] ?><a href="cart.php?id=<?php echo $row["id"]; ?>"><i class="fa-solid fa-cart-shopping shop"></i></a></h2>
                      <h2 class="title"><i class="fa-solid fa-bed"></i>Rooms: <?= $row["room_no"] ?></h2>
                      <h2 class="title"><i class="fa-solid fa-building"></i>Apartment Size: <?= $row["size"] ?></h2>
                      <h2 class="title"><i class="fa-solid fa-coins"></i>Price: <?= $row["price"] ?></h2>
                    </div>
                    <div class="footer">
                      <a href="apartment1.php?id=<?php echo $row["id"]; ?>" class="button1">View →</a>
                      <a href="book2.php?id=<?php echo $row["id"]; ?>"class="button">Book →</a>
                    </div>
                </div>
                <?php
    }}
                ?>
            </li>
        </ul>
    </div>

  </div>
</section>
    <!--FOOTER-->
<?php
include 'footer.php';
?>

</body>
</html>