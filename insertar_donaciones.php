<?php
require 'conexion.php';

for ($i = 1; $i <= 10; $i++) {
    $monto = rand(5000, 100000);
    $fecha = date('Y-m-d');
    $id_proyecto = rand(2, 4); 
    $id_donante = rand(1, 3);  

    $sql = "INSERT INTO DONACION (monto, fecha, id_proyecto, id_donante)
            VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("dsii", $monto, $fecha, $id_proyecto, $id_donante);
    $stmt->execute();
}

echo "Se registraron 10 donaciones correctamente.";
?>
