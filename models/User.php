<?php
// models/User.php
require_once __DIR__ . '/../include/connection.php';

class User
{
    private $db;

    public function __construct()
    {
        // Usamos la conexión PDO definida en include/connection.php
        // Nota: connection.php define $conn (PDO)
        global $conn;
        $this->db = $conn;
    }

    /**
     * Busca un usuario por DNI.
     * Retorna: array asociativo con id, nombre, dni, password_hash o false si no existe.
     */
    public function findByDni(string $dni)
    {
        $stmt = $this->db->prepare(
            'SELECT id, nombre, dni, password_hash, tipoUsuario_id 
         FROM usuarios 
         WHERE dni = ? 
         LIMIT 1'
        );
        $stmt->execute([$dni]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
