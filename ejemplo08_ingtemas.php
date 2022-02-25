<?php 
	include 'conexion.php';

	date_default_timezone_set("America/Caracas");
	$fecha = date("Y-m-d");
	$hora  = date("H:i:s");

	$sql = "INSERT into tbl_temas(tit,
	                              autor_tema,
	                              fecha,
	                              hora) VALUES 
	                              ('$_POST[v_tema]',
	                               '$_POST[v_autor]',
	                               '$fecha',
	                               '$hora')";

	$resultado = mysqli_query($enlace, $sql);

	if ($resultado){
		$texto = "<div class='resultado exito'>El tema fué registrado con éxito.</div>";
	}else{
		$texto = "<div class='resultado error'>ERROR:".mysqli_error($enlace)."</div>";
	}
	header("location:ejemplo08.php?mensaje=".$texto);
?>