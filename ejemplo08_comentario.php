<?php 
	include 'encabezado.php';
?>
<a href="ejemplo08_vertemas.php">Ver temas registrados</a>
	<form method="POST" 
	      action="ejemplo08_ingcomentario.php">
		<table align="center">
			<tr>
				<td>Autor:</td>
				<td>
					<input type="text" 
					       name="v_autor"
					       required="">
				</td>
			</tr>
			<tr>
				<td>Comentario:</td>
				<td>
					<textarea cols="25"
					          rows="4"
					          name="v_comentario"></textarea>
				</td>
			</tr>
			<tr>
				<td colspan="2" align="center">
					<input type="submit" 
					       name=""
					       value="GUARDAR">
					<input type="reset"
					       name=""
					       value="LIMPIAR">
					<input type="hidden"
					       name="id_tema"
					       value="<?php echo $_GET['id_tema'] ?>">
				</td>
			</tr>
		</table>
	</form>
<?php 
	include 'pie.php';
?>