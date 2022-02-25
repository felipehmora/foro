<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>ejemplo7</title>
</head>
<body>
	<h1>Área del triángulo.</h1>
	<form>
		<table align="center">
			<tr>
				<td>Longitud base:</td>
				<td>
					<input type="text" 
					       name="v_base"
					       required="">
				</td>
			</tr>
			<tr>
				<td>Longitud altura:</td>
				<td>
					<input type="text" 
					       name="v_altura"
					       required="">
				</td>
			</tr>
			<tr>
				<td>Resultado:</td>
				<td>
					<?php 
						include 'ejemplo07_funciones.php';
						if (isset($_GET['v_base']) && isset($_GET['v_altura'])){
							$base = $_GET['v_base'];
							$altura = $_GET['v_altura'];
							echo area_triangulo($base, $altura);
						}else{
							echo "0";
						}
						unset($_GET['v_base']);
						unset($_GET['v_altura']);
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