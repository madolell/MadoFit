<?php
$grupoMuscular = $_GET['grupo'];

// Realizar la consulta a la base de datos para obtener la foto y los ejercicios del grupo muscular
// Utiliza la variable $grupoMuscular en tu consulta

// Mostrar la foto del grupo muscular
echo "<img src='fotos/Grupo Muscular/' alt='$grupoMuscular'>";

// Mostrar los nombres de los ejercicios
// Recorre los resultados obtenidos de la consulta y muestra los nombres de los ejercicios
?>
