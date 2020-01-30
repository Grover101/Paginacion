<?php

try {
	
	$conexion=new PDO('mysql:host=localhost; dbname=Paginacion','root','');

} catch (PDOException $e) {
	echo "ERROR: ".$e->getMessage();
	die();
}

$pagina=isset($_GET['pagina'])? (int)$_GET['pagina'] : 1;
$postPorPagina=5;

$inicio=($pagina>1)?($pagina*$postPorPagina-$postPorPagina):0;

$articulos=$conexion->prepare("SELET SQL_CALC_FOUND_ROWS * FORM articulos LIMT $inicio, $postPorPagina");

$articulos->execute();
$articulos=$articulos->fetchAll();

print_r($articulos);

require_once 'index.view.php';