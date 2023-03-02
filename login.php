<?php
session_start();
require 'conn.php';
global $conn;
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

        <h1 class="title">LOGIN</h1>
    
    <form action="login.php" method="post">
        
            <div class="inputt">
                <span class="sp"> Email</span>
                <input type="text" name="email" placeholder="Enter your email" required>

                <span class="sp"> Password</span>
                <input type="password" name="pass" placeholder="Enter your Password" required>
            </div>

             <div class="link">
                   
                <input type="submit" value="LOGIN" name="login" class="custom-btn btn-5">

                

                    <span class="sp">Don't have an account? </span>

                    <a class="linkx"href="register.php">
                    REGISTER NOW                      
                </a>
            </div>
    </form>
    </div>
    </div>        


</div>
   
    

<?php



if(isset($_POST['login'])) {
    if(isset($_POST['email']) && !empty($_POST['email']))
    $email=$_POST['email'];
    else
    echo
    "
    <script>
      alert('please enter your email');
    </script>
    ";
    

    if(isset($_POST['pass']) && !empty($_POST['pass']))
        $pass=$_POST['pass'];
    else
    echo
    "
    <script>
      alert('please enter your password');
    </script>
    ";
    


if (!empty($email)&&!empty($pass)){
$query = "SELECT * FROM user WHERE email = '$email' AND Password = '$pass';";
$runquery = mysqli_query($conn , $query);
$rows = mysqli_num_rows($runquery);

if($rows>0){
    $row = $runquery->fetch_assoc();
    $id = $row['id'];
    $name = $row['first_name'];
    $_SESSION['name']=$name;
    $_SESSION['id']=$id;
    header('location:homepage.php');}
else  echo
"
<script>
  alert('incorrect email or password');
</script>
";

}}

?>
 <!--FOOTER-->
    
 <?php
        include 'footer.php';
        ?>
    </body>   
    </html>