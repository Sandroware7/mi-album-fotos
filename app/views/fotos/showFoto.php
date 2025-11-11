<!DOCTYPE html>
<html>
<head>
    <title><?= htmlspecialchars($foto->titulo) ?></title>
    <link rel="stylesheet" href="<?= BASE_URL ?>/css/style.css">
</head>
    <body class="layout">
        <header>
            <a href="<?= BASE_URL ?>/" class="logo-link">
                <img src="<?= BASE_URL ?>/img/logo.png" alt="Mi Álbum de Fotos" class="logo">
            </a>
        </header>

        <main>
            <h1><?= htmlspecialchars($foto->titulo) ?></h1>
            <div style="text-align: center;">
                <img src="<?= UPLOAD_URL ?>/<?= htmlspecialchars($foto->archivo) ?>" width="400"><br>
            </div>

            <p><strong>Descripción:</strong> <?= htmlspecialchars($foto->descripcion ?: 'Sin descripción') ?></p>
            <p style="text-align: right ">
                <small>Subida el <?= htmlspecialchars($foto->subida_en) ?></small>
            </p>

            <div style="text-align: center;">
                <form action="<?= BASE_URL ?>/fotos/editar/<?= $foto->id ?>" method="GET" style="display: inline;">
                    <button type="submit" style="margin-right: 6px;" >Editar</button>
                </form>

                <form action="<?= BASE_URL ?>/fotos/eliminar/<?= $foto->id ?>" method="POST" style="display: inline;">
                    <input type="hidden" name="_method" value="DELETE">
                    <button type="submit" class="delete" onclick="return confirm('¿Eliminar foto?')">Eliminar</button>
                </form>
            </div>

            <p style="margin-top: 50px;">
                <a href="<?= BASE_URL ?>/fotos">← Volver al álbum</a>
            </p>
        </main>

        <footer>
            <?php include __DIR__ . '/../layout/footer.php'; ?>
        </footer>
    </body>
</html>
