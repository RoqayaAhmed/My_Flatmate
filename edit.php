<?php
session_start();
require 'conn.php';
global $conn;
if(isset($_SESSION['id'])) {
    

if(isset($_POST['update'])) {
    if(isset($_POST['fname']) && !empty($_POST['fname']))
        $fname=$_POST['fname'];
    else
    echo"<script>
    alert('please enter your first name');
  </script>
  ";

    if(isset($_POST['lname']) && !empty($_POST['lname']))
        $lname = $_POST['lname'];
    else
    echo"<script>
    alert('please enter your last name');
  </script>
  ";

    if(isset($_POST['bdate']) && !empty($_POST['bdate']))
        $bdate = $_POST['bdate'];
    else
    echo"<script>
    alert('please enter your birthday');
  </script>
  ";

    if(isset($_POST['phone']) && !empty($_POST['phone']))
        $phone = $_POST['phone'];
    else
    echo"<script>
    alert('please enter your phone number');
  </script>
  ";

    if(isset($_POST['email']) && !empty($_POST['email']))
        $email = $_POST['email'];
    else
    echo"<script>
    alert('please enter your email');
  </script>
  ";

    if(isset($_POST['pass']) && !empty($_POST['pass']))
        $pass = $_POST['pass'];
    else
    echo"<script>
    alert('please enter your password');
  </script>
  ";

     if(isset($_POST['confirmPass']) && !empty($_POST['confirmPass']))
        $confirmPass = $_POST['confirmPass'];
     else
     echo"<script>
     alert('please confirm password');
   </script>
   ";
if ($pass == $confirmPass) {
    


if (!empty($fname)&&!empty($lname)&&!empty($bdate)&&!empty($phone)&&!empty($email)&&!empty($pass)&&!empty($confirmPass)){
$query = " UPDATE user SET first_name = '$fname',last_name='$lname',Password='$pass',confirm_password ='$confirmPass',email ='$email',phone='$phone',birthday='$bdate' WHERE id = '$_SESSION[id]';";
$runquery = mysqli_query($conn , $query);
if ($runquery) {
    echo
    "
    <script>
      alert('your data have been edited');
    </script>
    ";
    
}

}else  echo
"
<script>
  alert('please fill the form to edit your data');
</script>
";
 }else  echo
"
<script>
  alert('make sure your password is the same as the confirmed password');
</script>
";
}

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
    
 
    
        $query2 = "SELECT * FROM user WHERE id = '$_SESSION[id]';";
        $runquery2 = mysqli_query($conn , $query2);
        $fetch = $runquery2->fetch_assoc();

include 'navUser.php';
?>
    <!--NAVBAR-->

<div class="df">
    
    <div class="or">

    <div class="container">

        <h1 class="title">Edit Your Profile</h1>
    
    <form action="edit.php" method="post">
        
            <div class="inputt">
                <span class="sp"> Update First name</span>
                <input type="text" name="fname" placeholder="<?= $fetch["first_name"] ?>" required>
            
                <span class="sp"> Update Last name</span>
                <input type="text" name="lname" placeholder="<?= $fetch["last_name"] ?>" required>

                <span class="sp">Update Birthdate</span>
                <input type="date" name="bdate">

                <span class="sp"> Phone</span>
                <input type="text" name="phone" placeholder="<?= $fetch["phone"] ?>" required>

                <span class="sp"> Update Email Address</span>
                <input type="text" name="email" placeholder="<?= $fetch["email"] ?>">
            
                <span class="sp"> Update Password</span>
                <input type="password" name="pass" placeholder="Enter your new password">

                <span class="sp"> Confirm New Password</span>
                <input type="password" name="confirmPass" placeholder="Enter your new password">
    
               <!-- <span class="sp"> Update Profile Photo</span>
                <input type="file" class="fille">-->

                
            </div>

             <div class="link">
                   
             <input type="submit" name="update" value="Save Changes" class="custom-btn btn-5">

                

                    <span class="sp">Back to your profile </span>

                    <a class="linkx" href="profile.php">
                    My Profile
                </a>
            </div>
    </form>
    </div>
    </div>        


</div>
    <!--FOOTER-->
    <?php
        include 'footer.php';
}else header('location:login.php');
        ?>
    </body>   
    </html>