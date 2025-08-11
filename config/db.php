<?php
$host = "localhost";
$user = "root"; 
$pass = ""; 
$dbname = "soporte_cifra"; 
$conn = mysqli_connect("$host","$user","$pass");
    mysqli_select_db($conn,$dbname) or die("Error al seleccionar la BD".mysqli_error($conn));
    return $conn;
?>