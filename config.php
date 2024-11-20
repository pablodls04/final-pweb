<?php

$host = 'sql310.infinityfree.com';
$dbname = 'if0_37742584_libreria'; // Nombre de la base de datos
$username = 'if0_37742584'; // Nombre de usuario
$password = 'Pablo2209'; // Contraseña

try {
  $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  // echo "Conexión exitosa!"; // Puedes descomentar esta línea para verificar la conexión
} catch(PDOException $e) {
  echo "Error de conexión: " . $e->getMessage();
}

?>