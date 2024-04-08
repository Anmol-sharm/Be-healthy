<?php 
@session_start();
if(empty($_SESSION['username'])){
    header('location: index.php');
}
$package=$_SESSION['pack'];
//$username=$_SESSION['username'];
include 'config.php';
$email=$_SESSION['email'];
$sql = "SELECT * FROM users WHERE email='$email'";
    $result = mysqli_query($conn, $sql);
    if ($result->num_rows > 0) {
        $row = mysqli_fetch_assoc($result); 

        if (isset($_POST['confirm'])) {
            $name = $_POST['fname'];
            $email = $_POST['emailid'];
            $package = $_POST['packagename'];
            $card_number = $_POST['card-number'];
            $cardholder_name = $_POST['holder-name'];
            $cvv = $_POST['cvv-number'];
            $valid = $_POST['valid-date'];
            $sql = "INSERT INTO order_detail (name, email, package, card_number, cardholder_name, cvv, valid)
                    VALUES ('$name', '$email', '$package', '$card_number', '$cardholder_name', '$cvv', '$valid')";
            $result = mysqli_query($conn, $sql);
            if ($result) {
                echo "<script>alert('Wow! User Booking completed.')</script>";
                header("Location: welcome.php");
            }else {
                echo "<script>alert('Woops! Something Wrong Went.')</script>";
            }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Payment Form</title>
    <link rel="stylesheet" href="css/pricing2.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
</head>
<body>
    <div class="container">
        <form method="post">
        <h1>Customer Details</h1>
        <div class="first-row">
            <div class="owner">
                <h3>Name</h3>
                <label><?php echo  $row['first_name'] ?></label>
                <input type="hidden" name="fname" value="<?php echo  $row['first_name'] ?>">
            </div>
            <div class="cvv">
                <h3>Email ID</h3>
               <label><?php echo  $row['email'] ?></label>
               <input type="hidden" name="emailid" value="<?php echo  $row['email'] ?>">
            </div>
        </div>
        <div class="first-row">
            <div class="owner">
                <h3>Package</h3>
                <label><?php echo $package ?></label>
                <input type="hidden" name="packagename" value="<?php echo $package ?>">
            </div>
            
        </div>
    <?php } ?>
        <h1>Confirm Your Payment</h1>
        <div class="first-row">
            <div class="owner">
                <h3>Card Holder Name</h3>
                <div class="input-field">
                    <input type="text" name="holder-name">
                </div>
            </div>
            <div class="cvv">
                <h3>CVV</h3>
                <div class="input-field">
                    <input type="password" name="cvv-number">
                </div>
            </div>
        </div>
        <div class="second-row">
            <div class="card-number">
                <h3 style="color:whitesmoke;">Card Number</h3>
                <div class="input-field">
                    <input type="text" name="card-number">
                </div>
            </div>
        </div>
        <div class="third-row">
            <h3 style= "color:whitesmoke;">Valid Up</h3>
            <input type="month" name="valid-date" min="2022-06" max="2050-12">
            
                </div>
                <div class="cards">
                    <img src="images/mc.png" alt="">
                    <img src="images/vi.png" alt="">
                    <img src="images/pp.png" alt="">
                </div>
        <button type="submit" name="confirm" style="background:red; border:none; margin:0 .5rem; border-radius:16px; color:whitesmoke;
        font-size:1.5rem; padding:10px;" >Confirm</button>
    </form>
    </div>
</body>
</html>