<?php
session_start();

try
{
    $db = new PDO('mysql:host=localhost;dbname=database;charset=utf8', 'root', '');
}
catch (Exception $e)
{
    die('Erreur : ' . $e->getMessage());
}

function addUser($email,$password){
    global $db;
    try {
        $sqlQuery = 'INSERT INTO utilisateurs(email, password) VALUES (:email, :password)';
    
        $addUser = $db->prepare($sqlQuery);
        $addUser->execute([
            'email' => $email,
            'password' => $password,
        ]);
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }
    $_SESSION['logged_user'] = $email;
    header('location:index.php');

    
}

function login($email,$password){
    global $db;

    $sqlQuery = 'SELECT * FROM utilisateurs WHERE email = :email';
    $user = $db->prepare($sqlQuery);
    $user->execute([
        'email' => $email
    ]);
    $user = $user->fetchAll();

    if(!isset($user[0])){
        echo '<div class="alert alert-primary" role="alert">
        Bad credentials !
      </div>';
    }else{
        if(password_verify($password, $user[0]['password'])){
            $_SESSION['logged_user'] = $user[0]['email'];
            if(($_POST['ident'])){
                setcookie('email', $_POST['email'], time()+3600*24*30);
                setcookie('password', $_POST['password'], time()+3600*24*30);
            }
            header('location:index.php');
        }else{
            echo '<div class="alert alert-danger container" role="alert">
            Bad credentials !
          </div>';
        // echo '<script>alert("Bad credentials")</script>';
        }
    }
}

?>