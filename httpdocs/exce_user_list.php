<?php
session_start();
include("./config.php");
include("./functions/function.php");
// login check
if(!isset($_SESSION['userid'])){
  header("Location:login.php");
  }
  //Admin checking 
  if(isset($_SESSION['user_status'])){
    $user_status=$_SESSION['user_status'];
    if($user_status != "Admin"){
      header("Location:index.php");
    }

  }

  if(isset($_GET['user_id'])){
    $user_id=$_GET['user_id'];
  // echo $user_id;
  $sql_user = "SELECT * FROM `users` WHERE user_id='$user_id';";
  $result_user = mysqli_query($con, $sql_user);
  $count=mysqli_num_rows($result_user);  
  $row=mysqli_fetch_assoc($result_user);
  $user_name=$row['user_name'];
  $user_email=$row['user_email'];
  $user_status=$row['user_status'];
}
  ?>
 <!doctype html>
<html lang="en">
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
    ?>
<!-- Forth child -->

<div class="container mx-auto ">
   <form action="exce_user_list.php" method="post" autocomplete="off">
   <div class="row mx-auto">
        <h4 class="text-center mt-5">User Rights</h4>
        <div class="col-md-12">
        <div class="mb-3 w-50 mx-auto">
    <label for="email" class="form-label"><b>User Name</b></label>
    <input type="hidden" class="form-control" id="uid" name="uid" value="<?php echo $user_id; ?>" readonly autocomplete="off" required>
    <input type="text" class="form-control" id="uname" name="uname" value="<?php echo $user_name; ?>" readonly autocomplete="off" required>
  </div>
        <div class="mb-3 w-50 mx-auto">
    <label for="email" class="form-label"><b>Email</b></label>
    <input type="email" class="form-control" id="email" name="email" value="<?php echo $user_email; ?>" readonly placeholder="Enter Email Address" autocomplete="off" required>
  </div>
  <!-- Product details -->
  <div class="mb-3 w-50 mx-auto">
  <label for="email" class="form-label"><b>User Position</b></label>
    <select name="user_status"class="form-select">
      <option value="Guest" <?php if($user_status =="Guest"){ echo "selected";} ?>>Guest</option>
      <option value="Admin" <?php if($user_status =="Admin") { echo "selected";} ?>>Admin</option>
    </select>
  </div>
  <div class="mb-3 w-50 mx-auto">
    <input type="submit" class="btn btn-primary" id="update" name="update" value="Update">
    <a href="user_list.php"> <input type="button" class="btn btn-danger" id="Cancel" name="Cancel" value="Cancel"></a>
  </div>
        </div>
    </div>
   </form>
</div>
<?php
if(isset($_POST['update'])){
  $user_name=$_POST['uname'];
  $userid=$_POST['uid']; 
  $user_status=$_POST['user_status']; 
  echo $user_status;
 echo  $userid;
$sql="UPDATE `users` SET `user_status`='$user_status' WHERE user_id='$userid';";
$result_sel=mysqli_query($con,$sql);
if($result_sel){
    echo"<script>alert('user status updated successfully.');</script>";
    echo'<script>window.open("user_list.php", "_self");</script>';
    
}
 }
?>
    </div>
  <!-- Bootstrap JavaScript Libraries -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
    integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
  </script>
</body>

</html>