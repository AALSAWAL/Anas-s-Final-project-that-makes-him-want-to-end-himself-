<?php
session_start();
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description" content="FootKits: Your one-stop shop for football merchandise. Discover top-quality football kits, stylish streetwear, and essential gear for football enthusiasts.">
    <meta name="keywords" content="football kits, football merchandise, sportswear, football clothing, buy football shirts, streetwear, football accessories, FootKits">
    <meta name="author" content="FootKits">
    <meta name="robots" content="index, follow">

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

  <body>
    <main>
      <header>
        <div>
          <nav>
            <ul class="show">
              <li>
                <a href="index.php">
                  <img
                    class="Footkitlogo"
                    src="/assets/Footkit.png"
                    alt="FootKit Logo"
                  />
                </a>
              </li>

              <li><a href="index.php">Home</a></li>
              <li><a href="Aboutus.php">About us</a></li>
              <li><a href="Products.php">Products</a></li>
              <li><a href="Cart.php">Cart</a></li>
              <li>
                <?php
                if(isset($_SESSION['username'])) {
                  echo '
                <a href="logout.php"><button>Logout</button></a>
                  ';
                } else {
                  echo '
                <a href="LOGINfile.php"><button>Sign in / Sign up</button></a> 
                  ';
                }
                ?>
              </li>
              <div class="Hamburger-menu">
                <span class="bar"> </span>
                <span class="bar"> </span>
                <span class="bar"> </span>
                <span class="bar"> </span>
                <span class="bar"> </span>
              </div>
            </ul>
          </nav>
        </div>
      </header>
      <div id="carouselExampleCaptions" class="carousel slide">
        <div class="carousel-indicators">
          <button
            type="button"
            data-bs-target="#carouselExampleCaptions"
            data-bs-slide-to="0"
            class="active"
            aria-current="true"
            aria-label="Slide 1"
          ></button>
          <button
            type="button"
            data-bs-target="#carouselExampleCaptions"
            data-bs-slide-to="1"
            aria-label="Slide 2"
          ></button>
          <button
            type="button"
            data-bs-target="#carouselExampleCaptions"
            data-bs-slide-to="2"
            aria-label="Slide 3"
          ></button>
        </div>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img
              src="/assets/photo-1589487391730-58f20eb2c308.jpg"
              class="d-block w-100"
              alt="Futbol"
            />
            <div class="carousel-caption d-none d-md-block">
              <h5>First slide</h5>
              <p>Purchase Shirts from Teams in different leagues.</p>
            </div>
          </div>
          <div class="carousel-item">
            <img
              src="/assets/12887_en-12633-es-bernabeu-l35-architects-04sw1920sh1080ct1.sw1440.sh810.ct1.jpg"
              class="d-block w-100"
              alt="..."
            />
            <div class="carousel-caption d-none d-md-block">
              <h5>Second slide</h5>
              <p>
                Clothing that ranges all the way from street to football kits.
              </p>
            </div>
          </div>
          <div class="carousel-item">
            <img
              src="/assets/zoom-on-f900-fifa-pro-approved-ball.avif"
              class="d-block w-100"
              alt="..."
            />
            <div class="carousel-caption d-none d-md-block">
              <h5>Third slide</h5>
              <p>
                An eccomerce website designed to satisfy Footballer's clothing
                needs.
              </p>
            </div>
          </div>
        </div>
        <button
          class="carousel-control-prev"
          type="button"
          data-bs-target="#carouselExampleCaptions"
          data-bs-slide="prev"
        >
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button
          class="carousel-control-next"
          type="button"
          data-bs-target="#carouselExampleCaptions"
          data-bs-slide="next"
        >
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>
      <h2>Top Offers</h2>
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

    <script src="java.js"></script>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
      crossorigin="anonymous"
    ></script>
  </body>
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