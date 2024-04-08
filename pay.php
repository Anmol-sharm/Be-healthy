<?php

session_start();
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
<html>
<head>
<title>PAYMENT METHOD</title>
<link rel='stylesheet' href='css/style.css' type='text/css' media='all' />
</head>
<body>
<div style="width:700px; margin:50 auto;">

<h2>HERE IS YOUR BILL CHOOSE OPTION FOR PAYMENT.</h2>   

<?php
if(!empty($_SESSION["shopping_cart"])) {
$cart_count = count(array_keys($_SESSION["shopping_cart"]));
?>
<div class="cart_div">

</div>
<?php
}
?>

<div class="cart">
<?php
if(isset($_SESSION["shopping_cart"])){
    $total_price = 0;
}
?>	
<table class="table"  style="text-align: center; align-items: center;border:2px solid black; background-color: white;">
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
<td><img src="<?php echo $product["image"]; ?>" width="150" height="80" /></td>
<td style="color:black;"><?php echo $product["pname"]; ?><br />
</td>
<td><?php echo $product["quantity"]; ?>
</td>
<td><?php echo "RS".$product["price"]; ?></td>
<td><?php echo "RS".$product["price"]*$product["quantity"]; ?></td>
</tr>
<?php
$total_price += ($product["price"]*$product["quantity"]);
}
?>
<tr>
<td colspan="5" align="right">
<strong>TOTAL: <?php echo "RS".$total_price; ?></strong>
</td>
</tr>
</tbody>
</table>
<a href="logout.php" class="btn btn-warning"><h2>BACK TO HOME</h2></a>
<a href="pricing2.php" class="btn btn-warning"><h2>Proceed to pay</h2></a>


<br /><br />

</div>
</body>
</html>