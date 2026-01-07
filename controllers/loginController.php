<?php
// controllers/loginController.php
session_start();
require_once __DIR__ . '/../models/User.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: ../views/login.php');
    exit;
}

$dni = trim($_POST['dni'] ?? '');
$password = $_POST['password'] ?? '';

if ($dni === '' || $password === '') {
    header('Location: ../views/login.php?error=campos');
    exit;
}

$userModel = new User();
$user = $userModel->findByDni($dni);

if (!$user) {
    // DNI no existe → foco en DNI
    header('Location: ../views/login.php?error=dni&focus=dni');
    exit;
}

if (!password_verify($password, $user['password_hash'])) {
    // Contraseña incorrecta → foco en password y mantener DNI
    header('Location: ../views/login.php?error=password&focus=password&dni=' . urlencode($dni));
    exit;
}

// Login correcto
$_SESSION['user_id'] = $user['id'];
$_SESSION['user_name'] = $user['nombre'];
$_SESSION['user_dni'] = $user['dni'];
$_SESSION['user_role'] = $user['tipoUsuario_id'];

// Redirigir según rol
switch ($_SESSION['user_role']) {
    case 1: // Admin
        header('Location: ../views/dashboard_admin.php');
        break;
    case 2: // Recepcionista
        header('Location: ../views/dashboard_recep.php');
        break;
    case 3: // Cliente
        header('Location: ../views/dashboard_cliente.php');
        break;
    default:
        header('Location: ../views/login.php');
        break;
}
exit;
