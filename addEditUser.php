<?php

// Conexion a la base de datos
require_once('./config/bdd.php');

if (isset($_POST['nombre']) && isset($_POST['login'])&& isset($_POST['clave'])){
	
	$user = $_POST['nombre'];
	$login = $_POST['login'];
	$clave = $_POST['clave'];

	$sql = "INSERT INTO usuarios(nombre, login, clave ) values ('$user', '$login', '$clave')";
	
	echo $sql;
	
	$query = $bdd->prepare( $sql );
	if ($query == false) {
	 print_r($bdd->errorInfo());
	 die ('Erreur prepare');
	}
	$sth = $query->execute();
	if ($sth == false) {
	 print_r($query->errorInfo());
	 die ('Erreur execute');
	}

}
header('Location: '.$_SERVER['HTTP_REFERER']);

	
?>