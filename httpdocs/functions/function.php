<?php
include("./config.php");
// Fetch the products from products table
function getProducts(){
    global $con;
    if(!isset($_GET['catg_id']) ){
        if(!isset($_GET['brand_id'])){
    $sql_select="SELECT * FROM `products` ORDER BY prod_name ASC;";
    $result_sel=mysqli_query($con,$sql_select);
    while($data=mysqli_fetch_assoc($result_sel)){
        $product_name=$data['prod_name'];
        $product_details=$data['prod_details'];
        $product_image1=$data['image1'];
        $product_name=$data['prod_name'];
        $product_price=$data['prod_price'];
        $prod_id=$data['prod_id'];
        echo '<div class="col-md-3 m-2 ">
        <div class="card mb-2 h-100" >
<img src="./product_images/'.$product_image1.'" class="card-img-top" alt="...">
<div class="card-body">
<h5 class="card-title text-center">'.$product_name.'</h5>
<p class="card-text">'.$product_details.'</p>
<p class="card-text">Price Rs.<span class="text-danger">'.$product_price.'/-</span></p>
<a href="index.php?add_to_cart='.$prod_id.'" class="btn btn-primary">Add cart</a>
<a href="sub_product_view.php?prod_id='.$prod_id.'" class="btn btn-secondary">View More</a></div></div> </div>    ';
}
    }}
}
// Fetch the Unique category
function getUniqueCategory(){
    global $con;
    if(isset($_GET['catg_id'])){
        $categ_id=$_GET['catg_id'];
        $sql_cat="SELECT * FROM `products` WHERE cat_id='$categ_id' ORDER BY prod_name ASC;";
        $result_cat=mysqli_query($con,$sql_cat);
        $rowcount=mysqli_num_rows($result_cat);
        if($rowcount == 0){
            echo '<h2 class="text-danger text-center">No Stock available in this Category</h2>';
        }else{
            while($res=mysqli_fetch_assoc($result_cat)){
                $product_name=$res['prod_name'];
                $product_details=$res['prod_details'];
                $product_image1=$res['image1'];
                $product_name=$res['prod_name'];
                $product_price=$res['prod_price'];
                $prod_id=$res['prod_id'];
                echo '<div class="col-md-4">
                <div class="card mb-2" >
        <img src="./product_images/'.$product_image1.'" class="card-img-top" alt="...">
        <div class="card-body">
        <h5 class="card-title text-center">'.$product_name.'</h5>
        <p class="card-text">'.$product_details.'</p>
        <p class="card-text">Price Rs.<span class="text-danger">'.$product_price.'/-</span></p>
        <a href="index.php?add_to_cart='.$prod_id.'" class="btn btn-primary">Add cart</a>
        <a href="sub_product_view.php?prod_id='.$prod_id.'" class="btn btn-secondary">View More</a></div></div> </div>';
        }
        }
    }
}
// Fetch the Unique Brand
function getUniquebrand(){
    if(isset($_GET['brand_id'])){
        global $con;
        $brand_id=$_GET['brand_id'];
        $sql_brand="SELECT * FROM `products` WHERE brand_id='$brand_id' ORDER BY prod_name ASC;";
        $result_brand=mysqli_query($con,$sql_brand);
        $rowcount1=mysqli_num_rows($result_brand);
        if($rowcount1 == 0){
            echo '<h2 class="text-danger text-center">!sorry , No Stock available in this Brand</h2>';
        }else{
            while($row=mysqli_fetch_assoc($result_brand)){
                $product_name=$row['prod_name'];
                $product_details=$row['prod_details'];
                $product_image1=$row['image1'];
                $product_name=$row['prod_name'];
                $product_price=$row['prod_price'];
                $prod_id=$row['prod_id'];
                echo '<div class="col-md-4">
                <div class="card mb-2" >
        <img src="./product_images/'.$product_image1.'" class="card-img-top" alt="...">
        <div class="card-body">
        <h5 class="card-title text-center">'.$product_name.'</h5>
        <p class="card-text">'.$product_details.'</p>
        <p class="card-text">Price Rs.<span class="text-danger">'.$product_price.'/-</span></p>
        <a href="index.php?add_to_cart='.$prod_id.'" class="btn btn-primary">Add cart</a>
        <a href="sub_product_view.php?prod_id='.$prod_id.'" class="btn btn-secondary">View More</a></div></div> </div>';
        }
        }
    }
}
// Product displaying

