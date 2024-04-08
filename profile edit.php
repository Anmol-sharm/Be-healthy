<?php 	
	@session_start();
	if(empty($_SESSION['username'])){
    header('location: index.php');
}
	//$username=$_SESSION['username'];
include 'config.php';
$email=$_SESSION['email'];
$sql = "SELECT * FROM users WHERE email='$email'";
    $result = mysqli_query($conn, $sql);
    if ($result->num_rows > 0) {
        $row = mysqli_fetch_assoc($result);
$email=$_SESSION['email'];
$uid= $row['user_id'];
        if (isset($_POST['submit'])) {
    $username = $_POST['editfirst_name'];
    $last_name = $_POST['Editlastname'];
    $email = $_POST['email'];
    $contact_no = $_POST['contactno'];
    $password = $_POST['password'];

 
            $sql = "UPDATE users SET first_name='$username', last_name='$last_name', email='$email', contact_no='$contact_no', password='$password' WHERE user_id='$uid'";
            echo $sql;
            $result = mysqli_query($conn, $sql);
            if ($result) {
                echo "<script>alert('Wow! User Updated Completed.')</script>";
                header('location:welcome.php');
                
            } else {
                echo "<script>alert('Woops! Something Wrong Went.')</script>";
            }
        
}

    ?>


<!DOCTYPE html>
<html>
<head>
<title>Eidt Profile Page</title>
<!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />
    
    <!-- custom css file link  -->
    
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
     <!-- custom css file link  -->
    <link rel="stylesheet" href="css/Behealthy.css">
    <link rel="stylesheet" href="index.css">

</head>
<style type="text/css">
    input {
        color: white;
    }
</style>
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
        <a href="trainers.php">trainers</a>
        <?php if (empty($_SESSION['username'])) { ?><a href="index.php">Register/Login</a>
         <?php } ?>
          
        <?php if (!empty($_SESSION['username'])) { ?><a href="logout.php">Logout</a>
         <a><?php echo "<h3>Welcome " . $_SESSION['username'] . "</h3>"; ?></a><?php } ?>
    </nav>

</header>

<!-- header section ends     -->
	
<div class="container">
    <form action="" method="POST" class="login-email">
            <p class="login-text" style="font-size: 2rem; font-weight: 800;">Edit Profile</p>>
    <div class="input-group">
                <input type="text" placeholder="Edit Name" name="editfirst_name" value="<?php echo $row['first_name'] ?>">
</div>
            <div class="input-group">
                <input type="text" placeholder="Edit last Name" name="Editlastname" value="<?php echo $row['last_name'] ?>">
            </div>
            <div class="input-group">
                <input type="Email" placeholder="Edit Email" name="email" value="<?php echo $row['email'] ?>" >
            </div>
            <div class="input-group">
                <input type="number" placeholder="Edit Contact Number" name="contactno" value="<?php echo $row['contact_no'] ?>" >
            </div>
            <div class="input-group">
                <input type="text" placeholder="Change Password" name="password" value="<?php echo $row['password']?>" >
            </div>


<div class="input-group">
                <button name="" class="btn">Cancel</button>
            </div>
<div class="input-group">
                <button name="submit" class="btn">Save Changes</button>
            </div>

</form>
</div>
</body>
<?php } ?>
</html>