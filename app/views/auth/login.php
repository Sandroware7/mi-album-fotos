
<!DOCTYPE html>
<html>
<head>
    <title>Login - Mi Álbum de Fotos</title>
</head>
<body>
    <h1>Iniciar Sesión</h1>

    <?php if (isset($error)): ?>
        <p style="color: red;"><?= htmlspecialchars($error) ?></p>
    <?php endif; ?>

    <form method="POST" autocomplete="off">
        <div>
            <label>Email:</label>
            <input type="email" name="email" autocomplete="email" required>
        </div>
        <div>
            <label>Password:</label>
            <input type="password" name="password" autocomplete="new-password" required>
        </div>
        <button type="submit">Entrar</button>
    </form>


    <p><a href="<?= BASE_URL ?>/register">Registrarse</a></p>
</body>
</html>