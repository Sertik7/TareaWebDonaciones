<?php
require 'conexion.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $stmt = $conn->prepare("INSERT INTO DONANTE (nombre, email, direccion, telefono) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $_POST['nombre'], $_POST['email'], $_POST['direccion'], $_POST['telefono']);
    $stmt->execute();
    echo "Donante registrado correctamente.";
    $stmt->close();
}
?>
