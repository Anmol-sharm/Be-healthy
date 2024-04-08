<?php 
session_start();
include 'config.php';

if (isset($_POST['submit'])) {
    $subscribe_id = $_POST['email'];
    $sql = "INSERT INTO subscribe (email) VALUES ('$subscribe_id')";
                    $result = mysqli_query($conn, $sql);
                    echo "<script>alert($sql)</script>";
            if ($result) {
                echo "<script>alert('Subscribed done!!.')</script>";
            
                } else {
                echo "<script>alert('Already Subscribed.')</script>";
            }
        }
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Be Healthy Be Fit</title>

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />

    <!-- custom css file link  -->
    <link rel="stylesheet" href="css/Behealthy.css">
</head>
<body>
    
<!-- header section starts      -->

<header class="header">

    <a href="#" class="logo"> <span>G</span>ym </a>

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


<!-- home section starts  -->

<section class="home" id="home">

    <div class="swiper home-slider">

        <div class="swiper-wrapper">

            <div class="swiper-slide slide" style="background: url(images/home-bg-1.jpg) no-repeat;">
                <div class="content">
                    <span>be strong, be fit</span>
                    <h3>Make yourself stronger than your excuses.</h3>
                    <a href="#" class="btn">get started</a>
                </div>
            </div>

            <div class="swiper-slide slide" style="background: url(images/home-bg-2.jpg) no-repeat;">
                <div class="content">
                    <span>be strong, be fit</span>
                    <h3>Make yourself stronger than your excuses.</h3>
                    <a href="#" class="btn">get started</a>
                </div>
            </div>

            <div class="swiper-slide slide" style="background: url(images/home-bg-3.jpg) no-repeat;">
                <div class="content">
                    <span>be strong, be fit</span>
                    <h3>Make yourself stronger than your excuses.</h3>
                    <a href="#" class="btn">get started</a>
                </div>
            </div>

        </div>

        <div class="swiper-pagination"></div>

    </div>

</section>

<!-- home section ends -->

<!-- about section starts  -->

<section class="about" id="about">

    <div class="image">
        <img src="images/about-img.jpg" alt="">
    </div>

    <div class="content">
        <span>about us</span>
        <h3 class="title">Every day is a chance to become better</h3>
        <p>“When you get stronger everything in the world gets easier. Change yourself and you've changed everything.”</p>
        <div class="box-container">
            <div class="box">
                <h3><i class="fas fa-check"></i>body and mind</h3>
                <p>“A fit, healthy body—that is the best fashion statement.”</p>
            </div>
            <div class="box">
                <h3><i class="fas fa-check"></i>healthy life</h3>
                <p>“The secret of getting ahead is getting started.”</p>
            </div>
            <div class="box">
                <h3><i class="fas fa-check"></i>strategies</h3>
                <p>“Energy & persistence conquer all things.”</p>
            </div>
            <div class="box">
                <h3><i class="fas fa-check"></i>workout</h3>
                <p>“The next few months will go by whether you workout or not!”</p>
            </div>
        </div>
        <a href="#" class="btn">read more</a>
    </div>

</section>

<!-- about section ends -->

<!-- features section starts  -->

<section class="features" id="features">

    <h1 class="heading"> <span>gym features</span> </h1>

    <div class="box-container">

        <div class="box">
            <div class="image">
                <img src="images/f-img-1.jpg" alt="">
            </div>
            <div class="content">
                <img src="images/icon-1.png" alt="">
                <h3>body building</h3>
                <p>“A bodybuilder is a sculptor who carries with him his own material.”</p>
                <a href="#" class="btn">read more</a>
            </div>
        </div>

        <div class="box second">
            <div class="image">
                <img src="images/f-img-2.jpg" alt="">
            </div>
            <div class="content">
                <img src="images/icon-2.png" alt="">
                <h3>gym for men</h3>
                <p>“Bodybuilding is the closest we have to the fountain of youth.”</p>
                <a href="#" class="btn">read more</a>
            </div>
        </div>

        <div class="box">
            <div class="image">
                <img src="images/f-img-3.jpg" alt="">
            </div>
            <div class="content">
                <img src="images/icon-3.png" alt="">
                <h3>gym for women</h3>
                <p> “The best activities for your health are pumping and humping.” </p>
                <a href="#" class="btn">read more</a>
            </div>
        </div>

    </div>

</section>

<!-- features section ends -->

<!-- pricing section starts  -->

