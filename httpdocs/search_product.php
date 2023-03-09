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
         <!-- First child -->
     <?php
     include("header.php");

     ?>
<!-- Forth child -->
<div class="product-details">
    <div class="row p-4">
        <div class="col-md-10">
            <div class="row">
              <!-- method calling -->
              <?php
              searchproduct();
              ?>
            </div>
        </div>
        <div class="col-md-2 bg-secondary p-0">
            <ul class="navbar-nav me-auto p-0">
                <li class="nav-item bg-info text-light p-2">
                    <a href="#" class="nav-link">
                        <h4 class="text-center ">Delivery Brands</h4>
                    </a>
                </li>
                <?php 
                include("config.php");
                   $sql_brand1="SELECT * FROM `brands`;";
                   $result_brand1=mysqli_query($con,$sql_brand1);
                   while($data1=mysqli_fetch_assoc($result_brand1)){

                    $brand_id=$data1['brand_id'];
                ?>
                <li class="nav-item text-center text-light p-2">
                    <a href="index.php?brand_id=<?php echo $brand_id; ?>" class="nav-link">
                      <?php echo $data1['brand_name']; ?>
                    </a>
                </li>
                <?php
                   }
                ?>
            </ul>
            <!-- categeries displayed -->
            <ul class="navbar-nav me-auto p-0">
                <li class="nav-item bg-info text-light p-2">
                    <a href="index.php?catg_id=<?php echo $brand_id; ?>" class="nav-link">
                        <h4 class="text-center ">Delivery categeries</h4>
                    </a>
                </li>
                <?php 
                   $sql_select1="SELECT * FROM `categories`;";
                   $result_sel1=mysqli_query($con,$sql_select1);
                   while($data2=mysqli_fetch_assoc($result_sel1)){
                    $catg_id=$data2['cat_id'];

                
                ?>
                <li class="nav-item text-center text-light p-2">
                    <a href="index.php?catg_id=<?php echo $catg_id; ?>" class="nav-link">
                      <?php echo $data2['cat_name']; ?>
                    </a>
                </li>
                <?php
                   }
                ?>
            </ul>



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