<!doctype html>
<html lang="en">
<?php
session_start();
include("./config.php");
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
?>
<head>
  <title>shopie</title>
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
<!-- Nav bar -->
  <div class="container-fluid p-0">
  <nav class="navbar navbar-expand-lg navbar-light bg-info ">
<div class="container p-0 ">
<a class="navbar-brand" href="index.php"><img class="logo" src="./images/logo1.png"> Shopie</a>
  <nav class="navbar navbar-expand-lg text-center">
    <ul class="navbar-nav">
    <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link " aria-current="page" href="index.php">Products</a>
        </li>
        <?php if(isset($_SESSION['userid'])){
          echo'  <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            My Account
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="my_orders.php">My orders</a></li>
            <li><a class="dropdown-item" href="edit_account.php"> Edit Account</a></li>
          </ul>
        </li>';
        } ?>
    </ul>
  </nav>
  </div>
</nav>
</div>
<h4 class="text-center my-3">Manage details</h4>
<!-- third child -->
<div class="row">
  <div class="col-md-12 bg-secondary p-3 d-flex align-items-center">
  <div class="col-md-2 text-center">
    <img src="./images/f7.jpeg " width="100" height="100" class="admin-logo  text-center">
    <p class="text-center text-light my-2">  <?php 
        if(isset($_SESSION['userid'])){
         $userid= $_SESSION['userid'];
        $sql_user = "SELECT * FROM `users` WHERE user_id=' $userid';";
    $result_user = mysqli_query($con, $sql_user);
    $count=mysqli_num_rows($result_user);  
    $row=mysqli_fetch_assoc($result_user);
      echo "Welcome, ". $row['user_name'];
        }else{
          echo "Guest";
        } ?></p>
    </div>
    <div class="button text-light text-center col-md-9">
      <div class="col-md-10 align-items-center mx-auto">
      <button class="btn btn-info mb-3 ml-3 "><a href="insert_product.php" class="nav-link text-light bg-info my-1 ">Insert Products</a></button>
      <button class="btn btn-info mb-3 ml-3 "><a href="view_product.php" class="nav-link text-light bg-info my-1">View Products</a></button>
      <button class="btn btn-info mb-3 ml-3 "> <a href="admin.php?insert_categories" class="nav-link text-light bg-info my-1">Insert Categories</a></button>
      <button class="btn btn-info mb-3 ml-3 "><a href="view_categories.php" class="nav-link text-light bg-info my-1">View Categories</a></button>
      <button class="btn btn-info mb-3 ml-3 "><a href="admin.php?insert_brands" class="nav-link text-light bg-info my-1">Insert Brands</a></button>
      <button class="btn btn-info mb-3 ml-3 "><a href="view_brands.php" class="nav-link text-light bg-info my-1">View Brands</a></button>
      <button class="btn btn-info mb-3 ml-3 "><a href="view_orders.php" class="nav-link text-light bg-info my-1">All orders</a></button>
      <button class="btn btn-info mb-3 ml-3 "><a href="user_list.php" class="nav-link text-light bg-info my-1">List users</a></button>
      <button class="btn btn-info mb-3 ml-3 "><a href="logout.php" class="nav-link text-light bg-info my-1">Logout</a></button>
      </div>
    </div>
  </div>
  
</div>
<div class="container my-5 text-center">
<?php
if(isset($_GET['insert_categories'])){
include("insert_categories.php");
}
if(isset($_GET['insert_brands'])){
  include("insert_brands.php");
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