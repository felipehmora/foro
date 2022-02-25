<?php 
	function area_cuadrado($arg_lado){
		$calculo = $arg_lado*$arg_lado;
		return $calculo;
	}

	function area_triangulo($arg_base, $arg_altura){
		$calculo = ($arg_base*$arg_altura)/2;
		return $calculo;
	}

	function area_circulo($arg_radio){
		$calculo = pi()*pow($arg_radio,2);
		return $calculo;
	}
?>