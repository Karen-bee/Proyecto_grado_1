<?php
$server = "localhost";
$userRoot = "root";
$password = "";
$db = "literagiando";

$conexion = new mysqli($server, $userRoot, $password, $db);

if ($conexion->connect_error) {
    die("Connection failed: " . $conexion->connect_error);
}
