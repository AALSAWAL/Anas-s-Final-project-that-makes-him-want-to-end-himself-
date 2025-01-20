<?php

require 'connect.php';
session_start();

if(isset($_SESSION['username'])) {
    header('Locatio: index.php');
}

if (isset($_POST['login'])) {
    $username = $_POST['Username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM user WHERE username='$username' AND password='$password';";

    $result = mysqli_query($conn, $sql);
    $loggedInUser = mysqli_fetch_assoc($result);

    if ($loggedInUser) {
        $_SESSION['username'] = $username;
        header("Location: Products.php");

    } else {
        echo "<script> window.alert('invalid username or password'); </script>";
    }

}

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
    <body class="background-changerlogin">
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
                <li><a href="LOGINfile.php"><button>Sign in / Sign up</button></a></li>
            </ul>
        </nav>
        </header>
        <main>
            <div class="aligner">
                <img class="imagechanger" src="/assets/Footkit.png" alt="Footkit image">
                <form action="LOGINfile.php" method="POST">
                <label for="Username">Username:</label>
                <input type="text" name="Username" id="Username" placeholder="Ex:JohnDoe123">
                <br>
                <br>
                <label for="password"> Password: </label>
                <input type="password" name="password" id="password">
                <br>
                <br>
                <button type="submit" class="button-signup" name="login" class = "button_login">Login</button>
                </form>
                
                <a class="forgt-account" href="">Forgot Password?</a>  
                <br>
                <br>
                <a class="forgt-account" href="/SignUp.php">Create Account</a>
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