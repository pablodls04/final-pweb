<?php

$host = 'sql310.infinityfree.com';
$dbname = 'if0_37742584_libreria'; 
$username = 'if0_37742584'; 
$password = 'Pablo2209'; 

try {
  $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch(PDOException $e) {
  echo "Error de conexión: " . $e->getMessage();
}

?>