function prodView(){
    if(isset($_GET['prod_id'])){
        global $con;
        $pid=$_GET['prod_id'];
        $sql_select="SELECT * FROM `products` WHERE prod_id='$pid' ORDER BY prod_name ASC;";
        $result_sel=mysqli_query($con,$sql_select);
       $data=mysqli_fetch_assoc($result_sel);
            $product_name=$data['prod_name'];
            $product_details=$data['prod_details'];
            $product_image1=$data['image1'];
            $product_name=$data['prod_name'];
            $product_price=$data['prod_price'];
            $prod_id=$data['prod_id'];
            echo '<div class="col-md-4">
            <div class="card mb-2" >
    <img src="./product_images/'.$product_image1.'" class="card-img-top" alt="...">
    <div class="card-body">
    <h5 class="card-title text-center">'.$product_name.'</h5>
    <p class="card-text">'.$product_details.'</p>
    <p class="card-text">Price Rs.<span class="text-danger">'.$product_price.'/-</span></p>
    <a href="index.php?add_to_cart='.$prod_id.'" class="btn btn-primary">Add cart</a>
    <a href="index.php" class="btn btn-secondary">Go Back</a></div></div> </div>    ';
    }
        }
        function prodViewImg(){
            if(isset($_GET['prod_id'])){
                global $con;
                $pid=$_GET['prod_id'];
                $sql_select="SELECT image2,image3 FROM `products` WHERE prod_id='$pid';";
                $result_sel=mysqli_query($con,$sql_select);
               $data=mysqli_fetch_assoc($result_sel);
               $rowcountimg=mysqli_num_rows($result_sel);  
                    $product_image2=$data['image2'];
                    $product_image3=$data['image3'];
                    if(empty($product_image2) && empty($product_image3)){
                    echo'<h4 class="text-center text-info">No more Images..</h4>';
            }else{
                echo '  
          <div class="row text-center">
          <div class="col-md-6">
          <img src="./product_images/'.$product_image2.'" alt="...">
          </div>
          <div class="col-md-6">
          <img src="./product_images/'.$product_image3.'"  alt="...">
          </div>
          </div> 
              ';
            }
                }
            }
            // For search the products

            function searchproduct(){
                if(isset($_POST['search_prod_btn'])){
                    global $con;
                    $search_prod=$_POST['search_prod'];
                    $sql_search="SELECT * FROM `products` WHERE prod_keywords LIKE '%$search_prod%';";
                    $result_search=mysqli_query($con,$sql_search);
                   $count=mysqli_num_rows($result_search);  
                        if($count >0){
                            while($row=mysqli_fetch_assoc($result_search)){
                                $product_name=$row['prod_name'];
                                $product_details=$row['prod_details'];
                                $product_image1=$row['image1'];
                                $product_name=$row['prod_name'];
                                $product_price=$row['prod_price'];
                                $prod_id=$row['prod_id'];
                                echo '<div class="col-md-4">
                                <div class="card mb-2" >
                        <img src="./product_images/'.$product_image1.'" class="card-img-top" alt="...">
                        <div class="card-body">
                        <h5 class="card-title text-center">'.$product_name.'</h5>
                        <p class="card-text">'.$product_details.'</p>
                        <p class="card-text">Price Rs.<span class="text-danger">'.$product_price.'/-</span></p>
                        <a href="index.php?add_to_cart='.$prod_id.'" class="btn btn-primary">Add cart</a>
                        <a href="sub_product_view.php?prod_id='.$prod_id.'" class="btn btn-secondary">View More</a></div></div> </div>';
                            }
                        }else{
                                echo'<h4 class="text-center text-danger mt-3">There is no products...</h4>';
                            }

                        }
                    }