<section class="pricing" id="pricing">

    <div class="information">
        <span>pricing plan</span>
        <h3>affordable pricing plan for your</h3>
        <p> <i class="fas fa-check"></i> Group Trainig</p>
        <p> <i class="fas fa-check"></i> cardio exercise </p>
        <p> <i class="fas fa-check"></i> weight lifting </p>
        <p> <i class="fas fa-check"></i> diet plans </p>
        <p> <i class="fas fa-check"></i> overall results </p>
        <a href="pricing.php" class="btn">all pricing</a>
    </div>

    <div class="plan basic">
        <h3>basic plan</h3>
        <div class="price"><span>$</span>30<span>/mo</span></div>
       <div class="list">
        <p> <i class="fas fa-check"></i> personal training </p>
        <p> <i class="fas fa-check"></i> cardio exercise </p>
        <p> <i class="fas fa-check"></i> weight lifting </p>
        <p> <i class="fas fa-check"></i> diet plans </p>
        <p> <i class="fas fa-check"></i> overall results </p>
       </div>
       <a href="pricing.php" class="btn">get started</a>
    </div>

    <div class="plan">
        <h3>premium plan</h3>
        <div class="price"><span>$</span>90<span>/mo</span></div>
       <div class="list">
        <p> <i class="fas fa-check"></i> personal training </p>
        <p> <i class="fas fa-check"></i> cardio exercise </p>
        <p> <i class="fas fa-check"></i> weight lifting </p>
        <p> <i class="fas fa-check"></i> diet plans </p>
        <p> <i class="fas fa-check"></i> overall results </p>
       </div>
       <a href="pricing.php" class="btn">get started</a>
    </div>

</section>

<!-- pricing section ends -->

<!-- trainers section starts  -->

<section class="trainers" id="trainers">

    <h1 class="heading"> <span>expert trainers</span> </h1>

    <div class="box-container">

        <div class="box">
            <img src="images/trainer-1.jpg" alt="">
            <div class="content">
                <span>expert trainer</span>
                <h3>Sanyam</h3>
                <div class="share">
                    <a href="#" class="fab fa-facebook-f"></a>
                    <a href="#" class="fab fa-twitter"></a>
                    <a href="#" class="fab fa-pinterest"></a>
                    <a href="#" class="fab fa-linkedin"></a>
                </div>
            </div>
        </div>

        <div class="box">
            <img src="images/trainer-2.jpg" alt="">
            <div class="content">
                <span>expert trainer</span>
                <h3>Anchal</h3>
                <div class="share">
                    <a href="#" class="fab fa-facebook-f"></a>
                    <a href="#" class="fab fa-twitter"></a>
                    <a href="#" class="fab fa-pinterest"></a>
                    <a href="#" class="fab fa-linkedin"></a>
                </div>
            </div>
        </div>

        <div class="box">
            <img src="images/trainer-3.jpg" alt="">
            <div class="content">
                <span>expert trainer</span>
                <h3>Divyam</h3>
                <div class="share">
                    <a href="#" class="fab fa-facebook-f"></a>
                    <a href="#" class="fab fa-twitter"></a>
                    <a href="#" class="fab fa-pinterest"></a>
                    <a href="#" class="fab fa-linkedin"></a>
                </div>
            </div>
        </div>

        <div class="box">
            <img src="images/trainer-4.jpg" alt="">
            <div class="content">
                <span>expert trainer</span>
                <h3>Amisha</h3>
                <div class="share">
                    <a href="#" class="fab fa-facebook-f"></a>
                    <a href="#" class="fab fa-twitter"></a>
                    <a href="#" class="fab fa-pinterest"></a>
                    <a href="#" class="fab fa-linkedin"></a>
                </div>
            </div>
        </div>

    </div>

</section>

<!-- trainers section ends -->

<!-- banner section starts  -->

<section class="banner">

    <span>join us now</span>
    <h3>get upto 50% discount</h3>
    <a href="#" class="btn">get discount</a>

</section>

<!-- banner section ends -->

<!-- review section starts  -->

<section class="review">

    <div class="information">
        <span>testimonials</span>
        <h3>what our clients says</h3>
        <p>If we wanted to, we could stay perfectly distracted and entertained for the rest of our lives and never get any meaningful work done.  </p>
        <a href="#" class="btn">read more</a>
    </div>

    <div class="swiper review-slider">

        <div class="swiper-wrapper">

            <div class="swiper-slide slide">
                <p>“A man too busy to take care of his health is like a mechanic too busy to take care of his tools.”.</p>
                <div class="user">
                    <img src="images/pic-1.png" alt="">
                    <div class="info">
                        <h3>Ashish</h3>
                        <span>designer</span>
                    </div>
                    <i class="fas fa-quote-left"></i>
                </div>
            </div>

            <div class="swiper-slide slide">
                <p>“Those who think they have not time for bodily exercise will sooner or later have to find time for illness.”.</p>
                <div class="user">
                    <img src="images/pic-2.png" alt="">
                    <div class="info">
                        <h3>Diksha</h3>
                        <span>designer</span>
                    </div>
                    <i class="fas fa-quote-left"></i>
                </div>
            </div>

            <div class="swiper-slide slide">
                <p>“   The only disease you have is your inability to see you have the power to heal yourself.”</p>
                <div class="user">
                    <img src="images/pic-3.png" alt="">
                    <div class="info">
                        <h3>John</h3>
                        <span>designer</span>
                    </div>
                    <i class="fas fa-quote-left"></i>
                </div>
            </div>

            <div class="swiper-slide slide">
                <p>“The secret to living well and longer is this: eat half, walk double, laugh triple, and love without measure.”</p>
                <div class="user">
                    <img src="images/pic-4.png" alt="">
                    <div class="info">
                        <h3>Barry</h3>
                        <span>designer</span>
                    </div>
                    <i class="fas fa-quote-left"></i>
                </div>
            </div>

        </div>

    </div>

