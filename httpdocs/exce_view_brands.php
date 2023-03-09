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
  //Admin checking 
  if(isset($_SESSION['user_status'])){
    $user_status=$_SESSION['user_status'];
    if($user_status != "Admin"){
      header("Location:index.php");
    }

  }
if(isset($_GET['brand_id'])){
  $brand_id=$_GET['brand_id'];
}else{
  header("Location:view_brands.php");
}
$sql="SELECT * FROM `brands` WHERE brand_id='$brand_id';";
$result_sel=mysqli_query($con,$sql);
    $data=mysqli_fetch_assoc($result_sel);
    $brand_id=$data['brand_id'];
    $brand_name=$data['brand_name'];
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
    <div class="container  ">
        <h4 class="text-center mt-4 mb-3">Update Brands</h4>
        <form action="" method="Post" >
            <!-- Product title -->
            <div class="mb-3 w-50 mx-auto">
    <label for="product_title" class="form-label"><b>Brand Name</b></label>
    <input type="text" class="form-control" id="brand_name" name="brand_name" placeholder="Enter Brand name" value="<?php echo $brand_name;?>" autocomplete="off" required>
  </div>
  <input type="hidden" class="form-control" name="brand_id" id="brand_id" value="<?php echo $brand_id;?>" >
  <button class="btn btn-primary" name="update" type="submit">Update Brands</button>
  <button class="btn btn-danger" name="cancel" type="button"><a href="admin.php" class="nav-link">Cancel</a></button>
        </form>
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
<?php
if(isset($_POST['update'])){
    $brand_name=$_POST['brand_name'];
    $brand_id=$_POST['brand_id'];
//insert query
$sql_query="UPDATE `brands` SET `brand_name`='$brand_name' WHERE brand_id='$brand_id';";
$result=mysqli_query($con,$sql_query);
if($result){
    echo"<script>alert('Brands updated sucessfully.');</script>";
    header("location:view_brands.php");
}
}
?>