// For view products
            function viewProducts(){
                global $con;
                $sql_prod="SELECT * FROM `products` ORDER BY prod_id DESC;";
                $result_prod=mysqli_query($con,$sql_prod);
                $count=mysqli_num_rows($result_prod);  
                if($count >0){
                    echo '
                    <p>Product Count : <span class="text-danger"><b>'.$count.'</b></span></p>
                    <table class="table table-bordered " style="border:1px solid black;">
                    <thead>
                    
                        <th style="width: 100px;">Product id</th>
                        <th style="width: 200px;">Product Name</th>
                        <th style="width: 450px;">Product Description</th>
                        <th style="width: 100px;">Product Price</th>
                        <th style="width: 150px;">Product image</th>
                        <th style="width: 150px;">Operations</th>
                   
                    </thead>
                    <tbody>';
                    while($row_p=mysqli_fetch_assoc($result_prod)){
                        $product_name=$row_p['prod_name'];
                                $product_details=$row_p['prod_details'];
                                $product_image1=$row_p['image1'];
                                $product_name=$row_p['prod_name'];
                                $product_price=$row_p['prod_price'];
                                $prod_id=$row_p['prod_id'];
                        echo '
                          <tr>
                            <td>'.$prod_id.'</td>
                            <td>'.$product_name.'</td>
                            <td>'.$product_details.'</td>
                            <td>'.$product_price.'</td>
                            <td><img src="./product_images/'.$product_image1.'" width="100"; height="100"; alt="..."></td>
                            <td class="text-center"><button class="btn btn-success" name="edit" type="button"><a href="edit_product.php?prod_id='.$prod_id.'" class="nav-link">Edit</a></button>
                            <button class="btn btn-danger" name="delete" type="button"><a href="delete_product.php?prod_id='.$prod_id.'" class="nav-link">Delete</a></button></td>
                          </tr>';

                    }
                    echo '</tbody>
                    </table>';
            }
        }
        // For view Category
        function viewCategories(){
            global $con;
            $sql_prod="SELECT * FROM `categories` ORDER BY cat_id DESC;";
            $result_prod=mysqli_query($con,$sql_prod);
            $count=mysqli_num_rows($result_prod);  
            if($count >0){
                echo '
                <table class="table table-bordered text-center" style="border:1px solid black;">
                <thead>
                
                    <th style="width: 100px;">Category id</th>
                    <th style="width: 450px;">Category Name</th>
                    <th style="width: 350px;">Choose one</th>
                 
                </thead>
                <tbody>';
                while($row_p=mysqli_fetch_assoc($result_prod)){
                    $cat_id=$row_p['cat_id'];
                            $cat_name=$row_p['cat_name'];
                            
                    echo '
                      <tr>
                        <td>'. $cat_id.'</td>
                        <td>'.$cat_name.'</td>
                        <td class="text-center"><button class="btn btn-success" name="edit" type="button"><a href="exce_view_categories.php?cat_id='.$cat_id.'" class="nav-link">Edit</a></button>
                        <button class="btn btn-danger" name="delete" type="button"><a href="delete_category.php?cat_id='.$cat_id.'" class="nav-link">Delete</a></button></td>
                      </tr>';

                }
                echo '</tbody>
                </table>';
        }else{
            echo'<h2 class="text-center text-danger">No categories are Available.</h2>';
        }
    }
    // For view brands
    function viewBrands(){
        global $con;
        $sql_prod="SELECT * FROM `brands` ORDER BY brand_id DESC;";
        $result_prod=mysqli_query($con,$sql_prod);
        $count=mysqli_num_rows($result_prod);  
        if($count >0){
            echo '
            <table class="table table-bordered text-center" style="border:1px solid black;">
            <thead>
              <tr>
                <th style="width: 100px;">Brand id</th>
                <th style="width: 450px;">Brand Name</th>
                <th style="width: 350px;">Choose one</th>
              </tr>
            </thead>
            <tbody>';
            while($row_p=mysqli_fetch_assoc($result_prod)){
                $brand_id=$row_p['brand_id'];
                        $brand_name=$row_p['brand_name'];
                        
                echo '
                  <tr>
                    <td>'. $brand_id.'</td>
                    <td>'.$brand_name.'</td>
                    <td class="text-center"><button class="btn btn-success" name="edit" type="button"><a href="exce_view_brand.php?brand_id='.$brand_id.'" class="nav-link">Edit</a></button>
                    <button class="btn btn-danger" name="delete" type="button"><a href="delete_brand.php?brand_id='.$brand_id.'" class="nav-link">Delete</a></button></td>
                  </tr>';

            }
            echo '</tbody>
            </table>';
    }else{
        echo'<h2 class="text-center text-danger">No categories are Available.</h2>';
    }
}
//  For ip address
function getIPAddress() {  
    //whether ip is from the share internet  
     if(!empty($_SERVER['HTTP_CLIENT_IP'])) {  
                $ip = $_SERVER['HTTP_CLIENT_IP'];  
        }  
    //whether ip is from the proxy  
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {  
                $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];  
     }  
