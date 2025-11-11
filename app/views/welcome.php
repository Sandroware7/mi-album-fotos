<!DOCTYPE html>
<html>
<head>
    <title>Bienvenido a Mi Álbum de Fotos</title>
    <link rel="stylesheet" href="<?= BASE_URL ?>/css/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

    <body class="layout">
        <header>
            <a href="<?= BASE_URL ?>/" class="logo-link">
                <img src="<?= BASE_URL ?>/img/logo.png" alt="Mi Álbum de Fotos" class="logo">
            </a>
        </header>

        <main class="fondoInicio">
            <h1>Bienvenido a Mi Álbum de Fotos</h1>
            <p class="navbar">
                Guarda, edita y comparte tus recuerdos fácilmente en línea.
            </p>
            <p>
                <a href="<?= BASE_URL ?>/login">Iniciar sesión</a> |
                <a href="<?= BASE_URL ?>/register">Registrarse</a>
            </p>
        </main>

        <footer>
            <?php include __DIR__ . '/layout/footer.php'; ?>
        </footer>
    </body>
</html>
