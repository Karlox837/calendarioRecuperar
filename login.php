<?php
require_once('./config/bdd.php');

$sql = "SELECT login, clave, nombre FROM usuarios";

$req = $bdd->prepare($sql);
$req->execute();


$events = $req->fetchAll();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Calendario Salas Recuperar</title>
    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!--Estilos personalizados para este proyecto-->
    <link href="css/style.css" rel="stylesheet">
    <link href="css/style-responsive.css" rel="stylesheet">
</head>
<body>
    <!--Cuerpo de la pagina-->
    <div id="login-page">
        <div class="container">
            <form class="form-login" name="login">
                <h2 class="form-login-heading">Iniciar sesión</h2>
                <div class="login-wrap">
                    <input type="text" class="form-control" placeholder="Usuario" autofocus>
                </br>
                    <input type="password" class="form-control" placeholder="Contraseña">
                        <span class="pull-right">
                            <label class="checkbox">
                            <input type="checkbox" value="RecordarUsuario"> Recordar Usuario </input>
                            </label>
                        </span>
                </br>
                <button class="btn btn-theme btn-block" onclick="login()" type="button"><i class="fa fa-lock"></i>Ingresar</button>    
                </div>
            </form>
        </div>
    </div>
    <!-- JS al final del documento para facilitar su carga-->
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <!--Efecto del fondo-->
    <script type="text/javascript" src="js/jquery.backstretch.min.js"></script>
    <script>
        $.backstretch("img/login-background.jpg",{ speed:1000});

        function login(){
            var done = 0;
            var usuario = document.login.usuario.value;
            var password= document.login.password.value;

            if(usuario)

        }
    </script>
</body>
</html>