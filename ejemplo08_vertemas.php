<!--
Este programa debe:
1) Mostrar el detalle de los temas.
2) La información será ordenada de forma descendente, por
   fecha y hora.
3) Se incluirá funcionalidad, que permita añadir comentarios
   acerca del tema.
4) La salida debe incluir la cantidad de comentarios,
   acerca de cada tema.
-->
<?php 
	include 'encabezado.php';
?>
	<a href="ejemplo08.php">Ir al Inicio</a>
<?php
	include 'conexion.php';
	$sql = "SELECT * from tbl_temas order by fecha desc, hora desc";
	$resultado = mysqli_query($enlace, $sql);
	$cantidad = mysqli_num_rows($resultado);
	if ($cantidad > 0){
?>
		<table class="temas">
			<tr>
				<th>Tema</th>
				<th>Autor</th>
				<th>Fecha</th>
				<th>Hora</th>
				<th>Comentarios</th>
			</tr>
		<?php while ($datos = mysqli_fetch_array($resultado)) { ?>
			<tr>
				<td><a href="ejemplo08_comentario.php?id_tema=<?php echo $datos['id'] ?>"><?php echo $datos['tit'] ?></a></td>
				<td><?php echo $datos['autor_tema'] ?></td>
				<td><?php echo $datos['fecha'] ?></td>
				<td><?php echo $datos['hora'] ?></td>
				<td align="right">
					<?php 
						$sql_comentarios = "SELECT * FROM tbl_comentarios WHERE id_tema = '$datos[id]'";
						$r_comentarios = mysqli_query($enlace,$sql_comentarios);
						$cnt_comentarios = mysqli_num_rows($r_comentarios);
					?>
					<?php if ($cnt_comentarios > 0) { ?>
						<a href="ejemplo08_vercomentarios.php?id_tema=<?php echo $datos['id'] ?>"><?php echo $cnt_comentarios; ?></a>
					<?php }else{
						$texto = "<div class='resultado alerta'>Sin comentarios</div>";
						echo $texto;
					} ?>

				</td>
			</tr>
		<?php } ?>
		</table>
<?php
	   $texto = "<div class='resultado exito'>Fin de los temas registrados en el foro.</div>";	
	}else{
		$texto = "<div class='resultado alerta'>No hay temas registrados para el foro.</div>";
	}
	$_GET['mensaje'] = $texto;
?>
<?php 
	include 'pie.php';
?>