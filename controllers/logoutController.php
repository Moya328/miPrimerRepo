<?php
// controller/logoutController.php
session_start();

// Limpiar y destruir la sesión
session_unset();
session_destroy();

header('Location: ../index.php');
exit;
