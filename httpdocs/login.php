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

<div class="container mx-auto ">
   <form action="exce_login.php" method="post">
   <div class="row mx-auto">
        <h4 class="text-center mt-5">Login form</h4>
        <div class="col-md-12">

        <div class="mb-3 w-50 mx-auto">
        <?php
if(isset($_GET['msg'])){
  $msg=$_GET['msg'];
  ?>
  <div class="alert alert-danger p-2 text-center" role="alert">
  <?php echo $msg;  ?>
</div>
  <?php
}
?>
    <label for="email" class="form-label"><b>Email</b></label>
    <input type="email" class="form-control" id="email" name="email" placeholder="Enter Email Address" autocomplete="off" required>
  </div>
  <!-- Product details -->
  <div class="mb-3 w-50 mx-auto">
    <label for="password" class="form-label"><b>Password</b></label>
    <input type="password" class="form-control" id="password" name="password" placeholder="Enter password" autocomplete="off" required>
  </div>
  <div class="mb-3 w-50 mx-auto">
    <input type="submit" class="btn btn-primary" id="login" name="login" value="Login">
  </div>
  <div class="mb-3 w-50 mx-auto">
    <p>You dont have an Account ? <a href="registor.php">Registor</a></p>
  </div>
        </div>
    </div>
   </form>
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