<?php require_once 'config.php'; ?>
<!DOCTYPE html>
<html>
<head>
  <title>Listado de Libros</title>
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
    <h2>Libros disponibles</h2>
    <ul class="lista-libros">
      <?php
      try {
        $sql = "SELECT t.titulo, a.nombre, a.apellido
                FROM titulos t
                INNER JOIN titulo_autor ta ON t.id_titulo = ta.id_titulo
                INNER JOIN autores a ON ta.id_autor = a.id_autor";
        $stmt = $conn->query($sql);
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
          echo "<li>" . $row['titulo'] . " - " . $row['nombre'] . " " . $row['apellido'] . "</li>";
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