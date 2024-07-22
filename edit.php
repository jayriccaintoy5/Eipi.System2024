<?php
include "config.php";
$id = $_GET["id"];

if (isset($_POST["submit"])) {
  $name = $_POST['name'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $user_type = $_POST['user_type'];

  $sql = "UPDATE `user_form` SET `name`='$name',`email`='$email',`password`='$password',`user_type`='$user_type' WHERE id = $id";

  $result = mysqli_query($conn, $sql);

  if ($result) {
    header("Location: UserInfo.php?msg=Data updated successfully");
  } else {
    echo "Failed: " . mysqli_error($conn);
  }
}

?>




<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <title>User Information.</title>
</head>

<body>
  <nav class="navbar navbar-light justify-content-center fs-3 mb-5" style="background-color: #00ff5573;">
  User Information.
  </nav>

  <div class="container">
    <div class="text-center mb-4">
      <h3>Edit User Information</h3>
      <p class="text-muted">Click update after changing any information</p>
    </div>

    <?php
    $sql = "SELECT * FROM `user_form` WHERE id = $id LIMIT 1";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    ?>

    <div class="container d-flex justify-content-center">
      <form action="" method="post" style="width:50vw; min-width:300px;">
        <div class="row mb-3">
          <div class="col">
            <label class="form-label">Name:</label>
            <input type="text" class="form-control" name="name" value="<?php echo $row['name'] ?>">
          </div>

          <div class="col">
            <label class="form-label">Email:</label>
            <input type="text" class="form-control" name="email" value="<?php echo $row['email'] ?>">
          </div>
        </div>

        <div class="mb-3">
          <label class="form-label">password:</label>
          <input type="password" class="form-control" name="password" value="<?php echo $row['password'] ?>">
        </div>

        <div class="form-group mb-3">
          <label>user_type:</label>
          &nbsp;
          <input type="radio" class="form-check-input" name="user_type" id="admin_name" value="admin_name" <?php echo ($row["user_type"] == 'admin_name') ? "checked" : ""; ?>>
          <label for="admin_name" class="form-input-label">Admin</label>
          &nbsp;
          <input type="radio" class="form-check-input" name="user_type" id="user_name" value="user_name" <?php echo ($row["user_type"] == 'user_name') ? "checked" : ""; ?>>
          <label for="user_name" class="form-input-label">User</label>
        </div>

        <div>
          <button type="submit" class="btn btn-success" name="submit">Update</button>
          <a href="UserInfo.php" class="btn btn-danger">Cancel</a>
          <center><br><br><a href="UserInfo.php" class="btn">Home</a><br></center>
        </div>
      </form>
    </div>
  </div>

  <!-- Bootstrap -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

</body>

</html>