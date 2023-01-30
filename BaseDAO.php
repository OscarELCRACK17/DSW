<?php
//modelo
function conectar()
{
    $host = 'localhost';
    $usuario = 'productos';
    $pass = 'productos2021';
    $bd = 'productos';
    $conexion = new MySQLi($host, $usuario, $pass, $bd);
    $error = $conexion->connect_errno;
    if ($error != null) {
        echo "<p>Error $error conectando a la base de datos: $conexion->connect_error</p>";
        exit();
    }
    return $conexion;
}
function consulta(string $sql): bool | mysqli_result
{
    $conexion = conectar();
    $resultado = $conexion->query($sql);
    $conexion->close();
    return $resultado;
}
?>