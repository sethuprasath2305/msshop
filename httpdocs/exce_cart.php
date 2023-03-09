<?php
session_start();
include("./config.php");
include("./functions/function.php");
if(isset($_POST['update'])){
    $pid = $_POST['product_id'];
$quan = $_POST['quantity'];
$ip = getIPAddress();
foreach($pid as $index => $details)
{
        $product_id=$pid[$index];
        $quentity=$quan[$index];
        $sql_update_cart="UPDATE `cart_details` SET `quentity`='$quentity' WHERE ip_address='$ip' AND product_id='$product_id';";
  $result_update_cart=mysqli_query($con, $sql_update_cart);
  if($result_update_cart){
          echo"<script>alert('This product quentity updated Sucessfully.');</script>";
          echo'<script>window.open("cart.php", "_self");</script>';
     }
}

}


?>