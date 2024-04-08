
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Pricing</title>
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
<link rel="stylesheet" href="vendors/bootstrap-select/css/bootstrap-select.min.css">
   <!-- swiper css link  -->
   <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/pricing.css">
   <link rel="stylesheet" type="text/css" href="BeHealthy.css">
   <!-- header section starts  -->
   <style type="text/css"> 
    .text p{
        font-size: 25px !important;
    }
    .htmlradio{
        height: 20px;
        width: 20px;
    }
    .btn{
        padding-bottom: 1.5rem;
    }
    .buy{
border-radius:5px;
        background-color: blue;
        font-size: 20px;
        padding: 10px;
        align-items: center;
        margin: 10px;
    }

   </style>
   <script>
    $(document).ready(function(){
       $("#book1").click(function(){                        
        var package= $("input[name='pack']:checked").val();
        var username= $("#username").val();
        alert(username);
        if(package!="" && username!=""){
            jQuery.ajax({
                type:"POST",
                url:"pricing2.php",
                dataType:'html',    
                data:{package:package},
                success: function(res){
                    var result=package;
                    window.location.href="pricing2.php";
                }
            })
        } else{
            jQuery.ajax({
                type:"POST",
                url:"index.php",
                dataType:'html',    
                data:{package:package},
                success: function(res){
                    var result=package;
                    window.location.href="index.php";
                 }
            })
        }

       });
   });
   </script>

<header class="header">

   <a href="BeHealthy.php" class="logo"> <span>BE</span>HEALTHY </a>

   <nav class="navbar">
      <div id="close-navbar" class="fas fa-times"></div>
      <a href="BeHealthy.php">home</a>
      <a href="about.php">about</a>
      <a href="features.php">Feautres</a>
      <a href="pricing.php">Pricing</a>
      <a href="products.php">products</a>
      <a href="trainers.php">Trainers</a>
     <?php if (empty($_SESSION['username'])) { ?><a href="index.php">Register/Login</a>
         <?php } ?>
          
        <?php if (!empty($_SESSION['username'])) { ?><a href="logout.php">Logout</a>
         <a><?php echo "<h3>Welcome " . $_SESSION['username'] . "</h3>"; ?></a><?php } ?>
   </nav>

</header>

<!-- header section ends -->

<!-- Start Price -->

  <?php
  session_start();
  $conection=mysqli_connect("localhost","root","","swiss_collection");
if (!$conection) 
   {
    die("Connection Failed: " . mysqli_connect_error());
   }

$status="";
if (isset($_POST['pid']) && $_POST['pid']!=""){
$pid = $_POST['pid'];
$result = mysqli_query($conection,"SELECT * FROM `product_tbl` WHERE `pid`='$pid'");
$row = mysqli_fetch_assoc($result);
$name = $row['pname'];
$pid = $row['pid'];
$price = $row['price'];
$image = $row['image'];


$cartArray = array(
    $pid=>array(
    'pname'=>$pname,
    'pid'=>$pid,
    'price'=>$price,
    'quantity'=>1,
    'image'=>$image)
);

if(empty($_SESSION["shopping_cart"])) {
    $_SESSION["shopping_cart"] = $cartArray;
    $status = "<div class='box'>Product is added to your cart!</div>";
}else{
    $array_keys = array_keys($_SESSION["shopping_cart"]);
    if(in_array($pid,$array_keys)) {
        $status = "<div class='box' style='color:red;'>
        Product is already added to your cart!</div>";  
    } else {
    $_SESSION["shopping_cart"] = array_merge($_SESSION["shopping_cart"],$cartArray);
    $status = "<div class='box'>Product is added to your cart!</div>";
    }

    }
}
 ?>
 <?php

if(!empty($_SESSION["shopping_cart"])) {
$cart_count = count(array_keys($_SESSION["shopping_cart"]));
?>
<div class="cart_div" align="right" style="padding: 30px;">
<a href="productcart.php"><img src="cart.png" width="60" /> <h2>Cart<?php echo $cart_count; ?></h2></a>

</div>
<?php
}
$limit = 4;  
if (isset($_GET["page"])) {
    $page  = $_GET["page"]; 

    } 
    else{ 
    $page=1;
     };  
