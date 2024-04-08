<!--  
<?php
 session_start();
 if(!isset($_SESSION['AdminLoginId'])){
 	header("location: Admin Login.php");
 }
 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Admin Panel</title>
	<style>
		body{
			margin: 0;
		}
		div.header{
			color: blue;
			font-family: poppins;
			display: flex;
			flex-direction: row;
			align-itmes: center;
			justify-content: space-between;
			padding: 0 60px;
			background-color: black;
		}
	div.header button{
		background-color: white;
		font-size: 16px;
		font-weight: 550;
		padding: 8px 12px;
		border: 2px solid black;
		border-radius: 5px;
		align-items: center;
		flex-direction: row;
		justify-content: space-between;

	}
	</style>
</head>
<body>

	<div class="header">
		<h1>ADMIN PANEL - <?php echo $_SESSION['AdminLoginId'] ?></h1>
		<form action="<?php echo $_SERVER['PHP_SELF'] ?>" methods="post">
        <button type="submit" name="logout"> LOG OUT</button>
		</form>
  </div>



  <?php
  if(isset($_POST['Logout']))
  {
  	session_destroy();
  	header("location:Admin Login.php");
  }
  ?>
</body>
</html> -->