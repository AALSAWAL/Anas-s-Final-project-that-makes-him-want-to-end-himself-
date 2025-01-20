<?php 
require 'connect.php';
session_start();

if(isset($_SESSION['username'])) {
    header('Locatio: index.php');
}

if(isset($_POST['register'])) {
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $username = $_POST['Username'];
    $password = $_POST['password'];
    $email = $_POST['Email'];
    
    $sql = "INSERT INTO user(username, password, firstname, lastname, email) Values ('$username', '$password', '$firstname', '$lastname', '$email')";
    
    $result = mysqli_query($conn,$sql);

    if($result) {
        header('location: LOGINfile.php');
    } else {
    }

    unset($_POST['register']);
}

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
                    </a></li>
                <li><a href="index.php">Home</a></li>
                <li><a href="Aboutus.php">About us</a> </li>
                <li><a href="Products.php">Products</a></li>
                <li><a href="Cart.php">Cart</a></li>
                <li><button>Sign in / Sign up</button></li>
            </ul>
        </nav>
    </header>
    <main class="SignUpContainerCentralized">
        <div class="SignUpContainer">
            <img class="imagechanger" src="/assets/Footkit.png" alt="Footkit image">
            <form action="SignUp.php" method="POST">
            <label for="firstname">First name:</label>
        <input type="text" id="firstname" name="firstname" placeholder="Ex:Anas" required>
        <br>
        <br>
        <label for="lastname">Last name:</label>
        <input type="text" id="lastname" name="lastname" placeholder="Ex:Sawalqa" required>
        <br>
        <br>
        <label for="Email">Email:</label>
        <input type="Email" name="Email" id="Email" required>
        <br>
        <br>
        <label for="Username">Username:</label>
        <input type="text" name="Username" id="Username" placeholder="Ex:JohnDoe123" required>
        <br>
        <br>
        <label for="password"> Password: </label>
        <input type="password" name="password" id="password" required>
        <br>
        <br>
        <button type="submit" class="button-signup" name="register">Sign up</button>
            </form>
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

