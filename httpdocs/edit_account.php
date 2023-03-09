<!doctype html>
<html lang="en">
<?php
session_start();
include("./config.php");
include("./functions/function.php");
// login check
if(!isset($_SESSION['userid'])){
  header("Location:login.php");
  }
?>
<head>
  <title>Shopie</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="style.css">
  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <!-- font awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" 
    integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <div class="container-fluid p-0">
    <?php 
    include("header.php");
    $sql_user = "SELECT * FROM `users` WHERE user_id=".$_SESSION['userid'];
    $result_user = mysqli_query($con, $sql_user);
    $count=mysqli_num_rows($result_user);  
    $row=mysqli_fetch_assoc($result_user);
    ?>
<!-- Forth child -->
<div class="container mx-auto ">
   <form action="edit_account.php" method="post" autocomplete="off">
   <div class="row mx-auto">
        <h4 class="text-center mt-5">Edit Account</h4>
        <div class="col-md-12">
        <div class="mb-3 w-50 mx-auto">
    <label for="email" class="form-label"><b>User Name</b></label>
    <input type="text" class="form-control" id="name" name="name" placeholder="Enter your name" value="<?php echo $row['user_name'];   ?>" maxlength="40" autocomplete="off" required>
  </div>
        <div class="mb-3 w-50 mx-auto">
    <label for="email" class="form-label"><b>Email</b></label>
    <input type="email" class="form-control" id="email" name="email" placeholder="Enter Email Address"maxlength="40" autocomplete="off" required value="<?php echo $row['user_email'];   ?>">
  </div>
  <!-- Product details
  <div class="mb-3 w-50 mx-auto">
    <label for="password" class="form-label"><b>Password</b></label>
    <input type="password" class="form-control" id="password" name="password" placeholder="Enter password" maxlength="20" autocomplete="off" required>
  </div> -->
  <div class="mb-3 w-50 mx-auto">
    <input type="submit" class="btn btn-primary" id="signup" name="signup" value=" Update Account">
    <a href="index.php"><input type="button" class="btn btn-danger" id="cancel" name="cancel" value="cancel"></a>
  </div>
        </div>
    </div>
   </form>
</div>

    </div>
  <!-- Bootstrap JavaScript Libraries -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
    integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
  </script>
</body>
<?php
if(isset($_POST['signup'])){
    if(isset($_SESSION['userid'])){
        $userid=$_SESSION['userid'];
    }
    $name=$_POST['name'];
    $email=$_POST['email'];
    $sql_user="UPDATE `users` SET `user_name`='$name',`user_email`='$email' WHERE user_id='$userid'";
    $result_user=mysqli_query($con, $sql_user);
    if($result_user){
        echo"<script>alert('User Updated sucessfully.');</script>";
        echo'<script>window.open("index.php", "_self");</script>';
    }

}




?>

</html>