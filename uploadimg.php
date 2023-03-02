<?php
session_start();
require 'conn.php';
global $conn;

if(isset($_SESSION['id'])) {
    $query9= "SELECT *  FROM `apartments`";
    $runquery9= mysqli_query($conn , $query9); 
 $rows9 = mysqli_fetch_array($runquery9);
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

        <h1 class="title">HOSTING YOUR APARTMENT</h1>
            <div class="inputt">
            <form action="" enctype="multipart/form-data" method="POST">
                <label for ="files" class="sp"> Upload Images Of Your Apartment</label>
                <input multiple="" name="image[]" type="file"  accept=".jpg, .jpeg, .png" required class="fille" />
            </div>
            <div class="link">
                <input type="submit" name="submit" value="Host" class="custom-btn btn-5">
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
/*if(isset($_POST['submit'])){ 
    // File upload configuration 
        $count = $_FILES['image']['name'];
        $imageCount= count($count);
       for($i=0; $i<$imageCount; $i++){
        $imageName= $_FILES['image']['name'][$i];
        $imageTmpName=$_FILES['image']['tmp_name'][$i];
        $targetPath="./img1/" . $imageName;
        if (move_uploaded_file($imageTmpName ,$targetPath )) {
           $query="INSERT INTO `images`(`image` , 'user_id') VALUES ('$imageName', $_SESSION[id]);";
           $runquery=mysqli_query($conn , $query);
        }
    }}
            $query2 = "UPDATE `images` SET `apartment_id`= '$row9[id]' WHERE  user_id = $_SESSION[id] ";
            $runquery3 = mysqli_query($conn , $query2);
            echo"<script>
            alert('Images have been successfully uploaded');
            </script>";
            
 }}*/

/*if(isset($_POST["submit"])){
    $count = $_FILES['image']['name'];
    $imageCount= count($count);
   for($i=0; $i<$imageCount; $i++){
    $imageName= $_FILES['image']['name'][$i];
    $imageTmpName=$_FILES['image']['tmp_name'][$i];
    $targetPath="./img1/" . $imageName;
    if (move_uploaded_file($imageTmpName ,$targetPath )) {
        $query="INSERT INTO `images`(`image`) VALUES ('$imageName');";
        $runquery=mysqli_query($conn , $query);
       
       
    }
}}*/
}
