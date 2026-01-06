<?php
// views/dashboard.php
session_start();

// Si no hay sesión activa, redirigimos al login
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Dashboard - Peluquería</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../public/css/style.css">
</head>

<body class="container mt-5">
    <div class="card shadow p-4">
        <h1 class="mb-3">Bienvenido, <?= htmlspecialchars($_SESSION['user_name']) ?></h1>
        <p>Has iniciado sesión correctamente con el DNI <strong><?= htmlspecialchars($_SESSION['user_dni']) ?></strong>.
        </p>
        <p>Pronto aquí mostraremos tus turnos, clientes y más datos de la peluquería.</p>
        <form action="../controllers/logoutController.php" method="POST">
            <button type="submit" class="btn btn-danger">Cerrar sesión</button>
        </form>
    </div>
</body>

</html>