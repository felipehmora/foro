<?php 
/*
Archivos planos o de extensión .txt, son una forma de persistencia. Es decir, para guardar datos. Todos los lenguajes de programación disponen de funciones, para el manejo de archivos planos.

¿Cómo se crea un archivo plano?


$nombre = fopen("nombre físico archivo","modo")
lógico
del 
archivo

Donde el modo puede ser:
w : escritura al inicio del archivo
a : escritura para añadir
r : sólo lectura

modo+ : Donde el signo "+" indica que si el archivo
        no existe, este será creado. Aplica para los
        casos "w" y "a".

¿Cómo se graba en un archivo plano?

fwrite("nombre lógico archivo","datos")


¿Cómo cerrar un archivo plano?

fclose("nonbre lógico del archivo");
*/

//$alumnos = fopen("estudiantes.txt", "w+");
//$alumnos = fopen("estudiantes.txt", "a+");
$alumnos = fopen("estudiantes.txt", "r");

$longitud= filesize("estudiantes.txt");

$lectura = fread($alumnos, $longitud);

echo "CONTENIDO DEL ARCHIVO:<br>";

echo $lectura; 

fclose($alumnos);

echo "FIN DEL PROGRAMA...";


?>