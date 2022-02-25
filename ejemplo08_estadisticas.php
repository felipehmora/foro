<?php 
	include 'encabezado.php';
?>
<a href="ejemplo08.php">Ir al Inicio</a>
<?php
	include 'conexion.php';
	$sql = "SELECT tema, count(comentario) as cnt_comentarios 
	        from vw_foro_resumen3 
	        group by tema 
	        order by cnt_comentarios desc";
	// **********Total de comentarios**************
	$sql2 = "SELECT * from tbl_comentarios";
	$resultado2 = mysqli_query($enlace, $sql2);
	$cantidad2 = mysqli_num_rows($resultado2);
	// *********************************************

	$resultado = mysqli_query($enlace, $sql);
	if ($resultado){
		$cantidad = mysqli_num_rows($resultado);
		if ($cantidad>0){
?>
			<table align="center">
				<tr>
					<th>Tema</th>
					<th>Comentarios</th>
					<th>Gráfico</th>
				</tr>
				<?php while ($data = mysqli_fetch_array($resultado)) { ?>
				<tr>
					<td><?php echo $data['tema'] ?></td>					
					<td><?php echo $data['cnt_comentarios'] ?></td>
					<td>
						<meter min="0"
							   max="100"
							   value="<?php echo $data['cnt_comentarios']/$cantidad2*100 ?>"></meter>
					</td>
				</tr>
				<?php } ?>
			</table>
<?php
		}else{
			$texto = "<div class='resultado alerta'>No hay información estadística.</div>";
			$_GET['mensaje'] = $texto;
		}
	}else{
		$texto = "<div class='resultado error'>ERROR:".mysqli_error($enlace)."</div>";
		header("location:ejemplo08.php?mensaje=".$texto);
	}
?>
<?php 
	include 'pie.php';
?>