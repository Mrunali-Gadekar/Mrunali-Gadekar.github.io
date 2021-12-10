<?php

require_once "config.php";

//check database connection
$query = "select * from feedback";
$connect = mysqli_query($conn,$query);

$num = mysqli_num_rows($connect); //check in database if there is data or not
?>



<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://fonts.googleapis.com/css2?family=Bree+Serif&family=Pacifico&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="css/style3.css">
  <title>feedback</title>
</head>
<body>
 <nav id="navbar">
    <div id="logo">
      <img src="img/main_logo.jpeg" alt="OnlineMeals.com">
    </div>
      <ul>
        <li class="items"><a href="admin.php">Home</a></li>
        <li class="items"><a href="admin_login.php">login</a></li>
        <li class="items"><a href="admin_logout.php">logout</a></li>
      </ul>
  </nav>

  <div id="head">
    <h6>Feedback</h6>
  </div>
  <div class="container">
    <table border="1">
      <tr>
        <th>ID</th>
        <th>Name</th>
        <th>E-mail</th>
        <th>Phone No.</th>
        <th>Review</th>
        <th>Time</th>
      </tr>
      <?php 
          if($num>0){
            while($data = mysqli_fetch_assoc($connect)){
              echo"
                <tr>
                <td>".$data['id']."</td>
                <td>".$data['name']."</td>
                <td>".$data['email']."</td>
                <td>".$data['phone']."</td>
                <td>".$data['message']."</td>
                <td>".$data['time']."</td>
                </tr>
                ";
            }
          }
      ?>
    </table>
    <!-- <table>
      <tr>
        <th></th>
      </tr>


    </table> -->


    
  <div>
  
</body>
</html>