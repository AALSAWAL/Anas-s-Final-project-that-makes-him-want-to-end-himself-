<?php
session_start();
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
    
    
        <link rel="stylesheet" href="/CSS/reset.css" />
        <link
          rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css"
        />
        <link rel="preconnect" href="https://fonts.googleapis.com" />
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
        <link
          href="https://fonts.googleapis.com/css2?family=Caveat:wght@400..700&family=Parkinsans:wght@300..800&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
          rel="stylesheet"
        />
        <link
          href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet"
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
          crossorigin="anonymous"
        />
    
        <link rel="stylesheet" href="/CSS/Home.css" />
        <title>FootKits</title>
    </head>
    <main>
        <header>
            <div>
                <nav>
                    <ul>
                    <li>
                        <a href="index.php">
                        <img class="Footkitlogo" src="/assets/Footkit.png" alt="FootKit Logo"> </a>
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
            </div> 
        </header>
        <body>
            <h1>Products Page</h1>
            <div class="container">
                <?php
                require 'connect.php';

                $sql = "SELECT * from products";

                $result = mysqli_query($conn,$sql);
                $data = mysqli_fetch_all($result,MYSQLI_ASSOC);

                foreach($data as $product)
                {
                    echo '
                    <div class="card">
                    <img class="MUNITED" src="'. $product['image'] .'" alt="Manchester United T-shirt">
                    <p>'. $product['title'] .'</p>
                    <p>Price: $'. $product['price'] .'</p>
                    <form class="centerbutton" action="Products.php" method="post">
                    <input type="number" name="quantity" value="1"/>
                    <input type="hidden" name="product_id" value="' . $product['product_id'] . '"/>
                    <a class="BTN-MARGIN"  onclick="addToCart()"><input type="submit" value="Add To Cart"></a>
                    </form>
                    </div>
                    ';
                }
                ?>
                
                </div>

                
                <script src="java.js"></script>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
      crossorigin="anonymous"
    ></script>
        </body>
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
    </main>

    <script>
        
    </script>
</html>

<?php 
require 'connect.php';

if(isset($_SESSION['username'], $_POST['product_id'], $_POST['quantity'])) {
    $username = $_SESSION['username'];
    $product_id = $_POST['product_id'];
    $quantity = $_POST['quantity'];
    
    $sql = "INSERT INTO cartitem(username, product_id, quantity) Values ('$username', $product_id, $quantity)";
    
    $result = mysqli_query($conn,$sql);

    if($result) {
    }
}

?>