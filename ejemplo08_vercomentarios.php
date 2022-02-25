<?php 
	include 'encabezado.php';
?>
	<a href="ejemplo08.php">Ir al Inicio</a>
<?php
	include 'conexion.php';
	$sql = "SELECT * from tbl_comentarios WHERE id_tema = '$_GET[id_tema]' order by fecha desc, hora desc";
	$resultado = mysqli_query($enlace, $sql);
	$cantidad = mysqli_num_rows($resultado);
	if ($cantidad > 0){
?>
		<table class="temas">
			<tr>
				<th>Comentario</th>
				<th>Autor</th>
				<th>Fecha</th>
				<th>Hora</th>
			</tr>
		<?php while ($datos = mysqli_fetch_array($resultado)) { ?>
			<tr>
				<td><?php echo $datos['comentario'] ?></td>
				<td><?php echo $datos['autor_comentario'] ?></td>
				<td><?php echo $datos['fecha'] ?></td>
				<td><?php echo $datos['hora'] ?></td>
			</tr>
		<?php } ?>
		</table>
<?php
	   $texto = "<div class='resultado exito'>Fin de los comentarios registrados para este tema.</div>";	
	}else{
		$texto = "<div class='resultado alerta'>No hay comentarios registrados para el temas.</div>";
	}
	$_GET['mensaje'] = $texto;
?>
<?php 
	include 'pie.php';
?>