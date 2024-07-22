<?php
    session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Eipi Gmail Sender</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">

    <style>

        body{
    background-image: url("Bg-Style/gmail1.webp");
   background-repeat: no-repeat;
   background-size: 1875px 925px;
   background-size: cover;
   z-index: -1;
        }

        .container{
  
   border: 2px solid #f5f2f2;
   margin:10px auto;
   padding:40px;
   background: transparent;
   border-radius: 55px;
   width: 999px;
  
  
   
        }


    </style>

</head>
<body><br><br><br><br><br><br><br>
<div class="container">
    <h1 class="page-header text-center"><font color="black">Sending Email</font></h1>
    <div class="row">
        <div class="col-sm-4 col-sm-offset-4">
            <?php
                if(isset($_SESSION['message'])){
                    ?>
                    <div class="alert alert-info text-center">
                        <?php echo $_SESSION['message']; ?>
                    </div>
                    <?php
 
                    unset($_SESSION['message']);
                }
            ?>
            <form method="POST" action="send.php" enctype="multipart/form-data">
                <div class="form-group">
                    <label>Email:</label>
                    <input type="email" class="form-control" name="email" required>
                </div>
                <div class="form-group">
                    <label>Subject:</label>
                    <input type="text" class="form-control" name="subject" required>
                </div>
                <div class="form-group">
                    <label>Message:</label>
                    <textarea class="form-control" name="message" required></textarea>
                </div>
                <div class="form-group">
                    <label>Add Attachment:</label>
                    <input type="file" name="attachment" class="form-control" multiple enctype="multipart/form-data">
                   
                </div>
                <button type="submit" name="send" class="btn btn-primary">Send</button>
                <center><br><a href="user_page.php" class="btn"><font color="white">Home</font></a></center>
            </form>
        </div>
    </div>
</div>

</body>
</html>