<?php 
/*
Las funciones se definene al comienzo del programa
*/
function potencia($arg_b, $arg_e){
	$producto = 1;
	$i = 0;
	while ($i < $arg_e){
		$producto = $producto * $arg_b;
		$i = $i + 1;
	}
	return $producto;
}

function sumar($arg1,$arg2){
	return $arg1+$arg2;
}

function restar($arg1,$arg2){
	return $arg1-$arg2;
}

function multiplicar($arg1,$arg2){
	return $arg1*$arg2;
}

function dividir($arg1,$arg2){
	if ($arg2 == 0){
		return 'Error, división por cero';
	}else{
		return $arg1/$arg2;	
	}

}

/*
Cuerpo principal del programa

$base = 2;
$exponente = 3;
echo potencia($base, $exponente);
*/
?>
<h1>Operaciones básicas de calculadora</h1>
<form>
	<table align="center">
		<tr>
			<td>1er. Número:</td>
			<td>
				<input type="text" name="n1" required="">
			</td>
		</tr>
		<tr>
			<td>2do. Número:</td>
			<td>
				<input type="text" name="n2" required="">
			</td>
		</tr>
		<tr>
			<td>Resultado:</td>
			<td>
				<?php 
					$texto = "Ingrese valores.";
					$_GET['mensaje'] = $texto;
					if (isset($_GET['n1']) && 
						isset($_GET['n2']) &&
					    isset($_GET['op'])){
						$n1 = $_GET['n1'];
						$n2 = $_GET['n2'];
						switch ($_GET['op']) {
							case '^':
								echo potencia($n1, $n2);
								break;
							case '+':
								echo sumar($n1, $n2);
								break;
							case '-':
								echo restar($n1, $n2);
								break;
							case '*':
								echo multiplicar($n1, $n2);
								break;
							case '/':
								echo dividir($n1, $n2);
								break;
							default:
								echo 'Operación no válida';
								break;
						}
						unset($_GET['n1']);
						unset($_GET['n2']);
						unset($_GET['op']);
					}else{
						echo "0";
					}
				?>
			</td>
		</tr>
		<tr>
			<td colspan="2" align="center">
				<input type="submit" 
				       name="op"
				       value="+">
				<input type="submit" 
				       name="op"
				       value="-">
				<input type="submit" 
				       name="op"
				       value="*">
				<input type="submit" 
				       name="op"
				       value="/">
				<input type="submit" 
				       name="op"
				       value="^">
			</td>
		</tr>
	</table>
</form>
<?php 
	if (isset($_GET['mensaje'])){
		echo $_GET['mensaje'];
	}
?>
