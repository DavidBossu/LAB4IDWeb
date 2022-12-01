<?php
require __DIR__ . '/db.php';

unset($_SESSION['logged_user']);
header('Location: ../lab4/index.php');
?>