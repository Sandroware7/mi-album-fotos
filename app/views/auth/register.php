<!DOCTYPE html>
<html>
<head>
    <title>Registro - Mi Álbum de Fotos</title>
    <link rel="stylesheet" href="<?= BASE_URL ?>/css/style.css">
</head>
    <body class="layout">
        <header>
            <a href="<?= BASE_URL ?>/" class="logo-link">
                <img src="<?= BASE_URL ?>/img/logo.png" alt="Mi Álbum de Fotos" class="logo">
            </a>
        </header>

        <main>
            <h1>Registrarse</h1>

            <?php if (isset($error)): ?>
                <p style="color: #981010;"><?= htmlspecialchars($error) ?></p>
            <?php endif; ?>

            <div class="form-container">
                <form method="POST" autocomplete="off" class="auth-form">
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
            </div>

            <div>
                <p class="no-style"><a href="<?= BASE_URL ?>/login">->Iniciar Sesión</a></p>
            </div>
        </main>

        <footer>
            <?php include __DIR__ . '/../layout/footer.php'; ?>
        </footer>
    </body>
</html>

