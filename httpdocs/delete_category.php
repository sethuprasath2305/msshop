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
if(isset($_GET['cat_id'])){
    $cat_id=$_GET['cat_id'];
  }else{
    header("Location:view_categories.php");
  }
$sql_select="DELETE FROM `categories` WHERE cat_id=' $cat_id';";
$result_sel=mysqli_query($con,$sql_select);
if($result_sel){
    echo"<script>alert('Categorey deleted successfully!!.');</script>";
    header("location:view_categories.php");
}
?>