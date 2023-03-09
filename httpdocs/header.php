     <!-- First child -->
     <nav class="navbar navbar-expand-lg navbar-light bg-info ">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php"><img class="logo" src="./images/logo1.png"> Shopie</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link " aria-current="page" href="index.php">Products</a>
        </li>
        <?php if(isset($_SESSION['userid'])){
          echo'  <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            My Account
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="my_orders.php">My orders</a></li>
            <li><a class="dropdown-item" href="edit_account.php"> Edit Account</a></li>
          </ul>
        </li>';
        } ?>
         <?php if(!isset($_SESSION['userid'])){
          echo ' <li class="nav-item">
          <a class="nav-link " aria-current="page" href="registor.php">Registor</a></li>';
        } ?>
        <li class="nav-item">
          <a class="nav-link " aria-current="page" href="cart.php"><i class="fas fa-cart-shopping"></i><sup><?php cartItemscount(); ?></sup></a>
        </li>
        <li class="nav-item">
          <a class="nav-link " aria-current="page" href="#">Total Price : <span class="text-danger"> $ <?php totalPrice(); ?> </span></a>
        </li>
      </ul>
      <form class="d-flex" action="search_product.php" method="post">
        <input class="form-control me-2" type="search" name="search_prod" placeholder="Search" aria-label="Search">
        <button type="submit" class="btn btn-outline-light" name="search_prod_btn" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>

<!-- Second child -->
<nav class="navbar navbar-expand-lg navbar-dark bg-secondary ">
<ul class="navbar-nav me-auto mb-2 mb-lg-0 mx-4">
        <li class="nav-item">
        <a class="nav-link " aria-current="page" href="#">Welcome, <?php 
        if(isset($_SESSION['userid'])){
         $userid= $_SESSION['userid'];
        $sql_user = "SELECT * FROM `users` WHERE user_id=' $userid';";
    $result_user = mysqli_query($con, $sql_user);
    $count=mysqli_num_rows($result_user);  
    $row=mysqli_fetch_assoc($result_user);
      echo $row['user_name'];
        }else{
          echo "Guest";
        } ?></a>
        </li>
        <li class="nav-item">
        <?php
        if(isset($_SESSION['userid'])){
        
          echo '<a class="nav-link " aria-current="page" href="logout.php">Logout</a>';
        }else{
          echo '<a class="nav-link " aria-current="page" href="login.php">Login</a>';
        } ?>
        </li>
        <?php
        if(isset($_SESSION['user_status'])){
          if($_SESSION['user_status'] == 'Admin')
          echo '<li class="nav-item">
          <a class="nav-link " aria-current="page" href="admin.php">Administration</a>
          </li>';
        }
        // }else{
        //   echo '<li class="nav-item">
        //   <a class="nav-link " aria-current="page" href="logout.php">Logout</a>
        //   </li>';
        // } 


?>
</ul>
</nav>
<!-- third child -->
<div class="para text-center bg-light p-2">
<h4 >#Hidden store</h4>
<p>Stay home, and find your day to day life.</p>
</div>