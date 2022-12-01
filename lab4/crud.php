<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>TITLE</title>

    <link href="https://getbootstrap.com/docs/5.1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <meta name="theme-color" content="#7952b3">

    <link href="https://getbootstrap.com/docs/5.1/examples/checkout/form-validation.css" rel="stylesheet">
</head>
    
<body class="bg-light" >
<div class="container">


    <h1>BD LAB4</h1>

    <a class="btn btn-primary mt-3" role="button" href="../lab4/contact.php" >Register</a>

    <table class="table table-sm mt-3">
        <thead>
        <tr>
            <th scope="col">Id</th>
            <th scope="col">User</th>
            <th scope="col">Email</th>
        </tr>
        </thead>
        <tbody>
            <?php
            require __DIR__ . '/db.php';
            ?>

            <?php
                //  Wiew
                
                $user1 = R::findLike('users');
                foreach($user1 as $users)
                {
                    echo "
                    <tr>
                <th scope='row'> $users->id </th>
                <td>
                    <a class='btn btn-light' href=''> $users->login </a>
                </td>
                <td>
                    <a class='btn btn-light' href=''> $users->email </a>
                </td>
            </tr>";
             }
            ?>  
            
        

        </tbody>
    </table>


</form>
</div>


<?php


if( !R::testConnection())
{
    exit('Isnt connections with database');
}

function dump($what)
{
    echo '<pre>'; print_r($what);echo '</pre>';
}

$data= $_POST;
// ------------------Create------
if( isset($data["Create"])) 
{
$user1 = R::findOrCreate('users', array(
    'login' => $data['login'],
    'email' => $data['email'],
    'password' => $data['password']
));

}

//----------------------------------------------------
// -----------UPDATE-----------------------
if( isset($data["Update"])) 
{
    //update
$user1 = R::load('users', $data['id']);
$user1->login = $data['login'];
$user1->email = $data['email'];
R::store($user1);

}
//------------------------------------------
//------------DELETE-----------------
if( isset($data["Delete"])) 
{
    $user1 = R::load('users', $data['id']);
    R::trash($user1);
}
//------------------------------------------
//-----------View trough login --------------
if( isset($data["View"])) 
{
    $user1 = R::findOrCreate('users',$data['id'], array(
        'login' => $data['login'],
        'email' => $data['email'],
        'password' => $data['password']
    ));
}
?>




<script src="https://getbootstrap.com/docs/5.1/examples/checkout/form-validation.js"></script>
</body>
</html>


<!-- // ----------------------------------------------------------------
// Creem
// $user1 = R::findOrCreate('users', array(
//     'login' => '5',
//     'email' =>'5@email.ru'
// ));


// //UPDATE
// $user1 = R::load('users', 6);

// $user1->email = 'em1@mail.ru';
// R::store($user1);

// Gasim dupa login
// $user1 = R::findLike('users');
// foreach($user1 as $users)
// {
//     echo 'Id: ' . $users->id. '<br>';
//     echo 'login: ' . $users->login. '<br>';
//     echo 'Email: ' . $users->email. '<br>';
// }

//DELETE
// $user1 = R::load('users', '19');
// R::trash($user1); -->
