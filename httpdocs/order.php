<?php
session_start();
include("./config.php");
include("./functions/function.php");
// login check
if(!isset($_SESSION['userid'])){
    header("Location:login.php");
    }
if(isset($_POST['offline_payment'])){
    $order_status="penting payment";
    $ip = getIPAddress();
    $sql_cart="SELECT * FROM `cart_details` WHERE ip_address='$ip' ;";
    $result_cart=mysqli_query($con, $sql_cart);
    $count=mysqli_num_rows($result_cart);  
    $user_id=$_SESSION['userid']; 
        if($count == 0){
            echo"<script>alert('No products are available in cart.');</script>";
        }else{
            $sub_amount=0;
            // for insert the products into orders table
            $sql_cart="SELECT * FROM `cart_details` WHERE ip_address='$ip' ;";
            $result_cart=mysqli_query($con, $sql_cart);
            $count=mysqli_num_rows($result_cart);
            $sql_p="SELECT MAX(order_id) AS id FROM `ordered_products_list`";
            $result_p=mysqli_query($con, $sql_p);
            $row_p=mysqli_fetch_assoc($result_p);
            $id=$row_p['id']+1;
           
            while( $row_p=mysqli_fetch_assoc($result_cart)){
            $product_id=$row_p['product_id'];
            $quantity=$row_p['quentity'];
            $sql_cart_prod="SELECT * FROM `products` WHERE prod_id='$product_id' ;";
            $result_cart_prod=mysqli_query($con, $sql_cart_prod);
            $row_pro=mysqli_fetch_assoc($result_cart_prod);
            $prod_price=$row_pro['prod_price'];
            $amount=$prod_price*$quantity;
             // Insert query for order_product_list
            
             $sql_oredr_prod="INSERT INTO `ordered_products_list`( `order_id`, `user_id`, `product_id`, `quantity`, `sub_amount`)
VALUES ('$id','$user_id',' $product_id','$quantity','$amount')";
            $result_oredr_prod=mysqli_query($con, $sql_oredr_prod);
            $sub_amount+=$amount;
            }
           
            $invoice_no=mt_rand();
           
            // Insert query for order table
            $sql_order="INSERT INTO `orders`(`order_id`, `user_id`, `Invoice_no`, `amount_due`, `order_date`, `ordered_products`, `order_status`) 
            VALUES ('','$user_id','$invoice_no','$sub_amount',now(),' $count',' $order_status')";
            $result_order=mysqli_query($con, $sql_order);
            //Delete the cart products from the cart_details table
            $sql_cart_del="DELETE FROM `cart_details` WHERE ip_address='$ip';";
            $result_cart_del=mysqli_query($con, $sql_cart_del);
            if($result_cart_del && $result_order){
                echo"<script>alert('Your order is placed.');</script>";
                echo'<script>window.open("checkout_message.php", "_self");</script>';
            }

        }
}else{
    $order_status="Conformed payment";
    $ip = getIPAddress();
    $sql_cart="SELECT * FROM `cart_details` WHERE ip_address='$ip' ;";
    $result_cart=mysqli_query($con, $sql_cart);
    $count=mysqli_num_rows($result_cart);  
    $user_id=$_SESSION['userid']; 
        if($count == 0){
            echo"<script>alert('No products are available in cart.');</script>";
        }else{
            $sub_amount=0;
            // for insert the products into orders table
            $sql_cart="SELECT * FROM `cart_details` WHERE ip_address='$ip' ;";
            $result_cart=mysqli_query($con, $sql_cart);
            $count=mysqli_num_rows($result_cart);
            $sql_p="SELECT MAX(order_id) AS id FROM `ordered_products_list`";
            $result_p=mysqli_query($con, $sql_p);
            $row_p=mysqli_fetch_assoc($result_p);
            $id=$row_p['id']+1;
           
            while( $row_p=mysqli_fetch_assoc($result_cart)){
            $product_id=$row_p['product_id'];
            $quantity=$row_p['quentity'];
            $sql_cart_prod="SELECT * FROM `products` WHERE prod_id='$product_id' ;";
            $result_cart_prod=mysqli_query($con, $sql_cart_prod);
            $row_pro=mysqli_fetch_assoc($result_cart_prod);
            $prod_price=$row_pro['prod_price'];
            $amount=$prod_price*$quantity;
             // Insert query for order_product_list
            
             $sql_oredr_prod="INSERT INTO `ordered_products_list`( `order_id`, `user_id`, `product_id`, `quantity`, `sub_amount`)
VALUES ('$id','$user_id',' $product_id','$quantity','$amount')";
            $result_oredr_prod=mysqli_query($con, $sql_oredr_prod);
            $sub_amount+=$amount;
            }
           
            $invoice_no=mt_rand();
           
            // Insert query for order table
            $sql_order="INSERT INTO `orders`(`order_id`, `user_id`, `Invoice_no`, `amount_due`, `order_date`, `ordered_products`, `order_status`) 
            VALUES ('','$user_id','$invoice_no','$sub_amount',now(),' $count',' $order_status')";
            $result_order=mysqli_query($con, $sql_order);
            //Delete the cart products from the cart_details table
            $sql_cart_del="DELETE FROM `cart_details` WHERE ip_address='$ip';";
            $result_cart_del=mysqli_query($con, $sql_cart_del);
            if($result_cart_del && $result_order){
                echo"<script>alert('Your order is placed.');</script>";
                echo'<script>window.open("checkout_message.php", "_self");</script>';
            }

        }
}




?>