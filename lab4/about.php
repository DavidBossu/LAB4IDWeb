<?php
require __DIR__ . '/db.php';
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name = "viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="styles.css">
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
          <a class="nav__link" href="crud.php">DateBase</a>
          <a class="nav__link" href="contact.php">BdContact</a>
          <a class="nav__link" href="../lab4/logout.php">Logout</a>
          <a class="nav__link" href="../index.html">To lab5</a>
        <?php else : ?>
          <a class="nav__link" href="login.php">Autorisation</a>
        <?php endif; ?>
      </nav>
      <div class="nav-toggle" id="nav_toggle" type="button" onclick="checkToggle()" name="">
        <span class="nav-toggle__item"></span>
      </div>
    </div>
  </div>
</header>

<div class="intro__about">


  <div class="container__about">
    <div class="intro__inner">
      <h4 class="intro__about__title">Products</h4>
    </div>

    <div class="about">
      <div class="about__item">
        <div class="about__img">
          <img src="assetss/serversimg/4.jpg" alt="">
        </div>
        <div class="about__text">
         <br> Ram: 4gb </br>
          <br>Ssd: 120gb</br>
          <br>Ryzen 5 1600h</br>
        </div>
      </div>

      <div class="about__item">
        <div class="about__img">
          <img src="assetss/serversimg/4.jpg" alt="">
        </div>
        <div class="about__text">
          <br> Ram: 8gb </br>`
           <br>Ssd: 240gb</br>
           <br>Ryzen 5 2600h</br>
         </div>
      </div>

      <div class="about__item">
        <div class="about__img">
          <img src="assetss/serversimg/4.jpg" alt="">
        </div>
        <div class="about__text">
          <br> Ram: 12gb </br>
           <br>Ssd: 360gb</br>
           <br>Ryzen 5 3600h</br>
         </div>
      </div>
    
    </div>
  </div>
</div>


<script src="assetss/JS.js"></script>
</body>
</html>