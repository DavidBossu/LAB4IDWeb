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
                    <a class="nav__link" href="contact.php">BdContact</a>
                    <a class="nav__link" href="crud.php">DateBase</a>
                    <a class="nav__link" href="../lab4/logout.php">Logout</a>
                    <a class="nav__link" href="../index.html">To lab5</a>
                <?php else : ?>
                     <a class="nav__link" href="..//lab4/login.php">Autorisation</a>
                <?php endif; ?>
            </nav>
            <div class="nav-toggle" id="nav_toggle" type="button" onclick="checkToggle()" name="">
                <span class="nav-toggle__item"></span>
            </div>
        </div>
    </div>
</header>



<div class="intro__service">
    <div class="container__service">
        <div class="intro__inner">
            <form class="box" method="post">

                <h1>Autorisation</h1>
                <input type="text" id="login" name="login" placeholder="Username">
                <input type="password" id="password" name="password" placeholder="Password">
                <div class="parent">
                <div class="child"> <button type="submit" name="do_login" >Login</button></div>
                <div class="child">
                    <nav class="nav">
                         <button type="submit" name="do_signup" class="nav__linkk">
                        <a href="signup.php" style=" color: rgb(159, 157, 157); text-decoration: none; ">
                            Register
                        </a></button>
                    </nav>
                </div>
                </div>
                <?php 
//--------------------------------------------------------------------------------------------------------------------
                $data= $_POST;
                if( isset($data['do_login']))
                {
                    $errors = array();
                    $user = R::findOne('users', 'login = ?', array($data['login'])); 

                        if($user)//daca se gaseste userul cu asa login:
                            {
                
                                if( password_verify($data['password'], $user->password))
                                { 
                                    //totul a mers bine si userul se autentifica
                                    $_SESSION['logged_user'] = $user;
                                    echo '<div style=" color: green;">Login succes <a style=" color: green;" href="index.php">Principal</a></div>';
                                    
                                } else{
                                    $errors[] = 'Password incorrect';
                                }
                            } else {
                                $errors[] = 'User not found';
                            }
                    if ( ! empty($errors))
                    { 
                        echo '<div style=" color: red;">'.array_shift($errors).'</div>';
                    }
                }
//--------------------------------------------------------------------------------------------------------------------

                ?>

                
            </form>
        </div>
    </div>
</div>


<script src="assetss/JS.js"></script>
</body>
</html>


