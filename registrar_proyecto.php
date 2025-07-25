<?php
require 'conexion.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $stmt = $conn->prepare("INSERT INTO PROYECTO (nombre, descripcion, presupuesto, fecha_inicio, fecha_fin) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("ssdss", $_POST['nombre'], $_POST['descripcion'], $_POST['presupuesto'], $_POST['fecha_inicio'], $_POST['fecha_fin']);
    $stmt->execute();
    echo "Proyecto registrado correctamente.";
    $stmt->close();
}
?>
