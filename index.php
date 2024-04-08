<?php 

include 'config.php';

session_start();

error_reporting(0);



if (isset($_POST['submit'])) {
	$email = $_POST['email'];
	$password = $_POST['password'];

	$sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
	$result = mysqli_query($conn, $sql);
	if ($result->num_rows > 0) {
		$row = mysqli_fetch_assoc($result);
		 session_start();
		$_SESSION['username'] = $row['first_name'];
		$_SESSION['email'] = $row['email'];
		header("location: welcome.php");
	} else {
		echo "<script>alert('Woops! Email or Password is Wrong.')</script>";
	}
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Welcome</title>
    <link rel="stylesheet" type="text/css" href="welcome.css">
     <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="css/Behealthy.css">
    <link rel="stylesheet" href="index.css">
</head>
<body>

    <!-- header section starts      -->

<header class="header" style="background-color: transparent !important;">

    <a href="BeHealthy.php" class="logo">  <span>G</span>ym </a>
   
    

    <div id="menu-btn" class="fas fa-bars"></div>

    <nav class="navbar">
        <a href="BeHealthy.php">home</a>
        <a href="about.php">about</a>
        <a href="features.php">features</a>
        <a href="pricing.php">pricing</a>
        <a href="trainers.php">trainers</a>
       <?php if (empty($_SESSION['username'])) { ?> <a href="index.php">Register/Login</a><?php } ?>
        <?php if (!empty($_SESSION['username'])) { ?><a href="logout.php">Logout</a>
         <a><?php echo "<h3>Welcome " . $_SESSION['username'] . "</h3>"; ?></a><?php } ?>
    </nav>

</header>
	<div class="container">
		<form action="" method="POST" class="login-email">
			<p class="login-text" style="font-size: 4rem; font-weight: 400;">Login</p>
			<div class="input-group">
				<input type="email" placeholder="Email" name="email" value="<?php echo $email; ?>" required>
			</div>
			<div class="input-group">
				<input type="password" placeholder="Password" name="password" value="<?php echo $_POST['password']; ?>" required>
			</div>
			<div class="input-group">
				<button name="submit" class="btn">Login</button>
			</div>
			<p class="login-register-text">Don't have an account? <a href="register.php">Register Here</a>.</p>
		</form>
	</div>
</body>
</html>