const eventos = [
  { nombre: "Feria solidaria", descripcion: "Ayuda comunitaria en la plaza central" },
  { nombre: "Concierto benefico", descripcion: "Musica en vivo para recaudar fondos" },
  { nombre: "Maraton por la salud", descripcion: "Carrera para promover la salud" },
  { nombre: "Partido de futbol benefico", descripcion: "Partido de futbol para ayuda al deporte y canchas" }
];

const proyectos = [
  { nombre: "Educacion para todos", estado: "En curso" },
  { nombre: "Limpieza del medio ambiente", estado: "En curso" },
  { nombre: "Salud comunitaria", estado: "Finalizado" }
];

const donaciones = [
  { donante: "Sergio Arancibia", monto: 17000 },
  { donante: "Belen Estay", monto: 25000 }
];

function buscar() {
  const texto = document.getElementById("buscarEvento").value.toLowerCase();
  const resultadoDiv = document.getElementById("resultado");
  resultadoDiv.innerHTML = "";

  const filtrados = eventos.filter(e => e.nombre.toLowerCase().includes(texto));

  if (filtrados.length > 0) {
    filtrados.forEach(evento => {
      resultadoDiv.innerHTML += `<p><strong>${evento.nombre}</strong>: ${evento.descripcion}</p>`;
      mostrarNotificacion(`Evento encontrado: ${evento.nombre}`);
    });
  } else {
    resultadoDiv.innerHTML = "<p>No se encontraron eventos.</p>";
  }
}

function mostrarProyectos() {
  const contenedor = document.getElementById("proyectos-container");
  contenedor.innerHTML = "";

  proyectos.forEach(p => {
    const parrafo = document.createElement("p");
    parrafo.innerHTML = `<strong>${p.nombre}</strong> - Estado: ${p.estado}`;
    contenedor.appendChild(parrafo);
  });
}

function mostrarDonaciones() {
  const contenedor = document.getElementById("donaciones-container");
  contenedor.innerHTML = "";

  donaciones.forEach(d => {
    const parrafo = document.createElement("p");
    parrafo.innerHTML = `<strong>${d.donante}</strong> donó $${d.monto}`;
    contenedor.appendChild(parrafo);
  });
}

function mostrarNotificacion(mensaje) {
  const notificaciones = document.getElementById("notificaciones");
  const nuevaNoti = document.createElement("p");
  nuevaNoti.textContent = mensaje;
  notificaciones.appendChild(nuevaNoti);
}

function agregarDonacion() {
  const nombre = document.getElementById("nombreDonante").value.trim();
  const monto = parseInt(document.getElementById("montoDonacion").value);

  if (nombre === "" || isNaN(monto) || monto <= 0) {
    alert("Por favor, ingresa un nombre válido y un monto mayor a 0.");
    return;
  }

  const nuevaDonacion = { donante: nombre, monto: monto };
  donaciones.push(nuevaDonacion);

  mostrarDonaciones();
  mostrarNotificacion(`¡Gracias ${nombre} por tu donación de $${monto}!`);

  document.getElementById("nombreDonante").value = "";
  document.getElementById("montoDonacion").value = "";
}

document.addEventListener("DOMContentLoaded", () => {
  mostrarProyectos();
  mostrarDonaciones();
});

