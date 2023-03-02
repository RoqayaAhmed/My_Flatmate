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
    <link rel="stylesheet" href="form.css">
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
include 'navUser.php'
?>
    <!--NAVBAR-->

<div class="df">
    
    <div class="or">

    <div class="container">

    <h1 class="title">REGISTERATION</h1>
    
    <form action="" method="post" autocomplete="off" enctype="multipart/form-data">
        
            <div class="inputt">
               

                <span class="sp"> first name </span>
                <input type="text" name="fname" placeholder="Enter your first name" required>

                <span class="sp"> last name</span>
                <input type="text" name="lname" placeholder="Enter your last name" required>

                <span class="sp"> Gender </span>

                <select name="select" id="" class="selectt">
            <option value="" disabled="disabled" selected="selected">
            Select Gende</option>
            <option value="Male">Male</option>
            <option value="Female">Female</option>
            </select>

            <span class="sp"> Birthdate</span>
            <input type="date" name="bdate" required>

                <span class="sp">phone number </span>
                <textarea name="phone" placeholder="please enter your phone number" class="txtara"></textarea>
                
                <span class="sp"> Email</span>
                <input type="text" name="email" placeholder="Enter your Email" required>

                <span class="sp"> Upload your profile picture</span>
                <input type="file" name="profile" id = "profile" accept=".jpg, .jpeg, .png" required class="fille">

                <span class="sp"> Password</span>
                <input type="password" name="pass" placeholder="Enter your Password" required>

                <span class="sp">Confirm Password</span>
                <input type="password" name="confirmPass" placeholder="Confirm Your Password" required>
            
              </div>

             <div class="link">
                   
                
                <input type="submit" name="create" value="register" class="custom-btn btn-5" />
                <!--<script>
                    function myFunction(){
                        window.location.href="uploadimg.php";
                    }
                </script>-->

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
if(isset($_POST['create'])) {
    if(isset($_POST['fname']) && !empty($_POST['fname']))
        $fname = $_POST['fname'];
        else {echo"<script>
        alert('Please Enter Your First Name');
      </script>
      ";}

    if(isset($_POST['lname']) && !empty($_POST['lname']))
        $lname = $_POST['lname'];
    else
    echo"<script>
    alert('Please Enter Your Last Name');
  </script>
  ";

    if(isset($_POST['select']) && !empty($_POST['select']))
        $select = $_POST['select'];
    else
    echo"<script>
    alert('Please Enter Your Gender');
  </script>
  ";
        
    if(isset($_POST['bdate']) && !empty($_POST['bdate']))
        $bdate = $_POST['bdate'];
    else
    echo"<script>
    alert('Please Enter Your Birthdate');
  </script>
  ";

    if(isset($_POST['phone']) && !empty($_POST['phone']))
        $phone = $_POST['phone'];
    else
    echo"<script>
    alert('please the district');
  </script>
  ";

    if(isset($_FILES['profile']) ) {
     if($_FILES["profile"]["error"] == 4){
    echo
    "<script> alert('Image Does Not Exist'); </script>"
    ;
  }
  else{
    $fileName = $_FILES["profile"]["name"];
    $fileSize = $_FILES["profile"]["size"];
    $tmpName = $_FILES["profile"]["tmp_name"];

    $validImageExtension = ['jpg', 'jpeg', 'png'];
    $imageExtension = explode('.', $fileName);
    $imageExtension = strtolower(end($imageExtension));
    if ( !in_array($imageExtension, $validImageExtension) ){
      echo
      "
      <script>
        alert('Invalid Image Extension');
      </script>
      ";
    }
    else if($fileSize > 1000000){
      echo
      "
      <script>
        alert('Image Size Is Too Large');
      </script>
      ";
    }
    else{
      $newImageName = uniqid();
      $newImageName .= '.' . $imageExtension;

      move_uploaded_file($tmpName, 'img1/' . $newImageName);
     
    }
  } 
}   
    else
        echo "Please Upload The Image";
       

    if(isset($_POST['email']) && !empty($_POST['email']))
        $email = $_POST['email'];
    else
    echo"<script>
    alert('Please Enter Your E-mail');
  </script>
  ";

  if(isset($_POST['pass']) && !empty($_POST['pass']))
        $pass = $_POST['pass'];
    else
    echo"<script>
    alert('Please Enter Your Password');
  </script>
  ";

  if(isset($_POST['confirmPass']) && !empty($_POST['confirmPass']))
        $confirmpass = $_POST['confirmPass'];
    else
    echo"<script>
    alert('Please Enter Your Confrim Password');
  </script>
  ";
      } 
      if ($pass == $confirmPass) {
if (!empty($fname)&&!empty($lname)&&!empty($phone)&&!empty($email)&&!empty($pass)&&!empty($confirmpass)&&!empty($bdate)&&!empty($select)){
$query ="INSERT INTO user( `first_name`, `last_name`, `Password`, `confirm_password`, `email`, `phone`, `birthday`, `gender`, `profile_img`) VALUES ('$fname','$lname','$pass','$confirmpass','$email','$phone','$bdate','$select','$newImageName');";
$runquery = mysqli_query($conn , $query);
if ($runquery) {
    echo
    "
    <script>
      alert('your data was successfully added!');
    </script>
    ";
}}else echo
"
<script>
  alert('make sure that your password is tha same as the confirmed password');
</script>
";
}else echo"<script>
alert('please fill the entire form');
</script>
";
?>