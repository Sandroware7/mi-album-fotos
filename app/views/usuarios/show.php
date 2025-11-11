<!DOCTYPE html>
<html>
<head>
    <title>Perfil de Usuario</title>
    <link rel="stylesheet" href="<?= BASE_URL ?>/css/style.css">
</head>
    <body class="layout">
        <header>
            <a href="<?= BASE_URL ?>/" class="logo-link">
                <img src="<?= BASE_URL ?>/img/logo.png" alt="Mi Álbum de Fotos" class="logo">
            </a>
        </header>

        <main>
            <h1>Perfil de <?= htmlspecialchars($usuario->nombre) ?></h1>
            <p><strong>Email:</strong> <?= htmlspecialchars($usuario->email) ?></p>

            <div style="text-align: center;">
                <form action="<?= BASE_URL ?>/usuarios/<?= $usuario->id ?>/editar" method="GET" style="display:inline;">
                    <button type="submit" style="margin-right: 6px;" >Editar</button>
                </form>

                <form action="<?= BASE_URL ?>/usuarios/<?= $usuario->id ?>" method="POST" style="display:inline;">
                    <input type="hidden" name="_method" value="DELETE">
                    <button type="submit" class="delete" onclick="return confirm('Espera ¿Seguro que quieres eliminar tu cuenta?')">Eliminar cuenta</button>
                </form>
            </div>

            <p style="margin-top: 50px;">
                <a href="<?= BASE_URL ?>/fotos">Volver al álbum</a>
            </p>
        </main>

        <footer>
            <?php include __DIR__ . '/../layout/footer.php'; ?>
        </footer>
    </body>
</html>


