<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Paginacion</title>
	<link rel="stylesheet" href="estilos.css">
	<link href="https://fonts.googleapis.com/css?family=Gochi+Hand&display=swap" rel="stylesheet">
</head>
<body>
	<div class="contenedor">
		<h1>Articulos</h1>
		<section class="articulos">
			<ul>
				<?php foreach ($articulos as $articulo): ?>
					<li>
						<?php echo $articulo['id'].'.- '.$articulo['articulo'] ?>
					</li>
				<?php endforeach ?>
			</ul>
		</section>

		<section class="paginacion">
			<ul>
				
				<?php if ($pagina==1): ?>
					<li class="disabled"><a href="#">&laquo;</a></li>
				<?php else: ?>
					<li><a href="?pagina=<?php echo $pagina-1; ?>">&laquo;</a></li>
				<?php endif; ?>

				<?php 

				for ($i=1; $i <= $numeroPaginas; $i++) { 
					if ($pagina==$i) {
						echo "<li class='active'><a href='?pagina=$i'>$i</a></li>";
					}else{
						echo "<li><a href='?pagina=$i'>$i</a></li>";
					}
				}

				?>

				<?php if ($pagina==$numeroPaginas): ?>
					<li class="disabled"><a href="#">&raquo;</a></li>
				<?php else: ?>
					<li><a href="?pagina=<?php echo $pagina+1; ?>">&raquo;</a></li>
				<?php endif; ?>

				<!-- <li class="disabled"><a href="#">&laquo;</a></li>
				<li class="active"><a href="#">1</a></li>
				<li><a href="#">2</a></li>
				<li><a href="#">3</a></li>
				<li><a href="#">4</a></li>
				<li><a href="#">&raquo;</a></li> -->
			</ul>
		</section>
	</div>
</body>
</html>