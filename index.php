<?php

try {
	
	$conexion=new PDO('mysql:host=localhost; dbname=Paginacion','root','');

} catch (PDOException $e) {
	echo "ERROR: ".$e->getMessage();
	die();
}


require_once 'index.view.php';