<!DOCTYPE html>
<html>
<head>
	<title>ejemplo04</title>
	<style type="text/css">
		*{
			font-family: verdana;
		}
		div{
			text-align: center;
		}
		h1{
			text-align: center;
			padding: 15px;
			background-color: cadetblue;
		}
		h3{
			text-align: center;
			padding: 5px;
		}
		.error{
			background-color: red;
			padding: 10px;
			text-align: center;
			color: white;
		}
		.alerta{
			background-color: orange;
			padding: 10px;
			text-align: center;
			color: white;
		}
		.exito{
			background-color: green;
			padding: 10px;
			text-align: center;
			color: white;
		}
	</style>
</head>
<body>
	<h1>Encuesta</h1>
	<h3>Por favor indicar cuál de los siguientes<br>lenguajes de programación es el de su preferencia:</h3>
	<form method="GET">
		<div>
			<input type="radio" 
			       name="opcion"
			       value="PYTHON">PYTHON
			<input type="radio" 
			       name="opcion"
			       value="JAVA">JAVA
			<input type="radio" 
			       name="opcion"
			       value="PHP">PHP
			<input type="radio" 
			       name="opcion"
			       value="JAVASCRIPT">JAVASCRIPT
			<input type="radio" 
			       name="opcion"
			       value="NO OPINA">NO OPINA
		</div>
		<div>
			<input type="submit" 
			       name=""
			       value="GUARDAR">
		</div>
	</form>
	<?php 
		if (isset($_GET['opcion'])){
			// Se define zona horaria
			date_default_timezone_set("America/Caracas");
			$fecha = date("Y-m-d");
			$hora  = date("H:i:s");
			$separador = ";";
			$salto = "\n";
			$archivo = fopen("encuesta.txt","a+");
			$registro = $fecha.
			            $separador.
			            $hora.
			            $separador.
			            $_GET['opcion'].
			            $separador.
			            $salto;
			fwrite($archivo,$registro);
			fclose($archivo);
			$texto = "<div class='exito'>Usted seleccionó la opción:".$_GET['opcion'].", fecha y hora de registro: ".$fecha.",".$hora."</div>";
			$_GET['mensaje'] = $texto;
			unset($_GET['opcion']);
		}else{
			$texto = "<div class='alerta'>Debe seleccionar una opción antes de guardar.</div>";
			$_GET['mensaje'] = $texto;
		}
	?>
<hr>
<h3>Resultados de la Encuesta</h3>
<?php 
	$data = file("encuesta.txt");

	$resumen = [["PYTHON",0],
                ["JAVA",0],
                ["PHP",0],
                ["JAVASCRIPT",0],
                ["NO OPINA",0]];

	for ($i=0; $i < count($data) ; $i++) { 
		//echo $data[$i]."<br>";
		$detalle = explode(";", $data[$i]);

/*

$detalle
 0           1          2       3
+-----------+----------+-------+---+
 aaaa-mm-dd  hh:mm:ss   opción  \n
+-----------+----------+-------+---+
 ...
*/
		switch ($detalle[2]) {
			case 'PYTHON':
				$resumen[0][1]++;
				break;
			case 'JAVA':
				$resumen[1][1]++;
				break;
			case 'PHP':
				$resumen[2][1]++;
				break;
			case 'JAVASCRIPT':
				$resumen[3][1]++;
				break;
			default:
				$resumen[4][1]++;
				break;
		}
	}
?>
	<table align="center" border="1">
		<tr>
			<th>Opción</th>
			<th>Cantidad</th>
			<th>%</th>
			<th>Gráfico</th>
		</tr>
		<?php for ($i=0; $i < count($resumen); $i++) { ?>
		<tr>
			<td><?php echo $resumen[$i][0] ?></td>			
			<td align="right"><?php echo $resumen[$i][1] ?></td>
			<td align="right"><?php echo number_format($resumen[$i][1]/count($data)*100,2,',','.')  ?></td>
			<td>
				<meter low="33" 
					   high="66" 
					   optimum="80" 
				       min="0"
				       max="100"
				       value="<?php echo $resumen[$i][1]/count($data)*100 ?>" ></meter>
			</td>
		</tr>	
		<?php } ?>
	</table>
<?php
	echo "<hr>";
?>

<?php 
	if (isset($_GET['mensaje'])) {
		echo $_GET['mensaje'];
	}
?>
</body>
</html>