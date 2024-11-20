<?php require_once 'config.php'; ?>
<!DOCTYPE html>
<html>
<head>
  <title>Listado de Autores</title>
  <link rel="stylesheet" href="style.css">
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
    <h2>Autores</h2>
    <ul class="lista-autores">
      <?php
      try {
        $sql = "SELECT nombre, apellido FROM autores";
        $stmt = $conn->query($sql);
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
          echo "<li>" . $row['nombre'] . " " . $row['apellido'] . "</li>";
        }
      } catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
      }
      ?>
    </ul>
  </main>

  <footer>
    <p>&copy; 2023 Mi Librería Online</p>
  </footer>

</body>
</html>