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
  <title>shopie</title>
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
<!-- Nav bar -->
  <div class="container-fluid p-0">
  <nav class="navbar navbar-expand-lg navbar-light bg-info ">
<div class="container-fluid p-0">
<a class="navbar-brand" href=""><img class="logo" src="./images/logo1.png">Shopie</a>
  <nav class="navbar navbar-expand-lg">
    <ul class="navbar-nav">
    <li class="nav-item">
        <a href="" class="nav-link">Welcome, <?php if(isset($_SESSION['user_name'])){
          echo $_SESSION['user_name'];
        }else{
          echo "Guest";
        } ?></a>
      </li>
    </ul>
  </nav>
  </div>
</nav>
</div>
<h4 class="text-center text-dark my-3">User list</h4>
<div class="container-fluid">
<form action="" method="post">
<div class="container">
<div class="row">
    <div class="col-md-12">
      <?php
    $sql_user="SELECT * FROM `users` ORDER BY user_id DESC;";
    $result_user=mysqli_query($con,$sql_user);
    $count=mysqli_num_rows($result_user);  
    if($count >0){
      ?>
        <table class="table table-bordered text-center" style="border:1px solid black;">
        <thead>
         
            <th style="width: 100px;">user id</th>
            <th style="width: 450px;">user Name</th>
            <th style="width: 450px;">user Email</th>
            <th style="width: 450px;">user status</th>
            <th style="width: 350px;">Action</th>
         
        </thead>
        <tbody>
          <?php
        while($row_p=mysqli_fetch_assoc($result_user)){
            $userid=$row_p['user_id'];
                    $user_name=$row_p['user_name'];
                    $user_email=$row_p['user_email'];
                    $user_status=$row_p['user_status'];
                    
          ?>
              <tr>
                <td><?php echo $userid ; ?><input type="hidden" name="userid" value="<?php echo $userid ;?>"></td>
                <td><?php echo $user_name; ?></td>
                <td> <?php echo $user_email; ?></td>
                <td><?php echo $user_status; ?>
                </td>
                <td class="text-center"><button class="btn btn-success" name="edit" type="button"><a href="exce_user_list.php?user_id=<?php echo $userid ;?>" class="nav-link">Edit</a></button></button>
                <button class="btn btn-danger" name="delete" type="button"><a href="user_list.php?user_id=<?php echo $userid ;?>" class="nav-link">Delete</a></button></td>
              </tr>

       
      </tbody>
   
   <?php
         }
}else{
    echo'<h2 class="text-center text-danger">No Records...</h2>';
}
?>
 </tbody></table>
        <button class="btn btn-danger text-center" name="cancel" type="button"><a href="admin.php" class="nav-link">Cancel</a></button>
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

<?php
if(isset($_GET['user_id'])){
    $user_id=$_GET['user_id'];
  echo $user_id;
$sql_select="DELETE FROM `users` WHERE   user_id='$user_id';";
$result_sel=mysqli_query($con,$sql_select);
if($result_sel){
    echo"<script>alert('Deleted successfully!!.');</script>";
    echo'<script>window.open("user_list.php", "_self");</script>';
}
}

?>
</html>