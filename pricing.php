<?php
@session_start();
$username="";
if(!empty($_SESSION['username'])){
    $username=$_SESSION['username'];
}

if(isset($_POST['book'])){
   
    $pack=$_POST['pack'];
    $_SESSION['pack']=$pack;
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

   <!-- swiper css link  -->
   <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/pricing.css">
   <link rel="stylesheet" type="text/css" href="BeHealthy.css">
   <!-- header section starts  -->
   <style type="text/css"> 
    .text p{
        font-size: 25px ;
    }
    .htmlradio{
        height: 20px;
        width: 20px;
    }
    .btn{
        padding-bottom: 1.5rem;
    }

   </style>
   <script>
    $(document).ready(function(){
       $("#book1").click(function(){                        
        var package= $("input[name='pack']:checked").val();
        var username= $("#username").val();
        //alert(username);
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

   <a href="BeHealthy.php" class="logo"> <span>G</span>ym </a>

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

  <section class="price-package" id="price">
  	 <div class="container">
        <form method="post">
            <input type="hidden" id="username" value="<?php echo $username ?>" >
  	 	  <h2>Choose Your Package</h2>
  	 	  <p class="title-p">
Physical fitness is not only one of the most important keys to a healthy body, it is the basis of dynamic and creative intellectual activity. </p>
  	 	  <div class="content">
  	 	  	  <div class="box wow bounceInUp">
  	 	  	  	  <div class="inner">
  	 	  	  	  	   <div class="price-tag">
  	 	  	  	  	   	  $59/Month
  	 	  	  	  	   </div>
  	 	  	  	  	   <div class="img">
  	 	  	  	  	   	 <img src="images/price1.jpg" alt="price" />
  	 	  	  	  	   </div>
  	 	  	  	  	   <div class="text">
  	 	  	  	  	   	  <h3>Begineers Level</h3>
                        <p>Group exercise class</p>
  	 	  	  	  	   	  <p>Month to Month</p>
  	 	  	  	  	   	  <p>No Time Restrictions</p>
  	 	  	  	  	   	  <p>Gym and Cardio</p>
  	 	  	  	  	   	  <p>Service Locker Rooms</p>
  	 	  	  	  	   	  <input type="radio" class="htmlradio"  name="pack" value="begineers" checked />
  	 	  	  	  	   </div>
  	 	  	  	  </div>
  	 	  	  </div>
  	 	  	  <div class="box wow bounceInUp" data-wow-delay="0.2s">
  	 	  	  	  <div class="inner">
  	 	  	  	  	   <div class="price-tag">
  	 	  	  	  	   	  $69/Month
  	 	  	  	  	   </div>
  	 	  	  	  	   <div class="img">
  	 	  	  	  	   	 <img src="images/price2.jpg" alt="price" />
  	 	  	  	  	   </div>
  	 	  	  	  	   <div class="text">
  	 	  	  	  	   	  <h3>Intermediater Level</h3>
  	 	  	  	  	   	  <p>Unlimited Burn Zone</p>
  	 	  	  	  	   	  <p>Month to Month</p>
  	 	  	  	  	   	  <p>No Time Restrictions</p>
  	 	  	  	  	   	  <p>Gym and Cardio</p>
  	 	  	  	  	   	  <p>Service Locker Rooms</p>
  	 	  	  	  	   	  <input type="radio" class="htmlradio" name="pack" value="intermediater">
  	 	  	  	  	   </div>
  	 	  	  	  </div>
  	 	  	  </div>
  	 	  	  <div class="box wow bounceInUp" data-wow-delay="0.4s">
  	 	  	  	  <div class="inner">
  	 	  	  	  	   <div class="price-tag">
  	 	  	  	  	   	  $99/Month
  	 	  	  	  	   </div>
  	 	  	  	  	   <div class="img">
  	 	  	  	  	   	 <img src="images/price3.jpg" alt="price" />
  	 	  	  	  	   </div>
  	 	  	  	  	   <div class="text">
  	 	  	  	  	   	  <h3>Advance Level</h3>
  	 	  	  	  	   	  <p>Get Free WiFi</p>
  	 	  	  	  	   	  <p>Month to Month</p>
  	 	  	  	  	   	  <p>No Time Restrictions</p>
  	 	  	  	  	   	  <p>Gym and Cardio</p>
  	 	  	  	  	   	  <p>Service Locker Rooms</p>
  	 	  	  	  	   	  <input type="radio" class="htmlradio" name="pack" value="advance"> 
  	 	  	  	  	   </div>
  	 	  	  	  </div>
  	 	  	  </div>
             
  	 	  </div>
           <button type="submit" name="book" id="book1" class="btn">Join Now</button>
       </form>
  	 </div>
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

<div class="credit"> created by &nbsp;<span>Deepika</span>&<span>Krishna</span>  | all rights reserved! </div>

<!-- footer section ends -->

<!-- swiper js link  -->
<script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>

<!-- custom js file link  -->
<script src="js/script.js"></script>


</body>
</html>