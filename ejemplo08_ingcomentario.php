<?php 
	include 'conexion.php';

	date_default_timezone_set("America/Caracas");
	$fecha = date("Y-m-d");
	$hora  = date("H:i:s");

	$sql = "INSERT into tbl_comentarios(comentario,
                                        autor_comentario,
                                        fecha,
                                        hora,
                                        id_tema) VALUES 
                                        ('$_POST[v_comentario]',
                                         '$_POST[v_autor]',
                                         '$fecha',
                                         '$hora',
                                         '$_POST[id_tema]')";

    $resultado = mysqli_query($enlace, $sql);
    
    if ($resultado){
    	$texto = "<div class='resultado exito'>El comentario se guardó con éxito</div>";
    }else{
    	$texto = "<div class='resultado error'>ERROR:".mysqli_error($enlace)."</div>";
    }
    header("location:ejemplo08_comentario.php?id_tema=".$_POST['id_tema']."&mensaje=".$texto);
?>