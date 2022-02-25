<!--
Foro:
1) Registro de temas.
2) Registro de Comentarios.
3) Consultar comentarios por temas.
4) Cantidad de comentarios por temas.
Se van a establecer enlaces para el registro de temas
y actualización de comentarios.
-->
<?php 
	include 'encabezado.php';
?>
<a href="ejemplo08_vertemas.php">Ver temas registrados</a>
<a href="ejemplo08_estadisticas.php">Estadísticas de Temas</a>
	<form method="POST" 
	      action="ejemplo08_ingtemas.php">
		<table align="center">
			<tr>
				<td>Nombre del Autor:</td>
				<td>
					<input type="text" 
					       name="v_autor"
					       required="">
				</td>
			</tr>
			<tr>
				<td>Título del tema:</td>
				<td>
					<textarea cols="25"
					          rows="4"
					          name="v_tema"></textarea>
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
				</td>
			</tr>
		</table>
	</form>
<?php 
	include 'pie.php';
?>