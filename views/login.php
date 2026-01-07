<?php
$error = $_GET['error'] ?? null;
$dniValue = $_GET['dni'] ?? '';
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Login - Peluquería</title>
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- HOJA DE ESTILOS -->
    <link rel="stylesheet" href="../public/css/style.css">
</head>

<body class="bg-light d-flex align-items-center justify-content-center vh-100">

    <div class="card shadow p-4" style="width: 350px;">
        <h2 class="text-center mb-4">Peluquería Login</h2>

        <?php if ($error === 'campos'): ?>
            <div class="alert alert-warning">Por favor completa todos los campos.</div>
        <?php elseif ($error === 'dni'): ?>
            <div class="alert alert-danger">El DNI ingresado no existe.</div>
        <?php elseif ($error === 'password'): ?>
            <div class="alert alert-danger">La contraseña es incorrecta.</div>
        <?php endif; ?>

        <form action="../controllers/loginController.php" method="POST">
            <div class="mb-3">
                <label for="dni" class="form-label">DNI</label>
                <input type="text" class="form-control" id="dni" name="dni" placeholder="12345678"
                    value="<?= htmlspecialchars($dniValue) ?>" required>
                <div class="invalid-feedback">Ingrese un DNI válido (7 u 8 dígitos).</div>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Contraseña</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="********"
                    required>
                <div class="invalid-feedback">La contraseña debe tener al menos 6 caracteres.</div>
            </div>
            <button type="submit" class="btn btn-primary w-100">Entrar</button>
        </form>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Tu script personalizado -->
    <script src="../public/js/login.js"></script>
</body>

</html>