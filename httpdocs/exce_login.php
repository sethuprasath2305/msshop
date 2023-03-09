<?php
include("config.php");
session_start();
if(isset($_POST['login'])){
    $email=$_POST['email'];
    $password=$_POST['password'];
    echo $email;
    echo $password;
    $sql_user = "SELECT * FROM `users` WHERE user_email='$email' AND pass='$password';";
    $result_user = mysqli_query($con, $sql_user);
    $count=mysqli_num_rows($result_user);  
    $row=mysqli_fetch_assoc($result_user);
            if($count == 1){
               $_SESSION['userid']=$row['user_id'];
               $_SESSION['user_status']=$row['user_status'];
               $_SESSION['user_name']=$row['user_name'];
               if($result_user){
                header("Location:index.php");
            }
            }else{
                    $msg="Login Failed!";
                    header("Location:login.php?msg=$msg");
            }

}




?>