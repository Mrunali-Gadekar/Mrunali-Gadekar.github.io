<?php
session_start();

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !==true)
{
    header("location: login.php");
}
?>

<?php
include_once 'config.php';
if(isset($_POST['submit']))
{    
    $burger = $_POST['burger'];
    $pizza = $_POST['pizza'];
    $momos = $_POST['momos'];
    $dessert = $_POST['dessert'];
    $username= $_SESSION['username'];
    
    $sql = "INSERT INTO order1 (username,burger, pizza, momos, dessert)
    VALUES ('$username','$burger','$pizza','$momos','$dessert')";
    if (mysqli_query($conn, $sql)) {
        //echo "New record has been added successfully !";
    } else {
        echo "Error: " . $sql . ":-" . mysqli_error($conn);
    }
    mysqli_close($conn);
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

    <title>WELCOME!</title>
    <link rel="stylesheet" href="css/style1.css">
    <link href="https://fonts.googleapis.com/css2?family=Bree+Serif&family=Pacifico&display=swap" rel="stylesheet">


  </head>
  <body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#">ORDER FOOD</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav">
      <li class="nav-item ">
        <a class="nav-link" href="index.html">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="register.php">Register</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="login.php">Login</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="logout.php">Logout</a>
      </li>

      
     
    </ul>

  <div class="navbar-collapse collapse">
  <ul class="navbar-nav ml-auto">
  <li class="nav-item active">
        <a class="nav-link" href="#"> <img src="https://img.icons8.com/metro/26/000000/guest-male.png"> 
        <?php echo "Welcome ". $_SESSION['username']?></a>
      </li>
  </ul>
  </div>


  </div>
</nav>

<div class="container mt-4">
<h3><?php echo "Welcome ". $_SESSION['username']?>! Order your favorite meal!</h3>

<hr>
</div>
<div > 
<div id="contact-box">
  <form action="" method="post">
    <div class="form-group">
      <label for="name">BURGER</label>
      <select type="text" id="inputState" class="form-control" name="burger" >
        <option></option>
        <option>Mushroom Burger    </option>
        <option>Stuffed Bean Burger</option>
        <option>Lamb Rdish Burger  </option> 
        <option>Potato Corn Burger </option>   
        <option>Supreme Veggie Burger</option>    
        <option>Butter Chicken Burgers</option>    
        <option>Rajma Patty Burger</option>
        <option>Pizza Burger       </option>>
      </select>
    </div>
    <div class="form-group">
      <label for="name">Pizza</label>
      <select type="text" id="inputState" class="form-control" name="pizza">
        <option></option>
        <option>Margarhitta      </option>
        <option>Vege Cheese Pizza</option>
        <option>Corn Pizza       </option> 
        <option>Farmhouse Pizza  </option>   
        <option>Veg Loaded Pizza </option>    
        <option>Chicken Pizza    </option>    
        <option>Paneer Pizza     </option>
        <option>Double Cheese Pizza</option>
      </select>
    </div>
    <div class="form-group">
      <label for="name">Momos</label>
      <select type="text" id="inputState" class="form-control" name="momos" >
        <option></option>
        <option>Steamed Momos</option>
        <option>Fried Momos</option>
        <option>Tandoori Momos</option>
        <option>Cheese Momos</option>
      </select>
    </div>
    <div class="form-group">
      <label for="name">Dessert</label>
      <select type="text" id="inputState" class="form-control" name="dessert">
        <option></option>
        <option>Chocolate Pastry</option>
        <option>Chocolate Browniee</option>
        <option>Strawberry Pastry</option>
        <option>Lemon Tart</option>
        <option>Pistachio Phirni </option>
        <option>Fudgy Chewy Brownies</option>
        <option>Low Fat Tiramisu</option>
        <option>Coconut Kheer</option>
        <option>Chocolate Coffee Truffle</option>
        <option>Cheese cake</option>
      </select>
    </div>
    <div class="form-group">
    <div class="form-check">
      <input class="form-check-input" type="checkbox" id="gridCheck">
      <label class="form-check-label" for="gridCheck">
        Check me out
      </label>
    </div>
  </div>
    
    <button type="submit" class="btn btn-primary" name="submit">Confirm order</button>   
      
  </form>
  </div>

</div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>