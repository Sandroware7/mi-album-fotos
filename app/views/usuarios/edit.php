<!DOCTYPE html>
<html>
<head>
    <title>Editar Usuario</title>
    <link rel="stylesheet" href="<?= BASE_URL ?>/css/style.css">
</head>
    <body class="layout">
        <header>
            <a href="<?= BASE_URL ?>/" class="logo-link">
                <img src="<?= BASE_URL ?>/img/logo.png" alt="Mi Álbum de Fotos" class="logo">
            </a>
        </header>

        <main style= "color: #000000">
            <h1>Editar Usuario</h1>
            <form method="POST" action="<?= BASE_URL ?>/usuarios/<?= $usuario->id ?>">
                <input type="hidden" name="_method" value="PUT">
                <div>
                    <label>Nombre:</label>
                    <input type="text" name="nombre" value="<?= htmlspecialchars($usuario->nombre) ?>" required>
                </div>
                <div>
                    <label>Email:</label>
                    <input type="email" name="email" value="<?= htmlspecialchars($usuario->email) ?>" required>
                </div>
                <button type="submit" style="margin-top: 30px;">Actualizar</button>
            </form>

            <p style="margin-top: 30px;">
                <a href="<?= BASE_URL ?>/usuarios/<?= $usuario->id ?>">Volver al perfil</a>
            </p>
        </main>

        <footer>
            <?php include __DIR__ . '/../layout/footer.php'; ?>
        </footer>
    </body>
</html>


