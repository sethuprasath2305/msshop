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
  // //Admin checking 
  // if(isset($_SESSION['user_status'])){
  //   $user_status=$_SESSION['user_status'];
  //   if($user_status != "Admin"){
  //     header("Location:index.php");
  //   }

  // }
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
<div class="container text-center mx-auto">
    <div class="row my-4 text-center mx-auto">
        <div class="col-md-12">
            <?php
            if(isset($_GET['order_id'])){
              $order_id=$_GET['order_id'];
            }
            $sql_order="SELECT * FROM `ordered_products_list` WHERE order_id='$order_id';";
            $result_order=mysqli_query($con,$sql_order);
            $count=mysqli_num_rows($result_order);  
            if($count >0){
                echo '
                <h4 class="my-3 text-center text-info">View Order Product Details</h4>
                <table class="table table-bordered text-center bg-secondary text-light">
                <thead>
                    <th style="width: 100px;">Product id</th>
                    <th style="width: 150px;">Product image</th>
                    <th style="width: 150px;">Product Quantity</th>
                    <th style="width: 100px;">Product Price</th>
                </thead>
                <tbody>';
                while($row_p=mysqli_fetch_assoc($result_order)){
                    $product_id=$row_p['product_id']; 
                    $quantity=$row_p['quantity'];
                    $sub_amount=$row_p['sub_amount'];
                    $sql_order_p="SELECT * FROM `products` WHERE prod_id='$product_id';";
            $result_order_p=mysqli_query($con,$sql_order_p);
            $row_pic=mysqli_fetch_assoc($result_order_p);
            $imge=$row_pic['image1'];
                    echo '
                      <tr>
                        <td>'.  $product_id.'</td>
                        <td><img src="./product_images/'.$imge.'" width="70" height="70"></td>
                        <td>'.$quantity.'</td>
                        <td>'.$sub_amount.'</td>
        
                      </tr>';
        
                }
                echo '</tbody>
                </table>';
              }else{
                echo'<p class="my-3 text-center text-danger"> Products not available in the cart!';
              }
            ?>
        </div>
    </div>
    <div class="row text-center">
        <div class="col-md-12 mb-4">
        <a href="view_orders.php"><input class="btn btn-primary" name="goback" type="button" value="Go Back"></a>
        </div>
    </div>
</div>

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