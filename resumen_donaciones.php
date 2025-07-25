<?php
require 'conexion.php';

$sql = "SELECT 
            p.nombre AS nombre_proyecto,
            COUNT(d.id_donacion) AS cantidad_donaciones,
            SUM(d.monto) AS total_recaudado
        FROM DONACION d
        INNER JOIN PROYECTO p ON d.id_proyecto = p.id_proyecto
        GROUP BY p.id_proyecto
        HAVING COUNT(d.id_donacion) > 2";

$result = $conn->query($sql);

echo "<h2>Proyectos con más de 2 donaciones</h2>";
echo "<table border='1'>
<tr><th>Proyecto</th><th>Donaciones</th><th>Total Recaudado</th></tr>";

while ($row = $result->fetch_assoc()) {
    echo "<tr>
        <td>{$row['nombre_proyecto']}</td>
        <td>{$row['cantidad_donaciones']}</td>
        <td>\${$row['total_recaudado']}</td>
    </tr>";
}
echo "</table>";
?>
