
<?php
session_start();

if (isset($_SESSION['id'])) {?>
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2> hiii bitch</h2>
    <form method="POST" action="test.php" >
    <input type="submit" value= "logout" name="logout" >
    <input type="submit" value= "update" name="update" >
    </form>
</body>
</html><?php
if (isset($_POST['update'])) {
    header('location:update.php');
}
if (isset($_POST['logout'])) {
    session_destroy();
    header('location:login.php');
}
}else
{
    header('location:login.php');
}
?>
