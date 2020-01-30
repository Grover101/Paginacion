<?php

try {
	
	$conexion=new PDO('mysql:host=localhost; dbname=Paginacion','root','');

} catch (PDOException $e) {
	echo "ERROR: ".$e->getMessage();
	die();
}

$pagina = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;
$postPorPagina = 5;

$inicio = ($pagina > 1) ? ($pagina * $postPorPagina - $postPorPagina) : 0 ;
$articulos = $conexion->prepare("SELECT SQL_CALC_FOUND_ROWS * FROM articulos LIMIT $inicio, $postPorPagina");

$articulos->execute();
$articulos = $articulos->fetchAll();

// print_r($articulos);

if(!$articulos){
	header('Location: http://localhost/Paginación/');
}


$totalArticulos=$conexion->query('SELECT FOUND_ROWS() AS total');
$totalArticulos=$totalArticulos->fetch()['total'];

$numeroPaginas=ceil($totalArticulos/$postPorPagina);

echo $numeroPaginas;


require_once 'index.view.php';