$start_from = ($page-1) * $limit;  
$inc = 2;
$result = mysqli_query($conection,"SELECT * FROM `product_tbl` ORDER BY pid DESC LIMIT $start_from,$limit");
while($row=mysqli_fetch_assoc($result)){
    $inc = ($inc == 2) ? 1 : $inc + 1;
                                if($inc == 1) echo" <div class='container'><div class='row'>"; 
                                
                            
                              echo"
  <div class='col-lg-6'>

        <form method='post' action=''>
        <input type='hidden' name='pid' value=".$row['pid']." />

        <div class='row' align='' style='margin:40px;'>
        <div class='col-lg-6'>
        <div class='image' ><img src='".$row['image']."' width='500' /></div>
        </div>
        <div class='col-lg-6'>
        <div class='pname' style='color:white;font-size:30px;text-align:left; padding:10px;'>".$row['pname']."</div></div>
          <div class='col-lg-6'>
          <div class='price' style='color:white;font-size:30px;text-align:left; padding:10px;'>Rs.".$row['price']."</div>
          </div>
            <div class='col-lg-6'>
        <button type='submit' class='buy'>Buy Now</button></div>
        <br>
        </form>
         
          </div>
         ";

                                if($inc == 2) echo "</div>";
                            }
                            if($inc == 1) echo "<div class='col-sm-4'></div><div class='col-sm-4'></div></div>"; 
                            if($inc == 2) echo "<div class='col-sm-4'></div></div>";
                          
                      
      
        
mysqli_close($conection);
?>

<div style="clear:both;"></div>
<?php  

$result_db = mysqli_query($conection,"SELECT COUNT(pid) FROM product_tbl "); 
$row_db = mysqli_fetch_row($result_db);  
$total_records = $row_db[0];  
$total_pages = ceil($total_records / $limit); 
  $config['use_page_numbers'] = TRUE;
$pagLink = "<ul class='product pagination d-flex justify-content-center text-primary  text-center '>"; 

for ($i=1; $i<=$total_pages; $i++) {
              $pagLink .= "<li class='product page-item d-flex justify-content-center  text-secondary'><a  class='product page-link d-flex justify-content-center align-items-center text-secondary  ' href='products.php?page=".$i."'>".$i." </a></li>";   
              
}
               
 echo $pagLink . "</ul>"; ?>

 <div class="product justify-content-center align-items-center text-center btn-primary w-50" style="text-align: center;  ">Page- <?php echo $page ; '<br>' ?></div>

<div class="message_box" style="margin:10px 0px;">
<?php echo $status; ?>
</div>
 
 <!-- End Price -->
 <!-- footer section starts  -->
<section class="footer">

    <div class="box-container">

        <div class="box">
            <h3>quick links</h3>
            <a class="links" href="BeHealthy.php">home</a>
            <a class="links" href="about.php">about</a>
            <a class="links" href="features.php">features</a>
            <a class="links" href="pricing.php">pricing</a>
            <a class="links" href="trainers.php">trainers</a>
              <a class="links" href="insertproduct.php">Product Panel</a>
            <?php if (empty($_SESSION['username'])) { ?><a class="links" href="Admin Login.php">Admin Login</a><?php } ?>
        </div>

        <div class="box">
            <h3>opening hours</h3>
            <p> monday : <i> 7:00am - 10:30pm </i> </p>
            <p> tuesday : <i> 7:00am - 10:30pm </i> </p>
            <p> wednesday : <i> 7:00am - 10:30pm </i> </p>
            <p> friday : <i> 7:00am - 10:30pm </i> </p>
            <p> saturday : <i> 7:00am - 10:30pm </i> </p>
            <p> sunday : <i> closed </i> </p>
        </div>

        <div class="box">
            <h3>opening hours</h3>
            <p> <i class="fas fa-phone"></i> +123-456-7890 </p>
            <p> <i class="fas fa-phone"></i> +111-222-3333 </p>
            <p> <i class="fas fa-envelope"></i> sam696867@gmail.com </p>
            <p> <i class="fas fa-map"></i> Jalandhar, india - 144001 </p>
            <div class="share">
                <a href="#" class="fab fa-facebook-f"></a>
                <a href="#" class="fab fa-twitter"></a>
                <a href="#" class="fab fa-linkedin"></a>
                <a href="#" class="fab fa-pinterest"></a>
            </div>
        </div>

        <div class="box">
            <h3>newsletter</h3>
            <p>subscribe for latest updates</p>
            <form action="">
                <input type="email" name="" class="email" placeholder="enter your email" id="">
                <input type="submit" value="subscribe" class="btn">
            </form>
        </div>

    </div>

</section>

<div class="credit"> created by <span>Deepika</span>and<span>Krishna</span> | all rights reserved! </div>

<!-- footer section ends -->

<!-- swiper js link  -->
<script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>

<!-- custom js file link  -->
<script src="js/script.js"></script>


</body>
</html>