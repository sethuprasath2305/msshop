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
<div class="container">
    <h4 class="text-center text-info my-3">View Orders</h4>
    <div class="row my-3">
       <div class="col-md-3">
       <form class="form-inline" action="" method="post">
    <div class="form-group">
      <select name="select_group" class="form-select">
        <option value="0">Select type</option>
        <option value="1">Order id</option>
        <option value="2">User id</option>
        <option value="3">Invoice no</option>
      </select>
    </div>
    </div>
    <div class="col-md-3">
    <div class="form-group">
      <input type="text" class="form-control" id="search" placeholder="Enter keyword" name="search" >
    </div>
    </div>
    <div class="col-md-3 mb-4">
    <div class="form-group">
      <input type="submit"  id="order_search" value="Search" name="order_search" onclick="changeStyle()" class="btn btn-info">
    </div>
    </div>
    </div>
    </form>
    <?php
if(isset($_POST['order_search'])){
$select_group=$_POST['select_group'];
$search=$_POST['search'];
if($select_group == 1){
    $sql_order="SELECT * FROM `orders` WHERE order_id='$search'";
    $result_order=mysqli_query($con,$sql_order);
}else if($select_group == 2){
    $sql_order="SELECT * FROM `orders` WHERE user_id='$search'";
    $result_order=mysqli_query($con,$sql_order);
}else if($select_group == 3){
    $sql_order="SELECT * FROM `orders` WHERE Invoice_no='$search'";
    $result_order=mysqli_query($con,$sql_order);
}
else {
    $sql_order="SELECT * FROM `orders` ORDER BY order_id DESC;";
    $result_order=mysqli_query($con,$sql_order);
}
    $count=mysqli_num_rows($result_order);  
    if($count >0){
echo '
<table class="table table-bordered text-center bg-secondary text-light">
<thead>
 
    <th style="width: 100px;">Order id</th>
    <th style="width: 150px;">Order Date</th>
    <th style="width: 100px;">User Id</th>
    <th style="width: 250px;">Invoice Number</th>
    <th style="width: 250px;">Products Quentity</th>
    <th style="width: 250px;">Amount Due</th>
    <th style="width: 250px;">Order Status</th>
    <th style="width: 350px;">Action</th>

</thead>
<tbody>';
while($row_p=mysqli_fetch_assoc($result_order)){
    $order_id=$row_p['order_id']; 
    $order_date=$row_p['order_date'];
    $amount_due=$row_p['amount_due']; 
    $invoice_no=$row_p['Invoice_no'];
    $order_products=$row_p['ordered_products']; 
    $order_status=$row_p['order_status'];
    $user_id=$row_p['user_id'];
    echo '
      <tr>
        <td>'. $order_id.'</td>
        <td>'.$order_date.'</td>
        <td>'.$user_id.'</td>
        <td>'.$invoice_no.'</td>
        <td>'. $order_products.'</td>
        <td>'.$amount_due.'</td>
        <td>'.$order_status.'</td>
        <td class="text-center"><a href="view_order_detail.php?order_id='.$order_id.'" class="nav-link"><button class="btn btn-primary" name="view" type="button">View</a></button>
        <button class="btn btn-danger" name="delete" type="button"><a href="delete_order.php?order_id='.$order_id.'" class="nav-link">Delete</a></button></td>
      </tr>';

}
echo '</tbody>
</table>';
}else{
echo'<p class="text-center text-danger">No records found...</p>';
}
}else{
vieworders();
}
    ?>
    <div class="col-md-3 my-3 mx-auto">
    <div class="form-group">
     <a href="admin.php"> <input type="button"  id="cancel" value="Go Back" name="cancel" class="btn btn-primary"></a>
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
  <script>
 function changeStyle(){
        var element = document.getElementById("order_list");
        element.style.display = "none";
    }
  </script>
</body>

</html>