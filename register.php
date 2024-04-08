<?php 

include 'config.php';

error_reporting(0);

session_start();

if (isset($_SESSION['username'])) {
    header("Location: index.php");
}

if (isset($_POST['submit'])) {
	$username = $_POST['username'];
	$last_name = $_POST['last_name'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$cpassword = $_POST['cpassword'];
	$contact_no = $_POST['contact_no'];

	if ($password == $cpassword) {
		$sql = "SELECT * FROM users WHERE email='$email'";
		$result = mysqli_query($conn, $sql);
		if (!$result->num_rows > 0) {
			$sql = "INSERT INTO users (first_name, last_name, email, password, contact_no)
					VALUES ('$username', '$last_name', '$email', '$password', '$contact_no')";
			$result = mysqli_query($conn, $sql);
			if ($result) {
				echo "<script>alert('Wow! User Registration Completed.');window.location.href='index.php';</script>";
				$username = "";
				$email = "";
				$_POST['password'] = "";
				$_POST['cpassword'] = "";
			} else {
				echo "<script>alert('Woops! Something Wrong Went.')</script>";
			}
		} else {
			echo "<script>alert('Woops! Email Already Exists.')</script>";
		}
		
	} else {
		echo "<script>alert('Password Not Matched.')</script>";
	}
}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	 <!-- custom css file link  -->
    <link rel="stylesheet" href="css/Behealthy.css">
    <link rel="stylesheet" href="index.css">

	<title>Register Form - Pure Coding</title>
</head>
<body>
	<!-- header section starts      -->

<header class="header" style="background-color: transparent !important;">

    <a href="#" class="logo"> <span>BE</span>HEALTHY </a>

    <div id="menu-btn" class="fas fa-bars"></div>

    <nav class="navbar" >
        <a href="BeHealthy.php">home</a>
        <a href="about.php">about</a>
        <a href="features.php">features</a>
        <a href="pricing.php">pricing</a>
        <a href="trainers.php">trainers</a>
        <a href="index.php">Register/Login</a>
         <?php if (!empty($_SESSION['username'])) { ?><a href="logout.php">Logout</a>
         <a><?php echo "<h3>Welcome " . $_SESSION['username'] . "</h3>"; ?></a><?php } ?>
    </nav>

</header>

<!-- header section ends     -->

	<div class="container">
		<form action="" method="POST" class="login-email">
            <p class="login-text" style="font-size: 2rem; font-weight: 800;">Register</p>
			<div class="input-group">
				<input type="text" placeholder="Username" name="username" value="<?php echo $username; ?>" required>
			</div>
			<div class="input-group">
				<input type="last_name" placeholder="last name" name="last name" value="<?php echo $last_name; ?>" required>
			</div>
			<div class="input-group">
				<input type="email" placeholder="Email" name="email" value="<?php echo $email; ?>" required>
			</div>
			<div class="input-group">
				<input type="contact_no" placeholder="Contact Number" name="contact_no" value="<?php echo $contact_no; ?>" required>
			</div>
			<div class="input-group">
				<input type="password" placeholder="Password" name="password" value="<?php echo $_POST['password']; ?>" required>
            </div>
            <div class="input-group">
				<input type="password" placeholder="Confirm Password" name="cpassword" value="<?php echo $_POST['cpassword']; ?>" required>
			</div>
			<div class="input-group">
				<button name="submit" class="btn">Register</button>
			</div>
			<p class="login-register-text">Have an account? <a href="index.php">Login Here</a>.</p>
		</form>
	</div>
</body>
</html>