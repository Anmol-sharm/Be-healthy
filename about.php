<?php 
@session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>about</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

   <!-- swiper css link  -->
   <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/about.css">
   <link rel="stylesheet" type="text/css" href="css/Behealthy.css">
</head>
<body>
   
<!-- header section starts  -->

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

<section class="heading-link">
   <h3>about us</h3>
   <p> <a href="BeHealthy.php">home</a> / about </p>
</section>

<!-- about section starts  -->

<section class="about">

   <div class="image">
      <img src="images/hey2.jpg" alt="">
   </div>

   <div class="content">
      <h3 class="about-title">DON'T STOP TILL YOU DROP!!!</h3>
      <p>Health is a very important aspect in the life of everyone. Nothing is more important than health and fitness for any human being. Healthy and fit people really enjoy their life very happily and peacefully. An unhealthy person cannot enjoy life in full extent. He/she cannot enjoy eating, watching sports, or other luxury of the life. We have to eat healthy and complete food in timely manner.A person with good health and fitness becomes able to live his/her life to its fullest extent. It is very important for a person in life to be physically and mentally fit to live a healthy and happy life. Healthy and fit people become less prone to the medical conditions. Fitness does not mean to be physically fit only, it also means with healthy mental state of the person.People who are physically active can easily maintain a relaxed state of mind. Healthy and fit people can easily face all the ups and downs of their life and less affected by any drastic change.
      <h3 class="about-title">WE ARE BE HEALTHY AND BE FIT</h3>
      <p>If you struggle with self-confidence, or you don’t love how you look, you might assume that everybody around you will be judging you the whole time and don’t want to subject yourself to this torture.</p>
      <p>
Helping people live longer, happier and healthier lives for over 20 years.</p>
<p>Gym and Fitness was founded in 2002 as a family owned and operated business specialising in supplying high-quality gym equipment at great prices.

Instead of being just another gym equipment retailer, our founders wanted to be the best in the industry and set their minds to doing so! Over the last two decades Gym and Fitness has grown into one of Australia’s largest online fitness equipment retailers, helping thousands of customers live longer, happier and healthier lives.</p>
 
</section>

<!-- about section ends -->

<!-- Start Gallery -->
  <section class="gallery" id="gallery">
    <h2> Workout Gallery</h2>
   <div class="content">
       <div class="box wow slideInLeft">
          <img src="images/gallery1.jpg" alt="gallery" />
       </div>
       <div class="box wow slideInRight">
          <img src="images/gallery2.jpg" alt="gallery" />
       </div>
       <div class="box wow slideInLeft">
          <img src="images/gallery3.jpg" alt="gallery" />
       </div>
       <div class="box wow slideInRight">
          <img src="images/gallery4.jpg" alt="gallery" />
       </div>
   </div>
  </section>
<!-- End Gallery -->
<!-- footer section starts  -->

<section class="footer">

    <div class="box-container">

        <div class="box">
            <h3>quick links</h3>
            <a class="links" href="BeHealthy.php">home</a>
            <a class="links" href="about.php">about</a>
            <a class="links" href="#features">features</a>
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

<div class="credit"> created by <span>sarabjit</span> | all rights reserved! </div>

<!-- footer section ends -->




<!-- swiper js link  -->
<script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>

<!-- custom js file link  -->
<script src="js/script.js"></script>

</body>
</html>