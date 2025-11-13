<!DOCTYPE html>
<html>
<head>
    <title>Mis Fotos</title>
    <link rel="stylesheet" href="<?= BASE_URL ?>/css/style.css">
</head>
    <body class="layout">
        <header>
            <a href="<?= BASE_URL ?>/" class="logo-link">
                <img src="<?= BASE_URL ?>/img/logo.png" alt="Mi Álbum de Fotos" class="logo">
            </a>
        </header>

        <main>
            <h1>Mi Álbum de Fotos</h1>
            <p>
                Bienvenido, <?= htmlspecialchars($_SESSION['usuario_nombre'] ?? 'Invitado') ?> |
                <a href="<?= BASE_URL ?>/usuarios/<?= $_SESSION['usuario_id'] ?>">Mi perfil</a> |
                <a href="<?= BASE_URL ?>/fotos/crear">Subir Foto</a> |
                <a href="<?= BASE_URL ?>/logout" onclick="return confirm('¿Estás seguro de que quieres salir?');">Salir</a>
            </p>

            <div class="foto-grid">
                <?php if (empty($fotos)): ?>
                    <p class="no-style" style="color: #232323;">
                        😅 ¡Ups! Tu álbum está vacío. <br>
                        <a href="<?= BASE_URL ?>/fotos/crear" style="color:#1583c3; text-decoration:none;">
                            Sube tu primera foto aquí
                        </a>
                    </p>
                <?php else: ?>
                    <!-- bucle para mostrar cada foto del album -->
                    <?php foreach ($fotos as $foto): ?>
                        <div style="border: 1px solid #ccc; margin: 10px; padding: 10px;">
                            <h3><?= htmlspecialchars($foto->titulo) ?></h3>
                            <a href="<?= BASE_URL ?>/fotos/<?= $foto->id ?>">
                                <img src="<?= UPLOAD_URL ?>/<?= htmlspecialchars($foto->archivo) ?>" width="200">
                            </a>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </main>

        <footer>
            <?php include __DIR__ . '/../layout/footer.php'; ?>
        </footer>
    </body>
</html>


