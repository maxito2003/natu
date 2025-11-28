<?php
include "conexion.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $usuario = $_POST['usuario'];
    $contrasena = $_POST['contrasena'];
    $nombre = $_POST['nombre'];
    $apellido_m = $_POST['apellido_m'];
    $apellido_p = $_POST['apellido_p'];
    $correo_electronico = $_POST['correo_electronico'];
    $edad = $_POST['edad'];

    // Validación básica
    if (empty($usuario) || empty($contrasena) || empty($correo_electronico)) {
        echo json_encode(["status" => "error", "message" => "Campos incompletos"]);
        exit;
    }

    // Insertar en la BD
    $query = "INSERT INTO registro (usuario, contrasena, nombre, apellido_m, apellido_p, correo_electronico, edad)
              VALUES ('$usuario', '$contrasena', '$nombre', '$apellido_m', '$apellido_p', '$correo_electronico', '$edad')";

    if (mysqli_query($conn, $query)) {
        echo json_encode(["status" => "ok", "message" => "Registro exitoso"]);
    } else {
        echo json_encode(["status" => "error", "message" => "Error al registrar"]);
    }
}
?>
