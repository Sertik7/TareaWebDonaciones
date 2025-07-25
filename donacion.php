<?php
#donacion.php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['donar'])) {
    $nombre = htmlspecialchars($_POST['nombre']);
    $monto = floatval($_POST['monto']);
    $mensaje = htmlspecialchars($_POST['mensaje']);

    echo "<h3>¡Gracias, $nombre, por tu donación de \$$monto!</h3>";

    if (!empty($mensaje)) {
        echo "<p>Tu mensaje: $mensaje</p>";
    }
}
?>
