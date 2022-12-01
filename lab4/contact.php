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

<div class="intro__service">
    <div class="container__service">
        <div class="intro__inner">
            <form class="box" method="post">
                <h1>DataBase</h1>
                <input type="text" id="login" name="login" placeholder="Username">
                <input type="email" id="email" name="email" placeholder="Email">
                <input type="password" id="password" name="password" placeholder="Password">
                <input type="number" id="id" name="id" placeholder="Id for Up/Del">
                <div class="parent">
                <div class="child"><button type="submit" name="Create" id="sendInfo">Create</button></div>
                <div class="child"><button type="submit" name="Update">Update</button></div>
                <div class="child"><button type="submit" name="Delete">Delete</button></div>
                </div>
            </form>
        </div>
    </div>
</div>

<?php

$data= $_POST;

if( !R::testConnection())
{
    exit('Isnt connections with database');
}

function dump($what)
{
    echo '<pre>'; print_r($what);echo '</pre>';
}

$data= $_POST;
// ------------------Create---------------
if( isset($data["Create"])) 
{
$user1 = R::findOrCreate('users', array(
    'login' => $data['login'],
    'email' => $data['email'],
    'password' => $data['password']
));

}

//-----------------------------------------
// -----------UPDATE-----------------------
if( isset($data["Update"])) 
{
    //update
$user1 = R::load('users', $data['id']);
$user1->login = $data['login'];
$user1->email = $data['email'];
R::store($user1);

}
//-----------------------------------------
//--------------------DELETE--------------
if( isset($data["Delete"])) 
{
    $user1 = R::load('users', $data['id']);
    R::trash($user1);
}
//-----------------------------------------
?>


<script src="assetss/JS.js"></script>

</body>
</html>