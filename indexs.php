<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  // Procesa el envío del formulario
  $nombre = $_POST['nombre'] ?? '';
  $email = $_POST['email'] ?? '';
  $guests = $_POST['guest'] ?? [];
  
  // Aquí podrías añadir la lógica para guardar en base de datos, enviar un correo, etc.
  // Por ahora, mostramos los datos recibidos:
  echo "<div style='padding:20px;background-color:#e0ffe0;text-align:center;'>";
  echo "<h2>¡Registro Exitoso!</h2>";
  echo "<p><strong>Nombre:</strong> " . htmlspecialchars($nombre) . "</p>";
  echo "<p><strong>Email:</strong> " . htmlspecialchars($email) . "</p>";
  
  if (!empty($guests)) {
    echo "<p><strong>Invitados Adicionales:</strong></p><ul>";
    foreach($guests as $guest) {
      echo "<li>" . htmlspecialchars($guest) . "</li>";
    }
    echo "</ul>";
  }
  echo "<a href='" . $_SERVER['PHP_SELF'] . "' style='display:inline-block;margin-top:15px;padding:10px 20px;background:#007bff;color:#fff;text-decoration:none;border-radius:5px;'>Volver</a>";
  echo "</div>";
  exit();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>SummitTech 2025 - Innovación Digital</title>
  <style>
    /* Reset y estilos generales */
    * { margin: 0; padding: 0; box-sizing: border-box; }
    body { font-family: Arial, sans-serif; background: #f5f5f5; color: #333; }
    header { background: #007bff; color: #fff; padding: 20px; text-align: center; }
    nav ul { list-style: none; }
    nav ul li { display: inline; margin: 0 15px; }
    nav ul li a { color: #fff; text-decoration: none; font-weight: bold; }
    .hero { background: url('https://source.unsplash.com/1600x900/?technology,conference') no-repeat center center/cover; height: 80vh; display: flex; flex-direction: column; justify-content: center; align-items: center; text-align: center; color: #fff; }
    .hero h1 { font-size: 4em; margin-bottom: 10px; text-shadow: 2px 2px 4px rgba(0,0,0,0.7); }
    .hero p { font-size: 1.5em; margin-bottom: 20px; text-shadow: 1px 1px 3px rgba(0,0,0,0.7); }
    .section { padding: 60px 20px; text-align: center; }
    .form-container { background: #fff; max-width: 600px; margin: 0 auto; padding: 30px; border-radius: 8px; box-shadow: 0 2px 8px rgba(0,0,0,0.1); }
    .form-container label { display: block; margin-top: 15px; font-weight: bold; }
    .form-container input[type="text"],
    .form-container input[type="email"] { width: 100%; padding: 10px; margin-top: 5px; border: 1px solid #ccc; border-radius: 4px; }
    .form-container button { background: #007bff; color: #fff; border: none; padding: 10px 20px; border-radius: 4px; cursor: pointer; margin-top: 15px; }
    .form-container button:hover { background: #0056b3; }
  </style>
</head>
<body>
  <!-- Encabezado y navegación -->
  <header>
    <nav>
      <ul>
        <li><a href="#inicio">Inicio</a></li>
        <li><a href="#acerca">Acerca</a></li>
        <li><a href="#registro">Registro</a></li>
      </ul>
    </nav>
    <h2>SummitTech 2025</h2>
  </header>

  <!-- Sección principal (hero) -->
  <section class="hero" id="inicio">
    <h1>Innovación Digital</h1>
    <p>Únete al evento tecnológico del año y descubre las tendencias que transformarán el futuro.</p>
    <a href="#registro" style="padding: 10px 20px; background: #007bff; color: #fff; text-decoration: none; border-radius: 5px;">Regístrate Ahora</a>
  </section>

  <!-- Sección Acerca del Evento -->
  <section class="section" id="acerca">
    <h2>Acerca del Evento</h2>
    <p>SummitTech 2025 reúne a líderes y visionarios en tecnología para compartir ideas innovadoras y transformar la industria digital. Con ponencias, talleres y networking, este evento es el lugar perfecto para impulsar tu carrera y conocer las últimas tendencias en innovación.</p>
  </section>

  <!-- Sección de Registro -->
  <section class="section" id="registro">
    <h2>Formulario de Registro</h2>
    <div class="form-container">
      <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <label for="nombre">Nombre Completo:</label>
        <input type="text" id="nombre" name="nombre" placeholder="Ingresa tu nombre" required>

        <label for="email">Correo Electrónico:</label>
        <input type="email" id="email" name="email" placeholder="Ingresa tu email" required>

        <div id="guestContainer">
          <label>Invitados Adicionales:</label>
          <!-- Campo inicial para un invitado -->
          <input type="text" name="guest[]" placeholder="Nombre del invitado" style="margin-bottom: 10px;">
        </div>
        <button type="button" onclick="addGuestField()">Agregar Otro Invitado</button>
        <br>
        <button type="submit">Enviar Registro</button>
      </form>
    </div>
  </section>

  <!-- Código JavaScript para agregar campos dinámicos -->
  <script>
    function addGuestField() {
      var container = document.getElementById("guestContainer");
      var input = document.createElement("input");
      input.type = "text";
      input.name = "guest[]";
      input.placeholder = "Nombre del invitado";
      input.style.display = "block";
      input.style.marginBottom = "10px";
      container.appendChild(input);
    }
  </script>
</body>
</html>
