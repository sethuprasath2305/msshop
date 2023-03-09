<form action="" method="post">
    <h4 class="my-3 text-center bg-info text-light col-md-6 p-2 mx-auto">Insert Categories</h4>
<div class="input-group w-50 mb-3 mx-auto">
  <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-receipt"></i></span>
  <input type="text" class="form-control" placeholder="Insert categories" name="insert_categories">
</div>
<button type="submit" name="insert_categ" class="btn-info btn text-center">Insert Categories</button>
<a href="admin.php"><button type="submit" name="cancel" class="btn-danger btn text-center">Cancel</button></a>
</form>
<?php
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


if(isset($_POST['insert_categ'])){
    $catgory_name=$_POST['insert_categories'];
    //select query for prevent the duplicate categories.
    $sql_select="SELECT * FROM `categories` WHERE cat_name='$catgory_name';";
    $result_sel=mysqli_query($con,$sql_select);
    $count=mysqli_num_rows($result_sel);
    if($count>0){
        echo"<script>alert('Category Name is already precent');</script>";
    }else{
        $sql_ins="INSERT INTO `categories`(`cat_id`, `cat_name`) VALUES ('','$catgory_name')";
        $result_ins=mysqli_query($con,$sql_ins);
        if($result_ins){
        echo"<script>alert('Category Name is added sucessfully');</script>";

        }
    }
}


?>