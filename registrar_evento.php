<?php
// registrar_evento.php
require_once 'eventos.php'; 

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['registrar'])) {
    $descripcion = htmlspecialchars($_POST['descripcion']);
    $tipo = htmlspecialchars($_POST['tipo']);
    $lugar = htmlspecialchars($_POST['lugar']);
    $fecha = $_POST['fecha'];
    $hora = $_POST['hora'];

    $eventoNuevo = new Evento($descripcion, $tipo, $lugar, $fecha, $hora);

    $gestor = new GestorEventos();
    $gestor->agregarEvento($eventoNuevo);

    echo "<h3> Evento registrado con exito</h3><hr>";

    echo "<h4> Lista de eventos:</h4>";
    $gestor->filtrarEventos("todos");
}
?>