//whether ip is from the remote address  
    else{  
             $ip = $_SERVER['REMOTE_ADDR'];  
     }  
     return $ip;  
}  
// $ip = getIPAddress();  
// echo 'User Real IP Address - '.$ip;  

// cart add function
function add_cart(){
    if(isset($_GET['add_to_cart'])){
        global $con;
        $count=0;
        $add_to_cart=$_GET['add_to_cart'];
        $ip = getIPAddress();
        $sql_cart="SELECT * FROM `cart_details` WHERE ip_address='$ip' and product_id='$add_to_cart'";
        $result_cart=mysqli_query($con, $sql_cart);
        $count=mysqli_num_rows($result_cart);  
        if($count >0){
            echo"<script>alert('This product is already present in cart.');</script>";
        }else{
            global $con;
            $count=0;
        $add_to_cart=$_GET['add_to_cart'];
        $ip = getIPAddress();
            $sql_cart="INSERT INTO `cart_details`(`product_id`, `ip_address`, `quentity`) VALUES ('$add_to_cart','$ip','1')";
            $result_cart=mysqli_query($con, $sql_cart);
            // $count=mysqli_num_rows($result_cart);  

            if($result_cart){
                echo"<script>alert('This product is added to cart.');</script>";
                echo'<script>window.open("index.php", "_self");</script>';
            }
        }
    }
}
// for cart item count
function cartItemscount(){
    if(isset($_GET['add_to_cart'])) {
        global $con;
    $ip = getIPAddress();
    $sql_cart="SELECT * FROM `cart_details` WHERE ip_address='$ip' ;";
    $result_cart=mysqli_query($con, $sql_cart);
    $count=mysqli_num_rows($result_cart); 
    echo $count;
    }else{
        global $con;
    $ip = getIPAddress();
    $sql_cart="SELECT * FROM `cart_details` WHERE ip_address='$ip' ;";
    $result_cart=mysqli_query($con, $sql_cart);
    $count=mysqli_num_rows($result_cart); 
    echo $count;
    }
}
// for total price
function totalPrice(){
    global $con;
    $total=0.00;
    $ip = getIPAddress();
    $sql_cart="SELECT * FROM `cart_details` WHERE ip_address='$ip' ;";
    $result_cart=mysqli_query($con, $sql_cart);
    while($row=mysqli_fetch_assoc($result_cart)){
        $prod_id=$row['product_id'];
        $quentity=$row['quentity'];
        $sql_cartp="SELECT * FROM `products` WHERE prod_id='$prod_id' ;";
        $result_cartp=mysqli_query($con, $sql_cartp);
        $row_p=mysqli_fetch_assoc($result_cartp);
        $product_price=$row_p['prod_price'];
        $price=$product_price* $quentity;
        $total+=$price;
    }
    echo $total;
}
// Fetch the cart items
function getcartDetails(){
    global $con;
    $total=0.00;
    $ip = getIPAddress();
    $sql_cart="SELECT * FROM `cart_details` WHERE ip_address='$ip' ;";
    $result_cart=mysqli_query($con, $sql_cart);
    $count=mysqli_num_rows($result_cart);   
        if($count >0){
        echo '
        <table class="table table-bordered " style="border:1px solid black; width: 1050px;">
        <thead>
         
            <th style="width: 150px;">Product Id</th>
            <th style="width: 450px;">Product Name</th>
            <th style="width: 350px;">Quantity</th>
            <th style="width: 450px;">Product Image</th>
            <th style="width: 350px;">Product price</th>
            <th style="width: 450px;">Action</th>
            <th style="width: 450px;">Action</th>
        
        </thead>
        <tbody>';
        while($row_p=mysqli_fetch_assoc($result_cart)){
            
            $product_id=$row_p['product_id'];
            $sql_select="SELECT * FROM `products` WHERE prod_id='$product_id';";
            $result_sel=mysqli_query($con,$sql_select);
           $data=mysqli_fetch_assoc($result_sel);
            $product_name=$data['prod_name'];
            $product_details=$data['prod_details'];
            $product_image1=$data['image1'];
            $product_name=$data['prod_name'];
            $product_price=$data['prod_price'];
            echo '
              <tr>
                <td>'. $product_id.'</td>
                <td>'. $product_name.'</td>
                <td><input type="text" name="quantity" ></td>
                <td><img src="./product_images/'.$product_image1.'" width="100"; height="100"; alt="..."></td>
                <td>'.$product_price.'</td>
                <td class="text-center"><button class="btn btn-primary" name="edit" type="submit">Update</button>
                </td>
                <td class="text-center"><button class="btn btn-danger" name="delete" type="button"><a href="delete_cart.php" class="nav-link">Remove</a></button>
                </td>
              </tr>
           
              ';
              $total+=$product_price;
        }
        echo '</tbody>
        </table>
        <h2 class="text-dark">Sub total :<span class="text-danger">Rs '.  $total.' /-</span> <h5>
        ';
}else{
    echo'<h2 class="text-center text-danger">No products are not Available in cart.</h2>';
}

}
//  for user list
function userlist(){
    global $con;
    $sql_user="SELECT * FROM `users` ORDER BY user_id DESC;";
    $result_user=mysqli_query($con,$sql_user);
    $count=mysqli_num_rows($result_user);  
    if($count >0){
        echo '
        <table class="table table-bordered text-center" style="border:1px solid black;">
        <thead>
         
            <th style="width: 100px;">user id</th>
            <th style="width: 450px;">user Name</th>
            <th style="width: 450px;">user Email</th>
            <th style="width: 450px;">user status</th>
            <th style="width: 350px;">Action</th>
         
        </thead>
        <tbody>';
        while($row_p=mysqli_fetch_assoc($result_user)){
            $user_id=$row_p['user_id'];
                    $user_name=$row_p['user_name'];
                    $user_email=$row_p['user_email'];
                    $user_status=$row_p['user_status'];
                    
            echo '
              <tr>
              <input type="hidden" name="user_id" value="'.$user_id.'">
                <td>'. $user_id.'</td>
                <td>'.$user_name.'</td>
                <td>'.$user_email.'</td>
                <td><select name="user_status" class="form-select">
                <option value="Guest" if( '.$user_status.' == "Guest") selected>Guest</option>
                <option value="Admin" if( '.$user_status.' == "Admin") selected >Admin</option>
                </select>
                </td>
                <td class="text-center"><button class="btn btn-success" name="edit" type="submit">Edit</button>
                <button class="btn btn-danger" name="delete" type="button"><a href="user_list.php?user_id='.$user_id.'" class="nav-link">Delete</a></button></td>
              </tr>';

        }
        echo '</tbody>
        </table>';
}else{
    echo'<h2 class="text-center text-danger">No Records...</h2>';
}
}
// for view orders
function vieworders(){
    global $con;
    $sql_order="SELECT * FROM `orders` ORDER BY order_id DESC;";
    $result_order=mysqli_query($con,$sql_order);
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
                <td class="text-center"><button class="btn btn-primary" name="view" type="button"><a href="view_order_detail.php?order_id='.$order_id.'" class="nav-link">View</a></button>
                <button class="btn btn-danger" name="delete" type="button"><a href="delete_order.php?order_id='.$order_id.'" class="nav-link">Delete</a></button></td>
              </tr>';

        }
        echo '</tbody>
        </table>';
}else{
    echo'<h2 class="text-center text-danger">No categories are Available.</h2>';
}
}



?>