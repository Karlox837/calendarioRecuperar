<?php 
    session_start();
    require_once('./config/bdd.php');
  
    $usuario = $_POST['username'];
    $password = $_POST['password'];

    $query = $bdd->prepare ("SELECT * FROM usuarios WHERE login = '$usuario' AND clave = '$password'");
    $query ->execute(); 
    $query ->setAttribute(PDO::FETCH_ASSOC);
    $row = $query->fetch();
    $clave =  $row['clave'];
    $user = $row['login'];

    if($clave == $password and $usuario == $user) {

        $_SESSION['loggedin'] = true;
        $_SESSION['username'] = $usuario;
        $_SESSION['start'] = time();
        $_SESSION['expire'] = $_SESSION['start'] + (5 * 1800);
        header('Location: index.php'); 

    } else {
        header('Location: login.html');
    }
?>