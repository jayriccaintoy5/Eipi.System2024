<?php

@include 'config.php';

session_start();

if(!isset($_SESSION['admin_name'])){
   header('location:login_form.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Admin Page</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body class="container">
   
<div class="container">

   <div class="content">
      <h3>Hi, <span>Admin</span></h3>
      <h1>welcome <span><?php echo $_SESSION['admin_name'] ?></span></h1>
      <p>East Innovention Philippines Inc.<br>Dashboard</p>

      <center><h4><button class="btn" onclick="one();"><a href="">User Monitoring</a></button></h4></center>
    <br>
    <center><h4><button class="btn" onclick="one();"><a href="UserInfo.php">Setting</a></h4></button></center><br>


      <a href="logout.php" class="btn">logout</a>
   </div>

</div>

</body>
</html>