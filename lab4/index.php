<!DOCTYPE html>
<?php
require __DIR__ . '/db.php';

?>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name = "viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Kaushan+Script&family=Montserrat:wght@700&display=swap" rel="stylesheet"><body>
</head>
  <body>

<header class="header">
    <div class="container">
        <div class="header__inner">
            <div class="header__logo">Logo</div>
                
            <nav class="nav">
                <a id="timer">NewOffers</a>
                <a class="nav__link" href="about.php">About</a>
                <a class="nav__link" href="service.php">Service</a>
                <?php if (isset($_SESSION['logged_user'])): ?>
                    <a class="nav__link" href="contact.php">BdContact</a>
                    <a class="nav__link" href="crud.php">DateBase</a>
                    <a class="nav__link" href="../lab4/logout.php">Logout</a>
                    <a class="nav__link" href="../index.html">To lab5</a>

                <?php else : ?>
                    <a class="nav__link" href="login.php">Autorisation</a>
                <?php endif; ?>
            </nav>
        </div>
    </div>
</header>

<div class="intro">
    <div class="container">
        <div class="intro__inner">
            <h1 class="intro__title">Welcome to my site</h1>
            <h2 class="intro__suptitle">Servers</h2>
           <p></p>
            <a class="btn" href="#">Learn More</a>
        </div>
    </div>
</div>







<script src="assetss/JS.js"></script>
</body>
</html>