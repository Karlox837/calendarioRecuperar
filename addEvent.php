<?php

// Conexion a la base de datos
require_once('./config/bdd.php');

if (isset($_POST['title']) && isset($_POST['start']) && isset($_POST['end']) && isset($_POST['color'])  &isset($_POST['reserva'])){
	
	$title = $_POST['title'];
	$start = $_POST['start'];
	$end = $_POST['end'];
	$color = $_POST['color'];
	$reserva = $_POST['reserva'];

	$sql = "INSERT INTO events values ('$title', '$start', '$end', '$color', '$reserva')";
	
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