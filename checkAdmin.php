<?php 
    session_start();
    require_once('./config/bdd.php');
  
    $usuario = $_POST['username'];
    $password = $_POST['password'];

    if ($usuario == "LuzP" and $password == "32299016") {

      $_SESSION['loggedin'] = true;
      $_SESSION['username'] = $usuario;
      $_SESSION['start'] = time();
      $_SESSION['expire'] = $_SESSION['start'] + (5 * 1800);
        header('Location: eventos.php'); 
     } else  {  
          header('Location: login.html');
        }


?>