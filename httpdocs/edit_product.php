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
if(isset($_GET['prod_id'])){
  $prod_id=$_GET['prod_id'];
}else{
  header("Location:view_product.php");
}
$sql="SELECT * FROM products WHERE prod_id='$prod_id';";
$result_sel=mysqli_query($con,$sql);
    $data=mysqli_fetch_assoc($result_sel);
        $product_name=$data['prod_name'];
        $product_details=$data['prod_details'];
        $product_image1=$data['image1'];
        $product_image2=$data['image2'];
        $product_image3=$data['image3'];
        $product_name=$data['prod_name'];
        $product_price=$data['prod_price'];
        $prod_id=$data['prod_id'];
        $cat_id=$data['cat_id'];
        $brand_id=$data['brand_id'];
        $prod_keywords=$data['prod_keywords'];
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
        <h4 class="text-center mt-4 mb-3">Update Products</h4>
        <form action="" method="Post" enctype="multipart/form-data">
            <!-- Product title -->
            <div class="mb-3 w-50 mx-auto">
    <label for="product_title" class="form-label"><b>Product Title</b></label>
    <input type="text" class="form-control" id="product_title" value="<?php echo $product_name ; ?>" maxlength="50" name="product_title" placeholder="Enter Product title" autocomplete="off" required>
  </div>
  <!-- Product details -->
  <div class="mb-3 w-50 mx-auto">
    <label for="product_title" class="form-label"><b>Product Details</b></label>
    <input type="text" class="form-control" id="product_details" value="<?php echo $product_details ; ?>" maxlength="100" name="product_details" placeholder="Enter Product details" autocomplete="off" required>
  </div>
  <!-- Product keywords -->
  <div class="mb-3 w-50 mx-auto">
    <label for="product_title" class="form-label"><b>Product Keywords</b></label>
    <input type="text" class="form-control" id="product_keywords" value="<?php echo $prod_keywords ; ?>" maxlength="150" name="product_keywords" placeholder="Enter Product keywords" autocomplete="off" required>
  </div>
  <!-- Select categery Name -->
  <div class="mb-3 w-50 mx-auto">
  <label for="brand_name" class="form-label"><b>Select Category Name</b></label>
    <select name="cat_name" id="cat_name" class="form-select">
        <option value="0">Select Category Name</option>
        <?php
         include("config.php");
 $sql_select="SELECT * FROM `categories`;";
 $result_sel2=mysqli_query($con,$sql_select);
 while($data2=mysqli_fetch_assoc($result_sel2)){


?>
<option value="<?php echo $data2['cat_id']; ?>" <?php if($data2['cat_id'] == $cat_id)  echo "selected";?>><?php echo $data2['cat_name']; ?></option>
<?php
 }
?>

    </select>
  </div>
    <!-- Select brand Name -->
    <div class="mb-3 w-50 mx-auto">
    <label for="brand_name" class="form-label"><b>Select brand Name</b></label>
    <select name="brand_name" id="brand_name" class="form-select">
        <option value="0">Select Brand Name</option>
        <?php
  $sql_brand="SELECT * FROM `brands`;";
  $result_brand=mysqli_query($con,$sql_brand);
  while($data1=mysqli_fetch_assoc($result_brand)){



?>
<option value="<?php echo $data['brand_id']; ?>" <?php if($data['brand_id'] == $brand_id)  echo "selected";?>><?php echo $data1['brand_name']; ?></option>
<?php
 }
?>
    </select>
  </div>
  <!-- image1 -->
  <div class=" mb-3 mx-auto w-50">
  <label for="product_img1" class="form-label"><b>Product Image 1</b></label>
  
  <div class="d-flex">
  <input type="file" class="form-control w-90 m-auto" id="product_img1" name="product_img1"  accept="image/png, image/gif, image/jpeg">
  <?php
  if(!empty($product_image1)){
    ?>
  <img src="./product_images/<?php echo $product_image1;  ?>" width="100" height="100" class="prod_img">
  <?php
}
?>
  </div>
</div>
<!-- Product Image 2 -->
<div class=" mb-3 mx-auto w-50">
  <label for="product_img2" class="form-label"><b>Product Image 2</b></label>
  <div class="d-flex">
  <input type="file" class="form-control w-90 m-auto" id="product_img2" name="product_img2"  accept="image/png, image/gif, image/jpeg">
  <?php
  if(!empty($product_image2)){
    ?>
  <img src="./product_images/<?php echo $product_image2;  ?>" width="100" height="100" class="prod_img">
  <?php
}
?>
</div>
</div>
<!-- Product Image 3 -->
<div class=" mb-3 mx-auto w-50">
  <label for="product_img3" class="form-label "><b>Product Image 3</b></label>
  <div class="d-flex">
  <input type="file" class="form-control w-90 m-auto" id="product_img3" name="product_img3"  accept="image/png, image/gif, image/jpeg">
  <?php
  if(!empty($product_image3)){
    ?>
  <img src="./product_images/<?php echo $product_image3;  ?>" width="100" height="100" class="prod_img">
  <?php
}
?>
</div>
</div>
 <!-- Product price -->
 <div class="mb-4 w-50 mx-auto">
    <label for="product_price" class="form-label"><b>Product Price</b></label>

    <input type="text" class="form-control" id="product_price" name="product_price" value="<?php echo $product_price ; ?>"placeholder="Enter Product price" autocomplete="off" required>
  </div>
  <div class="container text-center">
  <button class="btn btn-primary mb-3" name="save" type="submit">Update Product</button>
  <a href="view_product.php"><button class="btn btn-danger mb-3" name="cancel" type="button">Cancel</button></a>
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
 //  image extension checking
 $extension1 = pathinfo($product_img1, PATHINFO_EXTENSION);
 $extension2 = pathinfo($product_img2, PATHINFO_EXTENSION);
 $extension3 = pathinfo($product_img3, PATHINFO_EXTENSION);
 if($extension1=='jpg' || $extension1=='jpeg' || $extension1=='png' || $extension1=='gif' || $extension2=='jpg' || $extension2=='jpeg' || $extension2=='png' || $extension2=='gif'||$extension3=='jpg' || $extension3=='jpeg' || $extension3=='png' || $extension3=='gif')
{

// checking empty condition
if($prod_name ==' ' || $product_details==' ' || $product_keywords == ' ' || $product_price ==' ' || $cat_id==' ' || $brand_id==' '|| $product_img1=='' || $product_img2 ==' ' || $product_img3 ==' '){
 exit();
}else{
 move_uploaded_file($temp_img1,"./product_images/$product_img1");
 move_uploaded_file($temp_img2,"./product_images/$product_img2");
 move_uploaded_file($temp_img3,"./product_images/$product_img3");
}
//update query
$sql_query="UPDATE `products` SET `prod_name`='$product_name',`prod_details`='$product_details',`prod_keywords`='$prod_keywords',`cat_id`='$cat_id',
`brand_id`='$brand_id',`image1`='$product_img1',`image2`='$product_img2',`image3`='$product_img3',`prod_price`='$product_price' WHERE prod_id='$prod_id'";
$result=mysqli_query($con,$sql_query);
if($result){
 echo"<script>alert('Product Data Updaeted sucessfully.');</script>";
 echo'<script>window.open("edit_product.php", "_self");</script>';
}
}else{
echo"<script>alert('Please select Image only!!.');</script>";
}
}
?>