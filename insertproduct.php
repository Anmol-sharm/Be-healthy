<?php

if(isset($_POST['save']))
{
    $A=$_POST['pid'];
    $B=$_POST['pname'];
    $C=$_POST['price'];
    
    if($_FILES  ['image']['error']>0)
    {
        echo"error in uploading";
    }
    else
    {
        echo"upload:".$_FILES['image']['name']."<br>";
        $E="shop/".$_FILES['image']['name'];
        if(file_exists("img/".$_FILES['image']['name']))
        {
            echo $_FILES['image']['name']."file is already exists";
        }
        else
        {
            move_uploaded_file($_FILES['image']['tmp_name'],"shop/".$_FILES['image']['name']);
            echo"file is uploaded";
        }
    }

$conection=mysqli_connect("localhost","root","","swiss_collection");
if (!$conection) 
   {
    die("Connection Failed: " . mysqli_connect_error());
   }

$sql="INSERT into product_tbl (pid,pname,price,image) values('$A','$B','$C','$E')";
echo"$sql";
if(mysqli_query($conection,$sql))
   {
   header("location:products.php");
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
   
    <!-- font awesome cdn link  -->

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  
   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/pricing.css">
   <link rel="stylesheet" type="text/css" href="BeHealthy.css">
   <!-- header section starts  -->
   <style type="text/css"> 
    .text p {
    font-size: 25px !important;
}
.htmlradio {
    height: 20px;
    width: 20px;
}
.btn {
    padding-bottom: 1.5rem;
}
section {
    margin-top: 50px;
}
.container {
    max-width: 600px;
    margin: 0 auto;
    background-color: #fff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}
.row {
    margin-bottom: 15px;
}
label {
    font-weight: bold;
}
input[type="text"],
input[type="number"],
input[type="file"] {
    width: 100%;
    padding: 8px;
    border: 1px solid #ccc;
    border-radius: 5px;
    box-sizing: border-box;
}
button[type="submit"] {
    background-color: #dc3545;
    color: white;
    border: none;
    padding: 10px 20px;
    border-radius: 5px;
    cursor: pointer;
}
button[type="submit"]:hover {
    background-color: #c82333;
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
     <!-- <?php if (empty($_SESSION['username'])) { ?><a href="index.php">Register/Login</a>
         <?php } ?>
          
        <?php if (!empty($_SESSION['username'])) { ?><a href="logout.php">Logout</a>
         <a><?php echo "<h3>Welcome " . $_SESSION['username'] . "</h3>"; ?></a><?php } ?> -->
   </nav>

</header>

<!-- header section ends -->

<!-- Start Price -->
<section align="center">
    

  <h1 style="text-align: center; color: blue"><b>Add Product Here</b></h1>
    <form  method="post" enctype="multipart/form-data">
          <div class="container" style="display:block;">
          <div class="row" style="color:white; font-size: 30px;">
            <div class="col-lg-6" ><label style="color:black;">Product id</label></div>
            <div class="col-lg-6"><input type="text" name="pid" id="pid" value=""></div></div>
        <br>
 <br>            <div class="col-lg-6" ><label>Product Name</label></div>
            <div class="col-lg-6"><input type="text" name="pname" id="pname" value="" style="display: 'block';"></div>
            <br> <br>
            <div class="col-lg-6" ><label>Product Price</label></div>
            <div class="col-lg-6"><input type="number" name="price" id="price" value=""></div>
            <br>
            <br>
            <div class="col-lg-6" ><label>Product image</label></div>
            <div class="col-lg-6"><input type="file" name="image" id="image" value=""></div>

          </div>
<div class="row" align="center">
    <div class="col-lg-12">
    <button type="submit" id="submit" value="Post" name="save" class="btn btn-danger glyphicon glyphicon-ok-circle">Submit</button>
</div>
</div>

</div>

</form>
</section>
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
             <!-- <form action="">
               <input type="email" name="" class="email" placeholder="enter your email" id="">
                <input type="submit" value="subscribe" class="btn">
            </form>
 -->        </div>

    </div>

</section>

<div class="credit"> created by <span>Deepika</span>and<span>Krishna</span> | all rights reserved! </div>

<!-- footer section ends -->

<!-- swiper js link  -->
<!-- custom js file link  -->



</body>
</html>