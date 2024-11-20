<?php 
require_once 'config.php'; 
?>
<!DOCTYPE html>
<html>
<head>
  <title>Formulario de Contacto</title>
  <link rel="stylesheet" href="contacto.css">
  <script src="script.js"></script>
</head>
<body>

  <header>
    <h1>Mi Librería Online</h1>
    <nav>
      <ul>
        <li><a href="index.php">Inicio</a></li>
        <li><a href="autores.php">Autores</a></li>
        <li><a href="contacto.php">Contacto</a></li>
      </ul>
    </nav>
  </header>

  <main>
    <h2>Contacto</h2>
    
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" onsubmit="return validarFormulario()">
      <label for="nombre">Nombre:</label>
      <input type="text" id="nombre" name="nombre" required><br><br>

      <label for="correo">Correo electrónico:</label>
      <input type="email" id="correo" name="correo" required><br><br>

      <label for="asunto">Asunto:</label>
      <input type="text" id="asunto" name="asunto" required><br><br>

      <label for="comentario">Comentario:</label>
      <textarea id="comentario" name="comentario" required></textarea><br><br>

      <input type="submit" value="Enviar">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      try {
        $nombre = $_POST['nombre'];
        $correo = $_POST['correo'];
        $asunto = $_POST['asunto'];
        $comentario = $_POST['comentario'];

        // Guardar el mensaje en la base de datos
        $sql = "INSERT INTO contacto (fecha, correo, nombre, asunto, comentario)
                VALUES (NOW(), :correo, :nombre, :asunto, :comentario)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':correo', $correo);
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':asunto', $asunto);
        $stmt->bindParam(':comentario', $comentario);
        $stmt->execute();

        echo "<p class='mensaje-exito'>Mensaje enviado correctamente.</p>";

        // Mostrar el mensaje al usuario
        echo "<h3>Tu mensaje:</h3>";
        echo "<p><strong>Nombre:</strong> " . $nombre . "</p>";
        echo "<p><strong>Correo electrónico:</strong> " . $correo . "</p>";
        echo "<p><strong>Asunto:</strong> " . $asunto . "</p>";
        echo "<p><strong>Comentario:</strong> " . $comentario . "</p>";

      } catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
      }
    }
    ?>

    <hr>

    <h3>Comentarios anteriores:</h3>
    <div class="comentarios-container">
    <?php
    try {

      $sql = "SELECT nombre, correo, asunto, comentario, fecha FROM contacto ORDER BY fecha DESC";
      $stmt = $conn->query($sql);
      $comentarios = $stmt->fetchAll(PDO::FETCH_ASSOC);

      if ($comentarios) {
        foreach ($comentarios as $comentario) {
          echo "<div class='comentario-card'>";
          echo "<h4>" . htmlspecialchars($comentario['nombre']) . " <span>" . date("d M Y, H:i", strtotime($comentario['fecha'])) . "</span></h4>";
          echo "<p><strong>Asunto:</strong> " . htmlspecialchars($comentario['asunto']) . "</p>";
          echo "<p><strong>Comentario:</strong> " . nl2br(htmlspecialchars($comentario['comentario'])) . "</p>";
          echo "</div>";
        }
      } else {
        echo "<p>No hay comentarios aún.</p>";
      }
    } catch (PDOException $e) {
      echo "Error al obtener los comentarios: " . $e->getMessage();
    }
    ?>
    </div>

  </main>

  <footer>
    <p>&copy; 2023 Mi Librería Online</p>
  </footer>

</body>
</html>
