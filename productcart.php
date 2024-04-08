<?php

session_start();
$status="";
if (isset($_POST['action']) && $_POST['action']=="remove"){
if(!empty($_SESSION["shopping_cart"])) {
	foreach($_SESSION["shopping_cart"] as $key => $value) {
		if($_POST["pid"] == $key){
		unset($_SESSION["shopping_cart"][$key]);
		$status = "<div class='box' style='color:red;'>
		Product is removed from your cart!</div>";
		}
		if(empty($_SESSION["shopping_cart"]))
		unset($_SESSION["shopping_cart"]);
			}		
		}
}

if (isset($_POST['action']) && $_POST['action']=="change"){
  foreach($_SESSION["shopping_cart"] as &$value){
    if($value['pid'] === $_POST["pid"]){
        $value['quantity'] = $_POST["quantity"];
        break; // Stop the loop after we've found the product
    }
}
  	
}



?>


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
<body>
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
<div class="container" style="width:auto; margin:50 auto; height: auto;">

<h2 align="center"> Shopping Cart</h2>   

<?php
if(!empty($_SESSION["shopping_cart"])) {
$cart_count = count(array_keys($_SESSION["shopping_cart"]));
?>
<div class="cart_div" align="right" style="padding:20px;">
<a href="shop.php">
<img src="cart.png" width="60"/> Cart
<span><?php echo $cart_count; ?></span></a>
</div>

<?php
}
?>

<div class="cart">
<?php
if(isset($_SESSION["shopping_cart"])){
    $total_price = 0;
?>	
<center>
<table class="table" style="text-align: center; align-items: center;border:2px solid black; background-color: white;">
<tbody>
<tr>

<td style="border:2px solid black;padding: 20px;">PRODUCT IMAGE</td>
<td style="border:2px solid black;padding: 20px;">ITEM NAME</td>
<td style="border:2px solid black;padding: 20px;">QUANTITY</td>
<td style="border:2px solid black;padding: 20px;">UNIT PRICE</td>
<td style="border:2px solid black;padding: 20px;">ITEMS TOTAL</td>
</tr>	
<?php		
foreach ($_SESSION["shopping_cart"] as $product){
?>
<tr>
<td><img src='<?php echo $product["image"]; ?>' width="180" height="100" /></td>
<td><?php echo $product["pname"]; ?><br />
<form method='post' action=''>
<input type='hidden' name='pid' value="<?php echo $product["pid"]; ?>" />
<input type='hidden' name='action' value="remove" />
<button type='submit' class='remove'>Remove Item</button>
</form>
</td>
<td>
<form method='post' action=''>
<input type='hidden' name='pid' value="<?php echo $product["pid"]; ?>" />
<input type='hidden' name='action' value="change" />
<select name='quantity' class='quantity' onchange="this.form.submit()">
<option <?php if($product["quantity"]==0) echo "selected";?> value="0">0</option>
<option <?php if($product["quantity"]==1) echo "selected";?> value="1">1</option>
<option <?php if($product["quantity"]==2) echo "selected";?> value="2">2</option>
<option <?php if($product["quantity"]==3) echo "selected";?> value="3">3</option>
<option <?php if($product["quantity"]==4) echo "selected";?> value="4">4</option>
<option <?php if($product["quantity"]==5) echo "selected";?> value="5">5</option>
</select>
</form>
</td>
<td><?php echo "Rs.".$product["price"]; ?></td>
<td><?php echo "Rs.".$product["price"]*$product["quantity"]; ?></td>
</tr>
<?php
$total_price += ($product["price"]*$product["quantity"]);
}
?>
<tr>
<td colspan="5" align="right">
<strong>TOTAL: <?php echo "Rs.".$total_price; ?></strong>
</td>
</tr>
</tbody>
</table>
</center>		
  <?php
}else{
	echo "<h3>Your cart is empty!</h3>";
	}
?>
</div>


<div style="clear:both;"></div>

<div class="message_box" style="margin:10px 0px;">
<?php echo $status; ?>
</div>


<br /><br />
<div style=" text-align: center;"><button type="submit" name="pay" class=" btn-primary btn-xl active"><a href="pay.php" style="color: blue;padding: 20px;background-color: yellow; ">Pay Here</a></button></div>

</div>
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
