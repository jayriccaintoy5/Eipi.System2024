<?php

@include 'config.php';

session_start();

if(!isset($_SESSION['user_name'])){
   header('location:login_form.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>User Page</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body class="container">
   
<div class="container">

   <div class="content">
      <h3>Hi, <span>User</span></h3>
      <h1>welcome <span><?php echo $_SESSION['user_name'] ?></span></h1>
      <p>East Innovention Philippines Inc.<br>Dashboard</p>

    <center><h4><button class="btn" onclick="one();"><a href="SendingImage.php">Send Image</a></button></h4></center>
    <br>
    <center><h4><button class="btn" onclick="one();"><a href="TrackingLocation.html">Tracking Location</a></h4></button></center>
    
     <div id="map"></div>

      <br>
   
      <a href="logout.php" class="btn">logout</a>

   </div>
</div>



</body>
</html>