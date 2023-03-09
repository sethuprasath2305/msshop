<?php
include("./config.php");
include("./functions/function.php");
session_start();
if(!isset($_SESSION['user_id'])){
header("Location:login.php");
}
  
if(isset($_GET['prod_id'])){
    $prod_id=$_GET['prod_id'];
  }else{
    header("Location:cart.php");
  }
  $ip = getIPAddress();
$sql_select="DELETE FROM `cart_details` WHERE  ip_address='$ip' and product_id='$prod_id';";
$result_sel=mysqli_query($con,$sql_select);
if($result_sel){
    echo"<script>alert('Deleted successfully!!.');</script>";
    header("location:cart.php");
}
?>