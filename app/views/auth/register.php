
<!DOCTYPE html>
<html>
<head>
    <title>Registro - Mi Álbum de Fotos</title>
</head>
<body>
    <h1>Registrarse</h1>

    <?php if (isset($error)): ?>
        <p style="color: red;"><?= htmlspecialchars($error) ?></p>
    <?php endif; ?>

    <form method="POST" autocomplete="off">
        <div>
            <label>Nombre:</label>
            <input type="text" name="nombre" autocomplete="name" required>
        </div>
        <div>
            <label>Email:</label>
            <input type="email" name="email" autocomplete="email" required>
        </div>
        <div>
            <label>Password:</label>
            <input type="password" name="password" autocomplete="new-password" required>
        </div>
        <button type="submit">Registrarse</button>
    </form>


    <p><a href="<?= BASE_URL ?>/login">Iniciar Sesión</a></p>
</body>
</html>