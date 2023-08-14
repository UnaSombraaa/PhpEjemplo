
<html lang="es">
	<head>
	<link rel="stylesheet" href="css/altaBajaModificacion.css">
	</head>
</html>


<?php
include 'menu.php';

$ape = $_POST['apellido'];
$nom = $_POST['nombre'];
$ed = $_POST['edad'];

// Verificar campos vacioos
if (empty($ape) || empty($nom) || empty($ed)) {
    echo "No se pueden guardar campos vacíos."."<br>";
} else {
   
    echo "<h3>".$ape."</h3>". "<h3>".$nom."</h3>". "<h3>".$ed."</h3>";

    $base = "gestion";
    $Conexion =  mysqli_connect("localhost","root","",$base);

    // Verificar dupe
    $consulta = "SELECT * FROM persona WHERE apellido = '$ape' AND nombre = '$nom' AND edad = '$ed'";
    $resultadoConsulta = mysqli_query($Conexion, $consulta);

    if (mysqli_num_rows($resultadoConsulta) > 0) {
        echo "Ya existe un registro con los mismos valores. No se insertará duplicado."."<br>";
    } else {
        $cadena = "INSERT INTO persona(apellido, nombre, edad) VALUES ('$ape','$nom','$ed')";
        $resultado = mysqli_query($Conexion, $cadena);

        if ($resultado) {
            echo "Se ha insertado un registro"."<br>";
        } else {
            echo "NO se ha generado un registro"."<br>";
        }
    }
}
?>
