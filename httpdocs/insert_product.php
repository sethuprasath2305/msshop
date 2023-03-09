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
        <h4 class="text-center mt-4 mb-3">Insert Products</h4>
        <form action="insert_product.php" method="Post" enctype="multipart/form-data">
            <!-- Product title -->
            <div class="mb-3 w-50 mx-auto">
    <label for="product_title" class="form-label"><b>Product Title</b></label>
    <input type="text" class="form-control" id="product_title" name="product_title" placeholder="Enter Product title" autocomplete="off" required>
  </div>
  <!-- Product details -->
  <div class="mb-3 w-50 mx-auto">
    <label for="product_title" class="form-label"><b>Product Details</b></label>
    <input type="text" class="form-control" id="product_details" name="product_details" placeholder="Enter Product details" autocomplete="off" required>
  </div>
  <!-- Product keywords -->
  <div class="mb-3 w-50 mx-auto">
    <label for="product_title" class="form-label"><b>Product Keywords</b></label>
    <input type="text" class="form-control" id="product_keywords" name="product_keywords" placeholder="Enter Product keywords" autocomplete="off" required>
  </div>
  <!-- Select categery Name -->
  <div class="mb-3 w-50 mx-auto">
    <select name="cat_name" id="cat_name" class="form-select">
        <option value="0">Select Category Name</option>
        <?php
        

 $sql_select="SELECT * FROM `categories`;";
 $result_sel=mysqli_query($con,$sql_select);
 while($data=mysqli_fetch_assoc($result_sel)){


?>
<option value="<?php echo $data['cat_id']; ?>"><?php echo $data['cat_name']; ?></option>
<?php
 }
?>

    </select>
  </div>
    <!-- Select brand Name -->
    <div class="mb-3 w-50 mx-auto">
    <select name="brand_name" id="brand_name" class="form-select">
        <option value="0">Select Brand Name</option>
        <?php
  $sql_brand="SELECT * FROM `brands`;";
  $result_brand=mysqli_query($con,$sql_brand);
  while($data1=mysqli_fetch_assoc($result_brand)){



?>
<option value="<?php echo $data1['brand_id']; ?>"><?php echo $data1['brand_name']; ?></option>
<?php
 }
?>
    </select>
  </div>
  <?php if(!empty($response)) { ?>
<div class="response <?php echo $response["type"]; ?>
    ">
    <?php echo $response["message"]; ?>
</div>
<?php }?>
   <!-- image1 -->
   <div class=" mb-3 mx-auto w-50">
  <label for="product_img1" class="form-label"><b>Product Image 1</b></label>
  
  <div class="d-flex">
  <input type="file" class="form-control w-90 m-auto" id="product_img1" name="product_img1" accept="image/png, image/gif, image/jpeg">
  </div>
</div>
<!-- Product Image 2 -->
<div class=" mb-3 mx-auto w-50">
  <label for="product_img2" class="form-label"><b>Product Image 2</b></label>
  <div class="d-flex">
  <input type="file" class="form-control w-90 m-auto" id="product_img2" name="product_img2" accept="image/png, image/gif, image/jpeg">
</div>
</div>
<!-- Product Image 3 -->
<div class=" mb-3 mx-auto w-50">
  <label for="product_img3" class="form-label "><b>Product Image 3</b></label>
  <div class="d-flex">
  <input type="file" class="form-control w-90 m-auto" id="product_img3" name="product_img3" accept="image/png, image/gif, image/jpeg" >
</div>
</div>
 <!-- Product price -->
 <div class="mb-4 w-50 mx-auto">
    <label for="product_price" class="form-label"><b>Product Price</b></label>
    <input type="text" class="form-control" id="product_price" name="product_price" placeholder="Enter Product price" autocomplete="off" required>
  </div>
  <div class="mb-3 w-50 mx-auto">
  <button class="btn btn-primary" name="save" type="submit">Insert Product</button>
  <button class="btn btn-danger" name="cancel" type="button"><a href="admin.php" class="nav-link">Cancel</a></button>
  </div>
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
include("config.php");
if(isset($_POST['save'])){
    $prod_name=$_POST['product_title'];
    $product_details=$_POST['product_details'];
    $product_keywords=$_POST['product_keywords'];
    $cat_id=$_POST['cat_name'];
    $brand_id=$_POST['brand_name'];
    $product_price=$_POST['product_price'];
       // accessing images
       $product_img1=$_FILES['product_img1']['name'];
       $product_img2=$_FILES['product_img2']['name'];
       $product_img3=$_FILES['product_img3']['name'];
        // accessing temp images
        $temp_img1=$_FILES['product_img1']['tmp_name'];
        $temp_img2=$_FILES['product_img2']['tmp_name'];
        $temp_img3=$_FILES['product_img3']['tmp_name'];
        // checking empty condition
if($prod_name ==' ' || $product_details==' ' || $product_keywords == ' ' || $product_price ==' ' || $cat_id==' ' || $brand_id==' '|| $product_img1=='' || $product_img2 ==' ' || $product_img3 ==' '){
  exit();
 }else{
  move_uploaded_file($temp_img1,"./product_images/$product_img1");
  move_uploaded_file($temp_img2,"./product_images/$product_img2");
  move_uploaded_file($temp_img3,"./product_images/$product_img3");
 }
//insert query
$sql_query="INSERT INTO `products`(`prod_id`, `prod_name`,`prod_details`,  `prod_keywords`, `cat_id`, `brand_id`, `image1`, `image2`, `image3`, `prod_price`) 
VALUES ('','$prod_name','$product_details','$product_keywords','$cat_id','$brand_id','$product_img1','$product_img2','$product_img3','$product_price')";
$result=mysqli_query($con,$sql_query);
if($result){
    echo"<script>alert('Product Data inserted sucessfully.');</script>";
}
}
?>