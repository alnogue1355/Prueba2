document.addEventListener("DOMContentLoaded", function () {
    // Envío del formulario con AJAX
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
        "servicios": "<h2>Servicios</h2><p>Conoce nuestros servicios de alta calidad.</p>",
        "testimonios": "<h2>Testimonios</h2><p>Lee lo que dicen nuestros clientes.</p>",
        "contacto": "<h2>Contacto</h2><p>Puedes contactarnos mediante el formulario.</p>",
        "ubicacion": "<h2>Ubicación</h2><p>Estamos ubicados en el centro de la ciudad.</p>"
    };

    document.getElementById("contenidoSeccion").innerHTML = contenido[seccion] || "<p>Sección no encontrada</p>";
    // Mostrar la ventana modal agregando la clase "mostrar"
    document.getElementById("ventanaEmergente").classList.add("mostrar");
}

function cerrarModal() {
    // Cerrar la ventana modal removiendo la clase "mostrar"
    document.getElementById("ventanaEmergente").classList.remove("mostrar");
}
