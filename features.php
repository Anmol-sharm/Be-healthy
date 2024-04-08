<?php 
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Features</title>
	<link rel="stylesheet" type="text/css" href="features.css">
	<link rel="stylesheet" type="text/css" href="css/Behealthy.css">
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
     <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />
</head>
<body>
<!-- header section starts      -->

<header class="header">

    <a href="#" class="logo"> <span>BE</span>HEALTHY </a>

    <div id="menu-btn" class="fas fa-bars"></div>

    <nav class="navbar">
        <a href="BeHealthy.php">home</a>
        <a href="about.php">about</a>
        <a href="features.php">features</a>
        <a href="pricing.php">pricing</a>
         <a href="products.php">products</a>
        <a href="trainers.php">trainers</a>
       <?php if (empty($_SESSION['username'])) { ?><a href="index.php">Register/Login</a>
         <?php } ?>
          
        <?php if (!empty($_SESSION['username'])) { ?><a href="logout.php">Logout</a>
         <a><?php echo "<h3>Welcome " . $_SESSION['username'] . "</h3>"; ?></a><?php } ?>
    </nav>

</header>

<!-- header section ends     -->


	<div class="container">
		<div class="left">
			<img src="images/banner.png">
		</div>
		<div class="right">
			<p>I am a</p>
		<h1> Gym Trainer</h1>
		<p>From Rajasthan,doing gym is good for healthy life. it helps our body to fit. it release stress from our mind.</p>
		
		</div>
	</div>

<section id="about">
	<div class="about-row">
		<div class="about-left-col">
			<h1> About <span id="blue">me</span></h1>
			<p id="p-title">I am a Gym Trainer</p>
			<p>
				From Rajasthan,doing gym is good for healthy life. it helps our body to fit. it release stress from our mind.From Rajasthan,doing gym is good for healthy life. it helps our body to fit. it release stress from our mind.

			</p>
			<p>
				From Rajasthan,doing gym is good for healthy life.
			</p>
			
		</div>
		<div class="about-right-col">
			<img src="images/img1.jpg">
		</div>
	</div>
</section>
<section id="signup">
	<div class="signup-row">
		<div class="signup-left-col">
			<img src="images/img2.png">
		</div>
		<div class="signup-right-col">
				<h1> BEING <span id="blue">BODY</span></h1>
			<h2>BUILDER</h2>
			

		</div>
	</div>
</section>
<section id="work">
		<div class="services-info">
			<h1>Our <span id="blue">Works</span></h1>
	<p>What we Provide</p>
</div>
<div class="services-row">
	<div class="work-box">
		<img src="images/ex1.jpg">
	</div>
	<div class="work-box">
		<img src="images/ex2.jpg">
	</div>
	<div class="work-box">
		<img src="images/ex3.jpg">
	</div>
	<div class="work-box">
		<img src="images/ex4.jpg">
	</div>
	<div class="work-box">
		<img src="images/ex5.jpg">
	</div>
	<div class="work-box">
		<img src="images/ex6.jpg">
	</div>
</div>
</section>

	

	
<!-- footer section starts  -->

<section class="footer">

    <div class="box-container">

        <div class="box">
            <h3>quick links</h3>
            <a class="links" href="#home">home</a>
            <a class="links" href="#about">about</a>
            <a class="links" href="#features">features</a>
            <a class="links" href="#pricing">pricing</a>
            <a class="links" href="#blogs">blogs</a>
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


<script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>

<!-- custom js file link  -->
<script src="js/script.js"></script>



















</body>
</html>