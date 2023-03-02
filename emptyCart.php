<?php
session_start();
require 'conn.php';
global $conn;
if(isset($_SESSION['id'])) {
    ?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>MY FLATMATE</title>
    
        <link rel="stylesheet" href="apartments.css">
        <link rel="stylesheet" href="navfooter.css">
    
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.13.0/css/all.css">
    
    
        <!--RESPONSIVE 3 LINES ICON-->
        <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"/>
        
        <!--FONT AWESOME-->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="https://kit.fontawesome.com/dc33f86c8c.js" crossorigin="anonymous"></script>
    
        <!--FONTS-->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100&display=swap" rel="stylesheet">
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
    <!--CARDS-->
    <div class="cards">
      <h1 class="avap">FAVOURITES</h1><br><br>
      <center><h2>You Don't Have Favourites Yet!</h2><br><br><br><br></center>
      <div class="article-contenar">
        <ul class="groups">
            <li></li> </ul></div></div>
</section>
    <!--FOOTER-->
<?php
include 'footer.php';
}else header('location:login.php');
?>
</body>
</html>

