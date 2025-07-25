<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['agregar'])) {
    $campania = htmlspecialchars($_POST['campania']);
    $monto = floatval($_POST['monto']);

    if (!isset($_SESSION['carrito'])) {
        $_SESSION['carrito'] = [];
    }

    $_SESSION['carrito'][] = [
        'campania' => $campania,
        'monto' => $monto
    ];
}

if (isset($_POST['vaciar'])) {
    unset($_SESSION['carrito']);
}
?>

<h3>Carrito de Donaciones</h3>
<?php
if (!empty($_SESSION['carrito'])) {
    foreach ($_SESSION['carrito'] as $donacion) {
        echo "<p>{$donacion['campania']}: \$" . number_format($donacion['monto'], 0, ',', '.') . "</p>";
    }
} else {
    echo "<p>No hay donaciones en el carrito.</p>";
}
?>
