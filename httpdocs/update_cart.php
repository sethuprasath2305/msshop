<?php
include("./config.php");
include("./functions/function.php");

if(isset($_POST['update_cart'])){
  $quentity=$_POST['quantity'];
  echo  $quentity;
$ip = getIPAddress();
// if(isset($_GET['prod_id'])){
  $pid=$_POST['product_id'];
  echo $pid;


//   $sql_update_cart="UPDATE `cart_details` SET `quentity`='$quentity' WHERE ip_address='$ip' AND product_id='$pid';";
//   $result_update_cart=mysqli_query($con, $sql_update_cart);
  
//   $total=$total_price*$quentity;

//   if($result_update_cart){
//       echo"<script>alert('This product quentity updated Sucessfully.');</script>";
//       // echo'<script>window.open("cart_details.php", "_self");</script>';
//   }
}
// }
?>


