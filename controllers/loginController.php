<?php
// controller/loginController.php
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
    // DNI no existe
    header('Location: ../views/login.php?error=dni');
    exit;
}

if (!password_verify($password, $user['password_hash'])) {
    // Contraseña incorrecta
    header('Location: ../views/login.php?error=password&dni=' . urlencode($dni));
    exit;
}

// Login correcto
$_SESSION['user_id'] = $user['id'];
$_SESSION['user_name'] = $user['nombre'];
$_SESSION['user_dni'] = $user['dni'];
header('Location: ../views/dashboard.php');
exit;
