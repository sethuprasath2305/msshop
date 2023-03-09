<?php
include("./config.php");
include("./functions/function.php");
session_start();
$ip = getIPAddress();
    $sql_cart="SELECT * FROM `cart_details` WHERE ip_address='$ip' ;";
    $result_cart=mysqli_query($con, $sql_cart);
    $count=mysqli_num_rows($result_cart);   
        if($count >0){
            header("Location:cart.php");
        }else{
unset($_SESSION["userid"]);
unset($_SESSION["user_name"]);
unset($_SESSION["user_status"]);
header("Location:login.php");
        }
?>