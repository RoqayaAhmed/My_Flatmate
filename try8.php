<?php
//session_start();
include 'conn.php';
global $conn;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form action="" enctype="multipart/form-data" method="POST">
<input multiple="" name="image[]" type="file" multiple />
<input name="submit" type="submit" value="Upload"/>
</form>
<?php
/*$query2="SELECT * FROM `images`";
$runquery2=mysqli_query($conn, $runquery2);
$rows=mysqli_num_rows($runquery2);
if ($rows > 0) {
    while ($fetch = mysqli_fetch_array($rows)) {
       ?>
       <img src="uploads/<?php echo $fetch['`image`']?>" width=100 height=100>
       <?php
    }
}*/
?>
</body>
</html>
<?php
if(isset($_POST["submit"])){
    $count = $_FILES['image']['name'];
    $imageCount= count($count);
   for($i=0; $i<$imageCount; $i++){
    $imageName= $_FILES['image']['name'][$i];
    $imageTmpName=$_FILES['image']['tmp_name'][$i];
    $targetPath="./img1/" . $imageName;
    if (move_uploaded_file($imageTmpName ,$targetPath )) {
       //$query="INSERT INTO 'images' ('image') VALUES ('$imageName');";
       $query="INSERT INTO `images`(`image`) VALUES ('$imageName')";
       $runquery=mysqli_query($conn , $query);
    }
   }if ($runquery) {
    echo "done babe";
    
   }
}