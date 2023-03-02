<?php
session_start();
require 'conn.php';
global $conn;

if(isset($_SESSION['id'])) {
?>
<!DOCTYPE html>
<html lang="eng" dir="ltr">

<head>
    <title>MY FLATMATE</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, intial-scale=1.0">
    <link rel="stylesheet" href="admin.css">
    <link rel="stylesheet" href="navfooter.css">


<!--RESPONSIVE 3 LINES ICON-->
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"/>

<!--FONT AWESOME-->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

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
  include 'nav_admin.php';


  $query = "SELECT * FROM `booking`"; 
  $runquery = mysqli_query($conn , $query);
  $rows = mysqli_num_rows($runquery);

  $query2 = "SELECT * FROM `apartments`"; 
  $runquery2 = mysqli_query($conn , $query2);
  $rows2 = mysqli_num_rows($runquery2);

  $query3 = "SELECT * FROM `approved_apartments`"; 
  $runquery3 = mysqli_query($conn , $query3);
  $rows3 = mysqli_num_rows($runquery3);

  $query4 = "SELECT * FROM `pending_feedback` "; 
  $runquery4 = mysqli_query($conn , $query4);
  $rows4 = mysqli_num_rows($runquery4);

  $query7 = "SELECT * FROM `approved_feedback` "; 
  $runquery7 = mysqli_query($conn , $query7);
  $rows7 = mysqli_num_rows($runquery7);

  $query5 = "SELECT * FROM `employees`"; 
  $runquery5 = mysqli_query($conn , $query5);
  $rows5 = mysqli_num_rows($runquery5);

  ?>
<section>

<div class="gallery">

    <div class="content">
        <img src="tenantt.png">
        <a href="#" class="head1"><h1>Tenants</h1></a>
        <form action="admin.php" method="post">
        <input type="submit" value="View Tenants" name="view" class="custom-btn btn-5">
        </form>
        <h5 class="numberr1">count: <?= $rows; ?></h5>
    </div>

    <div class="content">
        <img src="apartment1.png">
        <a href="#" class="head1"><h1>Apartments</h1></a>
        <form action="admin.php" method="post">
            <input type="submit" value="View Pending Apartments" name="apartments" class="custom-btn btn-5">
            <input type="submit" value="View Avaliable Apartments" name="approved_apartments" class="custom-btn btn-5">
            </form>
            <h5 class="numberr">pending count: <?= $rows2; ?></h5>
            <h5 class="numberr">approved count: <?= $rows3; ?></h5>

        </div>

    <div class="content">
        <img src="feed.png">
        <a href="#" class="head1"><h1>Feedbacks</h1></a>
        <form action="admin.php" method="post">
            <input type="submit" value="View Pending Feedbacks" name="feedback" class="custom-btn btn-5">
            <input type="submit" value="View Avaliable Feedbacks" name="approved_feedback" class="custom-btn btn-5">
        </form>
            <h5 class="numberr">pending count: <?= $rows4; ?></h5>
            <h5 class="numberr">approved count: <?= $rows7; ?></h5>
        </div>

     <div class="content">
        <img src="emp1.png">
        <a href="#" class="head1"><h1>Employees</h1></a>
        <form action="admin.php" method="post">
            <input type="submit" value="View Employees" name="view_emp" class="custom-btn btn-5">
            </form>
        <h5 class="numberr1">Employees count: <?= $rows5; ?></h5>
    </div>

</div>

<?php
if(isset($_POST['view'])) {
   ?> <table class="table">

    <!--Table Heads Example-->
    <thead>
    <th>user_id</th>
    <th>apartments_id</th>
    <th>in_date</th>
    <th>out_date</th>
    </thead><?php
    while ($row = $runquery->fetch_assoc()){

?>
    <!--Table Body Example-->
    <tbody>
    <tr>
        <td><?= $row['user_id']?></td>
        <td><?= $row['apartments_id']?></td>
        <td><?= $row['in_date']?></td>
        <td><?= $row['out_date']?></td>
        
    </tr><?php } ?>
    </tbody>

</table>
<?php
}


if(isset($_POST['apartments'])) {

    
   ?> <table class="table">

    <!--Table Heads Example-->
    <thead>
    <th>host_id</th>
    <th>room_no</th>
    <th>size</th>
    <th>price</th>
    <th>address</th>
    <th>District</th>
    <th>id_img</th>
    <th>contract_img</th>
    <th>Description</th>
    <th>images</th>
    <th>Delete</th>
    <th>Approve</th>
    </thead><?php
    while ($row2 = $runquery2->fetch_assoc()  ){
$id = $row2["id"];
?>
    <!--Table Body Example-->
    <tbody>
    <tr>
        <td><?= $row2['host_id']?></td>
        <td><?= $row2['room_no']?></td>
        <td><?= $row2['size']?></td>
        <td><?= $row2['price']?></td>
        <td><?= $row2['address']?></td>
        <td><?= $row2['District']?></td>
        <td> <img src="img1/<?php echo $row2["id_img"]; ?>" width = 200 > </td>
         <td> <img src="img1/<?php echo $row2["contract_img"]; ?>" width = 200 > </td>
        <td><?= $row2['description']?></td>
        <td><img src="img1/<?php echo $row2["room_img"]; ?>" width = 200 > </td>
        <td><a href="delete_apartment.php?id=<?php echo $id; ?>">Delete</a></td>
        <td><a href="approve_apartment.php?id=<?php echo $id; ?>">Approve</a></td>

        
    </tr><?php } ?>
    </tbody>

</table>
<?php
}

if(isset($_POST['approved_apartments'])) {

    
    ?> <table class="table">
 
     <!--Table Heads Example-->
     <thead>
     <th>host_id</th>
     <th>room_no</th>
     <th>size</th>
     <th>price</th>
     <th>address</th>
     <th>District</th>
     <th>id_img</th>
     <th>contract_img</th>
     <th>room_img</th>
     <th>description</th>
     </thead><?php
     while ($row3 = $runquery3->fetch_assoc()){
 $id = $row3["id"];
 ?>
     <!--Table Body Example-->
     <tbody>
     <tr>
         <td><?= $row3['host_id']?></td>
         <td><?= $row3['room_no']?></td>
         <td><?= $row3['size']?></td>
         <td><?= $row3['price']?></td>
         <td><?= $row3['address']?></td>
         <td><?= $row3['district']?></td>
         <td> <img src="img1/<?php echo $row3["id_img"]; ?>" width = 200 > </td>
         <td> <img src="img1/<?php echo $row3["contract_img"]; ?>" width = 200 > </td>
         <td> <img src="img1/<?php echo $row3["room_img"]; ?>" width = 200 > </td>
         <td><?= $row3['description']?></td>
         <td><a href="delete_apartment2.php?id=<?php echo $id; ?>">Delete</a></td>
 
         
     </tr><?php } ?>
     </tbody>
 
 </table>
 <?php
 }

 if(isset($_POST['feedback'])) {

    
    ?> <table class="table">
 
     <!--Table Heads Example-->
     <thead>
     <th>User_id</th>
     <th>User_name</th>
     <th>Feedback</th>
     <th>approve</th>
     <th>delete</th>
     </thead><?php
     while ($row4 = $runquery4->fetch_assoc()){
 $id = $row4["id"];
 ?>
     <!--Table Body Example-->
     <tbody>
     <tr>
         <td><?= $row4['user_id']?></td>
         <td><?= $row4['user_name']?></td>
         <td><?= $row4['feedback']?></td>
         <td><a href="approved_feedback.php?id=<?php echo $id; ?>">Approve</a></td>
         <td><a href="delete_feedback.php?id=<?php echo $id; ?>">Delete</a></td>
 
         
     </tr><?php } ?>
     </tbody>
 
 </table>
<?php
 }

 if(isset($_POST['approved_feedback'])) {

    
    ?> <table class="table">
 
     <!--Table Heads Example-->
     <thead>
     <th>User_id</th>
     <th>User_name</th>
     <th>Feedback</th>
     <th>delete</th>
     </thead><?php
     while ($row7 = $runquery7->fetch_assoc()){
 $id = $row7["id"];
 ?>
     <!--Table Body Example-->
     <tbody>
     <tr>
         <td><?= $row7['user_id']?></td>
         <td><?= $row7['user_name']?></td>
         <td><?= $row7['feedback']?></td>
         <td><a href="delete_feedback2.php?id=<?php echo $id; ?>">Delete</a></td>
 
         
     </tr><?php } ?>
     </tbody>
 
 </table>
<?php
 }

 if(isset($_POST['view_emp'])) {

    
    ?> <table class="table">
 
     <!--Table Heads Example-->
     <thead>
     <th>Name</th>
     <th>Department</th>
     <th>Position</th>
     <th>Delete</th>
     </thead><?php
     while ($row5 = $runquery5->fetch_assoc()){
 $id = $row5["id"];
 ?>
     <!--Table Body Example-->
     <tbody>
     <tr>
         <td><?= $row5['Name']?></td>
         <td><?= $row5['department']?></td>
         <td><?= $row5['position']?></td>
         <td><a href="delete_employee.php?id=<?php echo $id; ?>">Delete</a></td>
 
         
     </tr><?php } ?>
     </tbody>
 
 </table>
<?php
 }
?>

</section>

<!--FOOTER-->
<?php
include 'footer.php';
}else   header('location:admin_login.php');

?>
    </body>   
    </html>