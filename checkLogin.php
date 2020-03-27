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
    











/*


if (isset($_POST['username']) && isset($_POST['password'])){

    $usuario = $_POST['username'];
    $password = $_POST['password'];
    
    $query = $bdd->prepare ("SELECT * FROM usuarios WHERE login = $usuario AND clave = $password");
    $query ->execute();
    $result = $query->fetchAll(PDO::FETCH_ASSOC);
    print_r($result); 
       

    if($password == $row['clave']){
    /*
        $_SESSION['loggedin'] = true;
        $_SESSION['username'] = $username;
        $_SESSION['start'] = time();
        $_SESSION['expire'] = $_SESSION['start'] + (5 * 1800);
        header('Location: index.php'); 

    } else {
    print_r($result); 

    }

if (isset($_POST['username']) && isset($_POST['password'])){
               
        $sql = "SELECT * FROM usuarios WHERE login = $usuario and clave = $password";
    
        $query = $bdd->prepare ( $sql );
        if ($query == false) {
            print_r($bdd->errorInfo());
            die ('Erreur prepare');
           }
           $res = $query->execute();
           if ($res == false) {
            print_r($bdd->errorInfo());
            die ('Erreur execute');
           }
           print_r($result); 
    }

}
/*$username = $_POST['username'];
$password = $_POST['password'];


$sql = "SELECT * FROM usuarios WHERE login = '$username'";

$result = $bdd->query($sql);

if ($result->num_rows > 0){
     $row = $result->fetchAll();
    }
   
    if ($password == $row['clave']){
        
        $_SESSION['loggedin'] = true;
        $_SESSION['username'] = $username;
        $_SESSION['start'] = time();
        $_SESSION['expire'] = $_SESSION['start'] + (5 * 1800);
        
        header('Location: index.php');  
    } else {
     header('Location: errorLogin.html');
    }
    mysql_close($bdd);
-->*/?>