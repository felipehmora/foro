<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>ejemplo7</title>
</head>
<body>
	<h1>Área del cuadrado.</h1>
	<form>
		<table align="center">
			<tr>
				<td>Longitud del lado:</td>
				<td>
					<input type="text" 
					       name="v_lado"
					       required="">
				</td>
			</tr>
			<tr>
				<td>Resultado:</td>
				<td>
					<?php 
						include 'ejemplo07_funciones.php';
						if (isset($_GET['v_lado'])){
							$lado = $_GET['v_lado'];
							echo area_cuadrado($lado);
						}else{
							echo "0";
						}
						unset($_GET['v_lado']);
					?>
				</td>
			</tr>
			<tr>
				<td colspan="2" align="center">
					<input type="submit"
				    	   name=""
				       	   value="CALCULAR">
				    <input type="reset"
				           name=""
				           value="LIMPIAR">
				</td>
			</tr>
		</table>
	</form>

</body>
</html>