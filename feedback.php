<?php

session_start();
require 'conn.php';
global $conn;

if (isset($_SESSION['id'])) {
    ?>
<!DOCTYPE html>
<html lang="eng" dir="ltr">

<head>
    <title>MY FLATMATE</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, intial-scale=1.0">
    <link rel="stylesheet" href="form.css">

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
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</head>
    
<body>
    <!--NAVBAR-->
<?php
include 'navbar.php';
?>
    <!--NAVBAR-->

<div class="df">
    
    <div class="or">

    <div class="container">

        <h1 class="title">FEEDBACK</h1>
    
    <form action="" method = "POST">
        
            <div class="inputt">
                <span class="sp"> Your Name</span>

                <input type="text" name="user_name" placeholder="Please Enter Your Name" required>

                <span class="sp"> Your Feedback</span>

                <textarea name ="feedback" style="background-color: rgba(0, 0, 0, 0); border-radius: 10px; padding-top: 10px;" placeholder=" Submit Your Feedback Here"></textarea>
                
            </div>

             <div class="link">
                   
             <input type="submit" name="Submit" value="Submit" class="custom-btn btn-5"/>


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
if(isset($_POST['Submit'])) {
    if(isset($_POST['user_name']) && !empty($_POST['user_name']))
        $user_name = $_POST['user_name'];
        else {echo"<script>
        alert('Please Enter Your Name');
      </script>
      ";}
      if(isset($_POST['feedback']) && !empty($_POST['feedback']))
        $feedback = $_POST['feedback'];
        else {echo"<script>
        alert('Please Enter Your Feedback');
      </script>
      ";}
      if (!empty($user_name)&&!empty($feedback)){
        $query ="INSERT INTO `pending_feedback`(`user_id`, `user_name`, `feedback`) VALUES ($_SESSION[id], '$user_name' , '$feedback')";
        $runquery = mysqli_query($conn , $query);
    }
    echo"<script>
        alert('Your Feedback Has Been Successfully Submited');
      </script>
      ";
}
}