<!doctype html>
<html lang="en">
<?php
session_start();
include("./config.php");
include("./functions/function.php");
?>
<head>
  <title>Shopie</title>
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
    <div class="container-fluid p-0">
         <?php
         include("header.php");
         ?>
<!-- Forth child -->
<div class="container mt-4">
<div class="row align-items-center">
    <h2 class="text-center text-info my-3">Shopping cart</h2>
    <form action="exce_cart.php" method="post">
<div class="col-md-12 ">
<?php
 $total_price=0;
 $ip = getIPAddress();
 $sql_cart="SELECT * FROM `cart_details` WHERE ip_address='$ip' ;";
 $result_cart=mysqli_query($con, $sql_cart);
 $count=mysqli_num_rows($result_cart);   
     if($count >0){
     echo '
     <table class="table table-bordered text-center " style="border:1px solid black;">
     <thead>
       <tr>
         <th style="width: 150px;">Product Id</th>
         <th style="width: 450px;">Product Name</th>
         <th style="width: 350px;">Quantity</th>
         <th style="width: 450px;">Product Image</th>
         <th style="width: 350px;">Product price</th>
         <th style="width: 450px;">Action</th>
       </tr>
     </thead>
     <tbody>';
     while($row_p=mysqli_fetch_assoc($result_cart)){
         
         $product_id=$row_p['product_id'];
         $quentity=$row_p['quentity'];
         $sql_select="SELECT * FROM `products` WHERE prod_id='$product_id';";
         $result_sel=mysqli_query($con,$sql_select);
        $data=mysqli_fetch_array($result_sel);
       
         $product_name=$data['prod_name'];
         $product_details=$data['prod_details'];
         $product_image1=$data['image1'];
         $product_name=$data['prod_name'];
         $product_price=$data['prod_price'];
         $product_total_price=array($data['prod_price']);
         $product_values=array_sum($product_total_price);
         $total_price+=$product_values;
         echo '
           <tr>
             <td>'. $product_id.'</td>
             <td>'. $product_name.'</td>
             <input class="text-center" type="hidden" name="product_id[]" value="'.$product_id.'" >
             <td><input class="text-center" type="number" name="quantity[]" value="'.$quentity.'" ></td>
             <td><img src="./product_images/'.$product_image1.'" width="50"; height="50"; alt="..."></td>
             <td>'.$product_price.'</td>
             </td>
             <td class="text-center"><button class="btn btn-danger" name="delete" type="button"><a href="delete_cart.php?prod_id='. $product_id.'" class="nav-link">Remove</a></button>
             </td>
           </tr>
        
           ';
        //    $price=$product_price* $quentity;
        // $total+=$price;
     }

     echo '</tbody>
     </table>
     ';
}else{
 echo'<h2 class="text-center text-danger">No products are not Available in cart.</h2>';
}
?>
</div>
</div>
</div>

<div class="text-center">
<h2 class="text-dark">Sub Total :<span class="text-danger">$ <?php totalPrice(); ?></span> <h5>
<div class="row mt-3">
<div class="col-md-12">
<input class="btn btn-primary" name="update" type="submit" value="Update">
<a href="index.php"><input class="btn btn-primary" name="goback" type="button" value="Continue Shopping"></a>
<a href="checkout.php"><input class="btn btn-secondary" name="checkout" type="button" value="Checkout"></a>
</div>
</div>
</div>
</div>
</form>
  <!-- Bootstrap JavaScript Libraries -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
    integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
  </script>
</body>
</html>