<!doctype html>
<html lang="en">
<?php
session_start();
include("./config.php");
include("./functions/function.php");
//login check
if(!isset($_SESSION['userid'])){
    header("Location:login.php");
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
<div class="row  text-center">
<form action="order.php" method="post">
<div class="col-md-12">
    <h2 class="text-center text-info my-3">Payment Methods.</h2>
   
  <div class="row d-flex justify-content:center align-items-center">
  <div class="col-md-6">
        <a href="order.php" ><img src="images/onlinepay.png" width="500" ></a>
    </div>
    <div class="col-md-6">
       <button type="submit" class="btn btn-primary my-5" name="offline_payment" >Offline payment</button>
    </div>
  </div>

   <a href="cart.php"><button type="button" class="btn btn-secondary my-5">Go back</button></a>
</div>
</form>
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