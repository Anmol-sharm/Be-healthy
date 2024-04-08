<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
 <link rel="stylesheet" type="text/css" href="style.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <title></title>
</head>
<body>
  <!-- nav -->
 <nav  class="navbar navbar-expand-lg navbar-light px-5" style="background-color: #3B3131;">
    
    <form>
 <button type="button" value="Go Back!" onclick="history.back()"> <span class="glyphicon glyphicon-step-backward"></span></button>
</form>
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0"></ul>
    
    <div class="user-cart">  
        <?php           
        if(isset($_SESSION['user_id'])){
          ?>
          <a href="" style="text-decoration:none;">
            <i class="fa fa-user mr-5" style="font-size:30px; color:#fff;" aria-hidden="true"></i>
         </a>
          <?php
        } else {
            ?>
            <a href="" style="text-decoration:none;">
                    <i class="fa fa-sign-in mr-5" style="font-size:30px; color:#fff;" aria-hidden="true"></i>
            </a>

            <?php
        } ?>
    </div>  
</nav>

<div >
  <h2>All Orders</h2>
  <table class="table ">
    <thead>
      <tr>
        <th class="text-center">S.N.</th>
        <th class="text-center">Name </th>
        <th class="text-center">Email</th>
        <th class="text-center">Package</th>
      </tr>
    </thead>
    <?php
      include_once "../config/dbconnect.php";
      $sql="SELECT * from order_detail ";
      $result=$conn-> query($sql);
      $count=1;
      if ($result-> num_rows > 0){
        while ($row=$result-> fetch_assoc()) {
           
    ?>
    <tr>
      <td><?=$count?></td>
      <td><?=$row["name"]?></td>
      <td><?=$row["email"]?></td>
      <td><?=$row["package"]?></td>
    </tr>
    <?php
            $count=$count+1;
           
        }
    }
    ?>
  </table>
</div>
</body>
</html>