</section>

<!-- review section ends -->
<!-- blogs section starts  -->

<section class="blogs" id="blogs">

    <h1 class="heading"> <span>daily posts</span> </h1>

    <div class="swiper blogs-slider">
        <div class="swiper-wrapper">
            <div class="swiper-slide slide">
                <div class="image">
                    <img src="images/blog-1.jpg" alt="">
                </div>
                <div class="content">
                    <div class="link"> <a href="#">by user</a> <span>|</span> <a href="#">21st may, 2021</a> </div>
                    <h3>fitness is not about being better than someone else</h3>
                    <p>“Some things you have to do every day. Eating seven apples on Saturday night instead of one a day just isn’t going to get the job done.”</p>
                    <a href="#" class="btn">read more</a>
                </div>
            </div>

            
            <div class="swiper-slide slide">
                <div class="image">
                    <img src="images/blog-2.jpg" alt="">
                </div>
                <div class="content">
                    <div class="link"> <a href="#">by user</a> <span>|</span> <a href="#">21st may, 2021</a> </div>
                    <h3>fitness is not about being better than someone else</h3>
                    <p>“Your journey to a healthier weight is not a journey that you start and then give up. It is a journey that you are living every day for the rest of your life.”</p>
                    <a href="#" class="btn">read more</a>
                </div>
            </div>

            <div class="swiper-slide slide">
                <div class="image">
                    <img src="images/blog-3.jpg" alt="">
                </div>
                <div class="content">
                    <div class="link"> <a href="#">by user</a> <span>|</span> <a href="#">21st may, 2021</a> </div>
                    <h3>fitness is not about being better than someone else</h3>
                    <p>“The doctor of the future will no longer treat the human frame with drugs, but rather will cure and prevent disease with nutrition.”</p>
                    <a href="#" class="btn">read more</a>
                </div>
            </div>

            <div class="swiper-slide slide">
                <div class="image">
                    <img src="images/blog-4.jpg" alt="">
                </div>
                <div class="content">
                    <div class="link"> <a href="#">by user</a> <span>|</span> <a href="#">21st may, 2021</a> </div>
                    <h3>fitness is not about being better than someone else</h3>
                    <p>“A wise man should consider that health is the greatest of human blessings, and learn how by his own thought to derive benefit from his illnesses.”</p>
                    <a href="#" class="btn">read more</a>
                </div>
            </div>

            <div class="swiper-slide slide">
                <div class="image">
                    <img src="images/blog-5.jpg" alt="">
                </div>
                <div class="content">
                    <div class="link"> <a href="#">by user</a> <span>|</span> <a href="#">21st may, 2021</a> </div>
                    <h3>fitness is not about being better than someone else</h3>
                    <p>“Every living cell in your body is made from the food you eat. If you consistently eat junk food then you’ll have a junk body.”</p>
                    <a href="#" class="btn">read more</a>
                </div>
            </div>

        </div>

        <div class="swiper-pagination"></div>

    </div>

</section>

<!-- blogs section ends -->

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
              <a class="links" href="insertproduct.php">Product Panel</a>
            <?php if (empty($_SESSION['username'])) { ?><a class="links" href="Admin Login.php">Admin Login</a><?php } ?>
            <a class="links" href="profile edit.php">Edit Profile</a>
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
            <form action="#" method="post" >
                <input type="email" name="email" class="text" placeholder="enter your email" id="" style="border:none; ">
                <input type="submit" value="subscribe" name="submit" class="btn">
            </form>
        </div>

    </div>

</section>

<div class="credit"> created by <span>Deepika</span>&<span>Krishna</span> | all rights reserved! </div>

<!-- footer section ends -->


<script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>

<!-- custom js file link  -->
<script src="js/script.js"></script>

</body>
</html>