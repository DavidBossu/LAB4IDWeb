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



<div class="intro__service">
    <div class="container__service">
        <div class="intro__inner">
            <form class="box" method="post">

                <h1>Registration</h1>
                <input type="text" id="login" name="login" placeholder="Username">
                <input type="email" id="email" name="email" placeholder="Email">
                <input type="password" id="password" name="password" placeholder="Password">
                <input type="password" id="password_2" name="password_2" placeholder="Password">
                <div class="parent">
                <div class="child"> <button type="submit" name="do_signup">Register</button></div>
                <div class="child">
                <nav class="nav">
                <button type="submit_green" name="to_login" class="nav__linkk" >
                    <a href="login.php" style=" color: green; text-decoration: none; ">
                     LogIn
                    </a>
                    </button></div>
                </div>
                <?php 
                $data= $_POST;
                if( isset($data["do_signup"])) //daca exista in variabila data acest buton do_signup, atunci se adauga tot in fisier
                {
                    //aici inregistram
                    $errors = array();
                    
                    if( trim($data['login']) == '')
                    {
                        $errors[] = "Wrong login";
                    }
                
                    if( trim($data['email']) == '')
                    {
                        $errors[] = "Wrong email";
                    }
                
                    if( $data['password'] == '')
                    {
                        $errors[] = "Password incorrect";
                    }
                
                    if( $data['password_2'] != $data['password'])
                    {
                        $errors[] = "Second password is incorrect";
                    }
                
                    if(R::COUNT('users' , "login = ?", array($data['login'])) > 0)
                    {
                        $errors[] = 'User with this login already exist';
                    }
                
                
                    if(R::COUNT('users' ,  "email =?",array($data['email'])) > 0)
                    {
                        $errors[] = 'User with this email already exist';
                    }
                    if (empty($errors))
                    { 
                        //Daca tot merge bine atunci inregistram
                        $user= R::getRedBean()->dispense('users');
                        $user->login = $data['login'];
                        $user->email = $data['email'];
                        $user->password = password_hash($data['password'], PASSWORD_DEFAULT);
                        R::store($user);

                        http_response_code(201);
                        echo '<div style=" color: green;">Register succes</div>';
                        
                    } else{
                        //Daca nu atunci nu
                        http_response_code(400);
                        echo '<div style=" color: red;">'.array_shift($errors).'</div  class ="new1">';
                
                    }
                }
                ?>

                
            </form>
        </div>
    </div>
</div>


<script src="assetss/JS.js"></script>
</body>
</html>
