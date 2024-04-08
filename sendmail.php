<?php 
@session_start();
$to=$_SESSION['email'];

//$rid=$_POST['rid'];
$subject="Booking Refernce Id";

$rid=rand(100000,999999);	
$message=" ";

//echo $_SESSION['fn'];
echo "alert($to)";

$headers="MIME-Version: 1.0"."\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
		$headers .= 'From: <behealthy794@gmail.com>' . "\r\n";
//echo "alert($headers)";
		include 'config.php';
		/*if(!$con)
		{
			die("connection failed:".mysqli_connect_error());

		}*/
		if(!empty($to))
		{
			$query="select * from users where email='$to'";
			//echo "$query";
		$records=mysqli_query($conn, $query);
		$x=false;
		  while ($columns=mysqli_fetch_array($records))
		{
			$x=true;
		}
			if($x==false)
			{
					echo"Record Not Found";
			}
			else
			{
				//echo "$rid";
				if(mail($to, $subject,"Your Booking Refernce Code is $rid" , $headers)){
				 //$_SESSION['rid']=$rid;
				
				echo "1";
}else{
	echo "mail not send";
}
    			//mysqli_query($connection);
			}
		}
		 
		mysqli_close($conn);


		


?>