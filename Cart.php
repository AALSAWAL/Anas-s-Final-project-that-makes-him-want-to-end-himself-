<?php
session_start();


?>

<!DOCTYPE html>
<html>
    <head>
        <title>FootKit</title>
        <link rel="stylesheet" href="/CSS/reset.css">
        <link rel="stylesheet" href="/CSS/Home.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link
            href="https://fonts.googleapis.com/css2?family=Caveat:wght@400..700&family=Parkinsans:wght@300..800&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
            rel="stylesheet">
    </head>
    <body>
        <header>
            <nav>
                <ul>
                    <li>
                        <a href="index.php">
                            <img class="Footkitlogo" src="/assets/Footkit.png"
                                alt="FootKit Logo">
                        </a>
                    </li>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="Aboutus.php">About us</a> </li>
                    <li><a href="Products.php">Products</a></li>
                    <li><a href="Cart.php">Cart</a></li>
                    <li><?php
                if(isset($_SESSION['username'])) {
                  echo '
                <a href="logout.php"><button>Logout</button></a>
                  ';
                } else {
                  echo '
                <a href="LOGINfile.php"><button>Sign in / Sign up</button></a> 
                  ';
                }
                ?></li>
                </ul>
            </nav>
        </header>
        <main>
        <?php
require 'connect.php';


if(isset($_SESSION['username'])) {
    $username = $_SESSION['username'];

    $sql = "
        SELECT 
            cartitem.product_id, 
            cartitem.quantity, 
            products.title, 
            products.image, 
            products.price
        FROM 
            cartitem
        JOIN 
            products 
        ON 
            cartitem.product_id = products.product_id 
        WHERE 
            cartitem.username = '$username'
    ";
    
    $result = mysqli_query($conn,$sql);
    $data = mysqli_fetch_all($result,MYSQLI_ASSOC);
    
        foreach ($data as $product) {
            echo '
            <div class="firstcartcontainer">
                <img class="cartimages" src="' . $product['image'] . '" alt="Product image">
                <p>' . $product['title'] . '</p>
                <p>Price: $' . $product['price'] . '</p>
                <label for="Quantity">Quantity:</label>
                <input type="number" id="Quantity" name="Quantity" min="1" max="10" step="1" value="' . $product['quantity'] . '">
                <button type="submit" name="delete" class="button-signup">Delete</button>
                <button class="button-signup">Check out</button>
            </div>
            <br>
            <br>
            <hr>
            <br>
            <br>
            ';
        }
    
}

 else {
    header('location: LOGINfile.php');
}


?>

            <br>
            <br>
            <hr>
            <h1 class="text-center">Reccomended Products</h1>
            <div class="container">
                <div class="card">
                <img class="PXG" src="/assets/ItoshiSae.jpg" alt="Limited edition Itoshi Sae jersey ">
                <p>Descritption</p>
                <p>Price: $10.00</p>
                <input type="number"/>
                <input type="submit" value="Add To Cart">
                </div>
                <div class="card">
                <img class="MCITY" src="/assets/MANCITY.jpg" alt="Manchester City Red Jersey">
                <p>Descritption</p>
                <p>Price: $10.00</p>
                <input type="number"/>
                <input type="submit" value="Add To Cart">
                </div>
                <div class="card">
                <img class="BlueLockMUNCHEN" src="/assets/BastardMunchen.webp" alt="Blue Lock Bastard Munchen">
                <p>Descritption</p>
                <p>Price: $10.00</p>
                <input type="number"/>
                <input type="submit" value="Add To Cart">
                 </div>
                  <div class="card">
                <img class="CR7" src="/assets/CR7KIT.jpg" alt="CR7 Football Kit">
                <p>Descritption</p>
                <p>Price: $10.00</p>
                <input type="number"/>
                <a href="Cart.php"><input type="submit" value="Add To Cart"></a>
                </div>
            </div>
                
        </main>
        <footer>
            <section class="FOOTER">
                <p>Contact us:</p>
                <div class="social">
                    <a href=""><i class="fab fa-instagram"></i></a>
                    <a href=""><i class="fab fa-twitter"></i></a>
                    <a href=""><i class="fab fa-facebook-f"></i></a>
                </div>
                <ul>
                    <li>Instagram</li>
                    <li>Twitter</li>
                    <li>Facebook</li>
                </ul>
                <p>Copy Rights Reserved © 2024</p>
    
            </section>
        </footer>
    </body>
</html>