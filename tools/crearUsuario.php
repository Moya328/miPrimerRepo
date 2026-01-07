<?php
// tools/crearUsuario.php
require_once __DIR__ . '/../include/connection.php';

// Datos del usuario a insertar
$dni = "22222222";              // DNI del usuario
$nombre = "Recepcionista";      // Nombre
$password = "recep123";         // Contraseña en texto plano
$tipoUsuario_id = 2;            // 1 = admin, 2 = recepcionista, 3 = cliente

// Generar hash seguro de la contraseña
$hash = password_hash($password, PASSWORD_DEFAULT);

try {
    $sql = "INSERT INTO usuarios (nombre, dni, password_hash, tipoUsuario_id) 
            VALUES (:nombre, :dni, :password_hash, :tipoUsuario_id)";
    $stmt = $conn->prepare($sql);
    $stmt->execute([
        ':nombre' => $nombre,
        ':dni' => $dni,
        ':password_hash' => $hash,
        ':tipoUsuario_id' => $tipoUsuario_id
    ]);

    echo "Usuario insertado correctamente: $nombre ($dni)";
} catch (PDOException $e) {
    echo "Error al insertar usuario: " . $e->getMessage();
}
