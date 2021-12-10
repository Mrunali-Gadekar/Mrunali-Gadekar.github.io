<?php
    require_once "config.php";

    if(isset($_POST['submit']))
    {    
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $message = $_POST['message'];
    
    $sql = "INSERT INTO feedback (name,email, phone, message)
    VALUES ('$name','$email','$phone','$message')";
    if (mysqli_query($conn, $sql)) {
        //echo "New record has been added successfully !";
    } else {
        echo "Error: " . $sql . ":-" . mysqli_error($conn);
    }
    mysqli_close($conn);
    }
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Food Dilivery Services | OnlineMeals.com</title>
    <link rel="stylesheet" href="css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Bree+Serif&family=Pacifico&display=swap" rel="stylesheet">

    
</head>
<body>
    <nav id="navbar">
        <div id="logo">
            <img src="img/main_logo.jpeg" alt="OnlineMeals.com">
        </div>
        <ul>
            <li class="items"><a href="#home">Home</a></li>
            <li class="items"><a href="#services-container">Services</a></li>
            <li class="items"><a href="#menu-container">Menu</a></li>
            <li class="items"><a href="#client-section">About us</a></li>
            <li class="items"><a href="#contact">feedback</a></li>
            <li class="push"><a href="admin_login.php">Admin</a></li>
            </ul>
    </nav>

    <section id="home">
        <h1 class="h-primary">Welcome to OnlineMeals</h1>
        <p>Yummy food at your door step </p>
        <p>WE ARE HERE TO SERVE OUR BEST </p>  
        <a href="register.php">
            <button class="btn">Click here to register</button>
        </a>
    </section>
    
    <section id="services-container">
        <h1 class="h-primary center">Our Services</h1>
        <div id="services">
            <div class="box">
                <img src="img/pizza.jpeg" alt="">
                <h2 class="h-secondary center">Food Catering</h2>
                <p class="center">
                    Serving our best food............. 
                    Delight in every bite.............
                    Best taste with best deals
                </p>
            </div>  
            <div class="box">
                <img src="img/meal.jpeg" alt="">
                <h2 class="h-secondary center">Bulk Ordering</h2>
                <p class="center">
                    Best offers on Bulk Orders are available
                    10% to 60% discount offers.............. 
                </p>
            </div>
            <div class="box">
                <img src="img/deliveryBoy.jpeg" alt="">
                <h2 class="h-secondary center">Food Ordering</h2>
                <p class="center">
                    Food delivery right in front of your doorstep!! 
                    Free delivery for orders in radius of 1km
                    <!-- Charges will increase with distance of delivery location
                    Your trusted delivery partner -->
                </p>
            </div>
        </div>
    </section>

    <section id="menu-container">
        <h1 class="h-primary center">Our Menu</h1>
        <div id="services">
            <div class="box">
                <img src="img/menu-pizza.jpg" alt="">
                <h2 class="h-secondary center">Burger</h2>
                <p class="center">
                    <li>Margarhitta      </li>
                    <li>Vege Cheese Pizza</li>
                    <li>Corn Pizza       </li> 
                    <li>Farmhouse Pizza  </li>   
                    <li>Veg Loaded Pizza </li>    
                    <li>Chicken Pizza    </li>    
                    <li>Paneer Pizza     </li>
                    <li>Double Cheese Pizza</li>
                </p>
            </div>
            <div class="box">
                <img src="img/menu-burger.jpg" alt="">
                <h2 class="h-secondary center">Pizza</h2>
                <p class="center">
                    <li>Mushroom Burger    </li>
                    <li>Stuffed Bean Burger</li>
                    <li>Lamb Rdish Burger  </li> 
                    <li>Potato Corn Burger </li>   
                    <li>Supreme Veggie Burger</li>    
                    <li>Butter Chicken Burgers</li>    
                    <li>Rajma Patty Burger</li>
                    <li>Pizza Burger       </li>
                </p>
            </div>
            <div class="box">
                <img src="img/menu-momo.jpg" alt="">
                <h2 class="h-secondary center">Momos</h2>
                <p class="center">
                    <li>Steamed Momos</li>
                    <li>Fried Momos</li>
                    <li>Tandoori Momos</li>
                    <li>Cheese Momos</li>
                </p>
            </div>
            <div class="box">
                <img src="img/Menu-dessert.jpeg" alt="">
                <h2 class="h-secondary center">Desserts</h2>
                <p class="center">
                    <li>Chocolate Pastry</li>
                    <li>Chocolate Browniee</li>
                    <li>Strawberry Pastry</li>
                    <li>Lemon Tart</li>
                    <li>Pistachio Phirni</li>
                    <li>Fudgy Chewy Brownies</li>   
                    <li>Low Fat Tiramisu</li>  
                    <li>Coconut Kheer</li>  
                    <li>Chocolate Coffee Truffle</li> 
                </p>
            </div>
            <div class="box">
                <img src="img/Menu-coldrink.jpeg" alt="">
                <h2 class="h-secondary center">Coldrinks</h2>
                <p class="center">
                    <li>Chocolate Milk Shake</li>
                    <li>Strawberry Milk Shake</li>
                    <li>Mango Milk Shake</li>
                    <li>Cold Coffee</li>
                </p>
            </div>
        </div>
    </section>


        <section id="client-section">
            <h1 class="h-primary center">Our Clients</h1>
            <div id="clients">
                <div class="client-item">
                    <img src="img/MS.jpeg" alt="Our Client">
                </div>
                <div class="client-item">
                    <img src="img/SK.jpeg" alt="Our Client">
                </div>
                <div class="client-item">
                    <img src="img/AMAZON.jpeg" alt="Our Client">
                </div>
                <div class="client-item">
                    <img src="img/TCS.jpeg" alt="Our Client">
                </div>
            </div>
        </section>
        <section id="contact">
            <h1 class="h-primary center">Feedback</h1>
            <div id="contact-box">
                <form action="" method="post">
                    <div class="form-group">
                        <label for="name">Name:</label>
                        <input type="text" name="name" id="name" placeholder="Enter your name">
                    </div>
                    <div class="form-group">
                        <label for="name">E-mail:</label>
                        <input type="email" name="email" id="email" placeholder="Enter your email">
                    </div>
                    <div class="form-group">
                        <label for="name">Phone Number:</label>
                        <input type="phone" name="phone" id="phone" placeholder="Enter your phone">
                    </div>
                    <div class="form-group">
                        <label for="name">Message:</label>
                        <textarea name="message" id="message" cols="30" rows="5"></textarea>
                    </div>
                    <div>
                        <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                    </div>
                </form>
            </div>
        </section>

        <footer>
            <div class="center">
                Copyright &copy; www.OnlineMeals.com All rights reserved!
            </div>
        </footer>
</body>
</html>

