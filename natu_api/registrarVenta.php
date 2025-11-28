<?php
include "conexion.php";

$numtar = $_POST['numtar'];
$nom = $_POST['nom'];
$fechaexp = $_POST['fechaexp'];
$cvv = $_POST['cvv'];
$producto = $_POST['producto'];
$cantidad = $_POST['cantidad'];

$query = "INSERT INTO venta (numtar, nom, fechaexp, cvv, producto, cantidad)
VALUES ('$numtar', '$nom', '$fechaexp', '$cvv', '$producto', '$cantidad')";

// AQUI estaba el error: antes decía $conexion
$result = mysqli_query($conn, $query);

if ($result) {
    echo json_encode(["status" => "ok"]);
} else {
    echo json_encode([
        "status" => "error",
        "error" => mysqli_error($conn)
    ]);
}
?>
