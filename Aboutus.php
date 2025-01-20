<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

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

<body class="body_backimage">
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
        <div class="AboutWeb">
            <div class="Inner-Container">
                <p class="word-size">At FootKit we are an ecommerce store tailored to selling Football Merchandise to people who enjoy
                    football. Selling Football clothing ranging from the early 2000s all the way to todays date and selling
                    merchandise such as Football Kits, Footballs, Shin Pad and etc.</p>
                <img src="/assets/Footkit.png" alt="FootKit image">
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