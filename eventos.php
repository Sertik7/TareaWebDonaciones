<?php

class Evento {
    public $descripcion;
    public $tipo;
    public $lugar;
    public $fecha;
    public $hora;

    public function __construct($descripcion, $tipo, $lugar, $fecha, $hora) {
        $this->descripcion = $descripcion;
        $this->tipo = $tipo;
        $this->lugar = $lugar;
        $this->fecha = $fecha;
        $this->hora = $hora;
    }

    public function mostrarEvento() {
        echo "<div class='evento'>";
        echo "<h4>{$this->tipo}: {$this->descripcion}</h4>";
        echo "<p><strong>Lugar:</strong> {$this->lugar}</p>";
        echo "<p><strong>Fecha:</strong> {$this->fecha} a las {$this->hora}</p>";
        echo "</div>";
    }
}

class GestorEventos {
    public $eventos = [];

    public function agregarEvento($evento) {
        $this->eventos[] = $evento;
    }

    public function filtrarEventos($tipoFiltro) {
        foreach ($this->eventos as $evento) {
            if ($evento->tipo === $tipoFiltro || $tipoFiltro === "todos") {
                $evento->mostrarEvento();
            }
        }
    }
}
?>
