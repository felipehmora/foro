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

/*
Cuerpo principal del programa
*/

$base = 2;
$exponente = 3;
echo potencia($base, $exponente);
?>