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
$sql_select="DELETE FROM `products` WHERE prod_id=' $prod_id';";
$result_sel=mysqli_query($con,$sql_select);
if($result_sel){
    echo"<script>alert('Deleted successfully!!.');</script>";
    header("location:view_product.php");
}
?>