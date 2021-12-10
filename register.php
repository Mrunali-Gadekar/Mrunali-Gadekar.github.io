<?php
require_once "config.php";

$username = $password = $confirm_password = $address = $city= $state= $pincode ="";
$username_err = $password_err = $confirm_password_err =  $address_err = $city_err= $state_err= $pincode_err = "" ;

if ($_SERVER['REQUEST_METHOD'] == "POST"){
  // Check if username is empty
  if(empty(trim($_POST["username"]))){
    header("Location: register.php?error=*name cannot be blank");
    $username_err = "Username cannot be blank";
  }
  else{
    $sql = "SELECT id FROM users WHERE username = ?";
    $stmt = mysqli_prepare($conn, $sql);
    if($stmt)
    {
      mysqli_stmt_bind_param($stmt, "s", $param_username);
      // Set the value of param username
      $param_username = trim($_POST['username']);
      // Try to execute this statement
      if(mysqli_stmt_execute($stmt)){
        mysqli_stmt_store_result($stmt);
        if(mysqli_stmt_num_rows($stmt) == 1)
        {
          header("Location: register.php?error=This username is already taken");
          $username_err = "This username is already taken"; 
        }
        else{
          $username = trim($_POST['username']);
        }
      }
      else{
        echo "Something went wrong";
      }
    }
  }
  mysqli_stmt_close($stmt);
  // Check for password
  if(empty(trim($_POST['password']))){
    header("Location: register.php?error=*password cannot be blank");
    $password_err = "Password cannot be blank";
   }
  elseif(strlen(trim($_POST['password'])) < 5){
    header("Location: register.php?error=*password cannot be less than 5 characters");
    $password_err = "Password cannot be less than 5 characters";
  }
  else{
    $password = trim($_POST['password']);
  }
 // Check for confirm password field
  if(trim($_POST['password']) !=  trim($_POST['confirm_password'])){
    header("Location: register.php?error=*password and confirm passwords should match");
    $password_err = "Passwords should match";
  }
  //check for address
  if(empty(trim($_POST['address']))){
    header("Location: register.php?error=*address cannot be blank");
    $address_err = "Address cannot be blank";
   }
  else{
    $address = trim($_POST['address']);
  }
  //check for city
  if(empty(trim($_POST['city']))){
    header("Location: register.php?error=*city cannot be blank");
    $city_err = "City cannot be blank";
   }
  else{
    $city = trim($_POST['city']);
  }
  //check for state
  if(empty(trim($_POST['state']))){
    header("Location: register.php?error=*sate cannot be blank");
    $state_err = "sate cannot be blank";
   }
  else{
    $state = trim($_POST['state']);
  }
  //check for pincode
  if(empty(trim($_POST['pincode']))){
    header("Location: register.php?error=*pincode cannot be blank");
    $pincode_err = "Pincode cannot be blank";
   }
  else{
    $pincode = trim($_POST['pincode']);
  }


// If there were no errors, go ahead and insert into the database
if(empty($username_err) && empty($password_err) && empty($confirm_password_err) && empty($address_err) && empty($city_err) && empty($state_err) && empty($pincode_err))
{
    $sql = "INSERT INTO users (username, password, address, city, state, pincode) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($conn, $sql);
    if ($stmt)
    {
        mysqli_stmt_bind_param($stmt, "ssssss", $param_username, $param_password, $param_address, $param_city, $param_state, $param_pincode);

        // Set these parameters
        $param_username = $username;
        $param_password = password_hash($password, PASSWORD_DEFAULT);
        $param_address = $address;
        $param_city = $city;
        $param_state =$state;
        $param_pincode = $pincode;

        // Try to execute the query
        if (mysqli_stmt_execute($stmt))
        {
            header("location: login.php");
        }
        else{
            echo "Something went wrong... cannot redirect!";
        }
        mysqli_stmt_close($stmt);
    }
    mysqli_close($conn);
}

}

?>




<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Registration System</title>
    <link rel="stylesheet" href="css/style1.css">
    <link href="https://fonts.googleapis.com/css2?family=Bree+Serif&family=Pacifico&display=swap" rel="stylesheet">
  </head>
  <body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#">Registration</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
  <ul class="navbar-nav">
      <li class="nav-item ">
        <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="register.php">Register</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="login.php">Login</a>
      </li>
    </ul>
  </div>
</nav>

<div class="container mt-4">
<h3>Please Register Here:</h3>
<hr>
<?php if (isset($_GET['error'])) { ?>
  <p class="error"><?php echo $_GET['error']; ?></p>
<?php } ?>
<hr>
<form action="" name="myForm" method="post" >
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4" id="username">Username</label>
      <input type="text" class="form-control" name="username" id="username" placeholder="name" >
      <b><span class="formerror"> </span></b>
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4" id="password">Password</label>
      <input type="password" class="form-control" name ="password" id="password" placeholder="Password" >
      <b><span class="formerror"> </span></b>
    </div>
  </div>
  <div class ="form-row">
    <div class="form-group col-md-6">
      <label for="inputPassword4" id="confirm_password">Confirm Password</label>
      <input type="password" class="form-control" name ="confirm_password" id="confirm_password" placeholder="Confirm Password" >
      <b><span class="formerror"> </span></b>
    </div> 
    <div class="form-group col-md-6">
      <label for="inputAddress2" id="address">Address </label>
      <input type="text" class="form-control" name="address" id="address" placeholder="Apartment, studio, or floor" >
      <b><span class="formerror"> </span></b>
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <div id="city">
        <label for="inputCity">City</label>
        <input type="text" class="form-control" name="city" id="inputCity" >
        <b><span class="formerror"> </span></b>
      </div>
    </div>
    <div class="form-group col-md-4">
      <label for="inputState">State</label>
      <select id="inputState" class="form-control" name="state" >
      <b><span class="formerror"> </span></b>
        <option selected>Maharashtra</option>
        <option>Gujrat</option>
        <option>Goa</option>
      </select>
    </div>
    <div class="form-group col-md-2">
      <div id="pincode">
        <label for="inputZip" id="pincode">Pincode</label>
        <input type="text" class="form-control" name="pincode" id="pincode" >
        <b><span class="formerror"> </span></b>
      </div>
    </div>
  </div>
  <div class="form-group">
    <div class="form-check">
      <input class="form-check-input" type="checkbox" id="gridCheck">
      <label class="form-check-label" for="gridCheck">
        Check me out
      </label>  
    </div>
  </div>
  <button type="submit" class="btn btn-primary">Sign in</button>
</form>
</div>
 
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
  <script> src="register.js" </script>
</html>
