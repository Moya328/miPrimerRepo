<?php
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['user_role'] != 1) {
    header('Location: login.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Dashboard Admin</title>
</head>

<body>
    <h1>Panel de Administrador</h1>
    <p>Bienvenido <?= htmlspecialchars($_SESSION['user_name']) ?> (DNI: <?= htmlspecialchars($_SESSION['user_dni']) ?>)
    </p>
    <p>Aquí podrás gestionar usuarios, permisos y configuración.</p>
    <form action="../controllers/logoutController.php" method="POST">
        <button type="submit">Cerrar sesión</button>
    </form>
</body>

</html>