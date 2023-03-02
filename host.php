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

        <h1 class="title">HOSTING YOUR APARTMENT</h1>
    
    <form action="host.php" method="post" autocomplete="off" enctype="multipart/form-data">
        
            <div class="inputt">
                <span class="sp"> NO. Rooms</span>
                <select name="roomNum">
                <option selected>Room Numbers</option>
                <option value="One">One</option>
                <option value="Two">Two</option>
                <option value="Three">Three </option>
                </select>

                <span class="sp"> Apartment Size</span>
                <select name="size">
        <option selected>Apartment Size</option>
        <option value="100">70-90</option>
        <option value="150">100-120</option>
        <option value="200">120-170</option>
       </select>
                <span class="sp"> Price </span>
                <input type="text" name="price" placeholder="Enter your apartment rent price" required>

                <span class="sp"> Address</span>
                <input type="text" name="address" placeholder="Enter your apartment address" required>

                <span class="sp"> District</span>
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

                <span class="sp"> Description </span>
                <textarea name="description" placeholder="Leave more details about your apartment here" class="txtara"></textarea>
                
                <span class="sp"> Upload Image Of Your National ID</span>
                <input type="file" name="national_id" id = "national_id" accept=".jpg, .jpeg, .png" required class="fille">

                <span class="sp"> Upload Image Of Your Property Contract</span>
                <input type="file" name="contract" id = "contract" accept=".jpg, .jpeg, .png" required class="fille">
                
                <span class="sp"> Upload Image Of Your Room</span>
                <input type="file" name="room" id = "room" accept=".jpg, .jpeg, .png" required class="fille">
            
              </div>

             <div class="link">
                   
                
                <input type="submit" name="host" value="HOST" class="custom-btn btn-5" />
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
if(isset($_POST['host'])) {
    if(isset($_POST['roomNum']) && !empty($_POST['roomNum']))
        $roomNum = $_POST['roomNum'];
        else {echo"<script>
        alert('please enter the number of rooms available for rent');
      </script>
      ";}

    if(isset($_POST['size']) && !empty($_POST['size']))
        $size = $_POST['size'];
    else
    echo"<script>
    alert('please enter the apartment's size');
  </script>
  ";

    if(isset($_POST['price']) && !empty($_POST['price']))
        $price = $_POST['price'];
    else
    echo"<script>
    alert('please enter the apartment's price');
  </script>
  ";
        
    if(isset($_POST['address']) && !empty($_POST['address']))
        $address = $_POST['address'];
    else
    echo"<script>
    alert('please enter the apartment's address');
  </script>
  ";

    if(isset($_POST['district']) && !empty($_POST['district']))
        $district = $_POST['district'];
    else
    echo"<script>
    alert('please the district');
  </script>
  ";

    if(isset($_FILES['national_id']) ) {
     if($_FILES["national_id"]["error"] == 4){
    echo
    "<script> alert('Image Does Not Exist'); </script>"
    ;
  }
  else{
    $fileName = $_FILES["national_id"]["name"];
    $fileSize = $_FILES["national_id"]["size"];
    $tmpName = $_FILES["national_id"]["tmp_name"];

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
        echo "please upload the image";


    if(isset($_FILES['contract']) ) {
            if($_FILES["contract"]["error"] == 4){
           echo
           "<script> alert('Image Does Not Exist'); </script>"
           ;
         }
         else{
           $fileName2 = $_FILES["contract"]["name"];
           $fileSize2 = $_FILES["contract"]["size"];
           $tmpName2 = $_FILES["contract"]["tmp_name"];
       
           $validImageExtension2 = ['jpg', 'jpeg', 'png'];
           $imageExtension2 = explode('.', $fileName2);
           $imageExtension2 = strtolower(end($imageExtension2));
           if ( !in_array($imageExtension2, $validImageExtension2) ){
             echo
             "
             <script>
               alert('Invalid Image Extension');
             </script>
             ";
           }
           else if($fileSize2 > 1000000){
             echo
             "
             <script>
               alert('Image Size Is Too Large');
             </script>
             ";
           }
           else{
             $newImageName2 = uniqid();
             $newImageName2 .= '.' . $imageExtension2;
       
             move_uploaded_file($tmpName2, 'img1/' . $newImageName2);
            
           }
         } 
       }   
           else
           echo"<script>
           alert('please upload the apartment's image');
         </script>
         ";

         if(isset($_FILES['room']) ) {
          if($_FILES["room"]["error"] == 4){
         echo
         "<script> alert('Image Does Not Exist'); </script>"
         ;
       }
       else{
         $fileName3 = $_FILES["room"]["name"];
         $fileSize3 = $_FILES["room"]["size"];
         $tmpName3 = $_FILES["room"]["tmp_name"];
     
         $validImageExtension3 = ['jpg', 'jpeg', 'png'];
         $imageExtension3 = explode('.', $fileName3);
         $imageExtension3 = strtolower(end($imageExtension3));
         if ( !in_array($imageExtension3, $validImageExtension3) ){
           echo
           "
           <script>
             alert('Invalid Image Extension');
           </script>
           ";
         }
         else if($fileSize3 > 1000000){
           echo
           "
           <script>
             alert('Image Size Is Too Large');
           </script>
           ";
         }
         else{
           $newImageName3 = uniqid();
           $newImageName3 .= '.' . $imageExtension3;
     
           move_uploaded_file($tmpName3, 'img1/' . $newImageName3);
          
         }
       } 
     }   
         else
         echo"<script>
         alert('please upload the apartment's image');
       </script>
       ";
       

    if(isset($_POST['description']) && !empty($_POST['description']))
        $description = $_POST['description'];
    else
    echo"<script>
    alert('please enter the apartment's description');
  </script>
  ";
      } 
if (!empty($roomNum)&&!empty($size)&&!empty($price)&&!empty($address)&&!empty($district)&&!empty($newImageName)&&!empty($newImageName2)&&!empty($newImageName3)&&!empty($description)){
$query ="INSERT INTO `apartments`( `host_id`, `room_no`, `size`, `price`, `address`, `District`, `id_img`, `contract_img`, `room_img`, `description`) VALUES ($_SESSION[id],'$roomNum','$size','$price','$address','$district','$newImageName','$newImageName2','$newImageName3','$description')";
$runquery = mysqli_query($conn , $query);
if ($runquery) {
  header('location:uploadimg.php');
}
}else echo"<script>
alert('please fill the entire form');
</script>
";}else header('location:login.php');
?>