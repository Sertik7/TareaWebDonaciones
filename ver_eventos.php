<?php
// ver_evento.php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once 'eventos.php';

$tipo = isset($_GET['tipo']) ? $_GET['tipo'] : 'todos';

$gestor = new GestorEventos();

$gestor->agregarEvento(new Evento("Taller de handball", "Taller", "Gimnasio municipal", "2025-07-01", "10:00"));
$gestor->agregarEvento(new Evento("Charlas emprededores", "Conferencia", "Casa de la cultura", "2025-07-03", "18:00"));
$gestor->agregarEvento(new Evento("Mejoras en salud", "Recaudación", "Plaza de Armas", "2025-07-10", "12:30"));
$gestor->agregarEvento(new Evento("Limpieza de la zona", "Voluntariado", "Municipalidad", "2025-07-08", "14:00"));

echo "<h2>Eventos filtrados por tipo: <em>$tipo</em></h2>";

$gestor->filtrarEventos($tipo);
?>
