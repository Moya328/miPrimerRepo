<?php
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['user_role'] != 2) {
    header('Location: login.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Dashboard Recepcionista</title>
</head>

<body>
    <h1>Panel de Recepcionista</h1>
    <p>Bienvenido
        <?= htmlspecialchars($_SESSION['user_name']) ?> (DNI:
        <?= htmlspecialchars($_SESSION['user_dni']) ?>)
    </p>
    <p>Aquí podrás gestionar turnos y clientes.</p>
    <form action="../controllers/logoutController.php" method="POST">
        <button type="submit">Cerrar sesión</button>
    </form>
</body>

</html>