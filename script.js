document.addEventListener("DOMContentLoaded", function () {
    document.getElementById("contactForm").addEventListener("submit", function (event) {
        event.preventDefault(); // Evita la recarga de la página

        let formData = new FormData(this);

        fetch("contacto.php", {
            method: "POST",
            body: formData
        })
        .then(response => response.text())
        .then(data => {
            document.getElementById("resultado").innerHTML = data;
            this.reset(); // Limpia el formulario después de enviarlo
        })
        .catch(error => console.error("Error:", error));
    });
});

function mostrarSeccion(seccion) {
    let contenido = {
        "inicio": "<h2>Bienvenido</h2><p>Esta es la página de inicio.</p>",
        "nosotros": "<h2>Nosotros</h2><p>Información sobre nuestra empresa.</p>",
        "mision": "<h2>Misión</h2><p>Nuestra misión es...</p>",
        "vision": "<h2>Visión</h2><p>Nuestra visión es...</p>",
        "contacto": "<h2>Contacto</h2><p>Puedes contactarnos mediante el formulario.</p>",
        "ubicacion": "<h2>Ubicación</h2><p>Estamos ubicados en...</p>"
    };

    document.getElementById("contenidoSeccion").innerHTML = contenido[seccion] || "<p>Sección no encontrada</p>";
    document.getElementById("ventanaEmergente").style.display = "flex";
}

function cerrarModal() {
    document.getElementById("ventanaEmergente").style.display = "none";
}
