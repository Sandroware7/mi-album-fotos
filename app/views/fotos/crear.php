<!DOCTYPE html>
<html>
<head>
    <title>Subir Foto</title>
    <link rel="stylesheet" href="<?= BASE_URL ?>/css/style.css">
</head>
    <body class="layout">
        <header>
            <a href="<?= BASE_URL ?>/" class="logo-link">
                <img src="<?= BASE_URL ?>/img/logo.png" alt="Mi Álbum de Fotos" class="logo">
            </a>
        </header>

        <main style= "color: #000000">
            <h1>Subir Nueva Foto</h1>
            <form method="POST" enctype="multipart/form-data">
                <div>
                    <label>Título:</label>
                    <input type="text" name="titulo" required>
                </div>
                <div>
                    <label>Descripción:</label>
                    <textarea name="descripcion"></textarea>
                </div>
                <div>
                    <label>Archivo:</label>
                    <input type="file" name="archivo" accept="image/*" required>
                </div>
                <button type="submit" style="margin-top: 30px;">Subir Foto</button>
            </form>
            <p style="margin-top: 50px;">
                <a href="<?= BASE_URL ?>/fotos">Volver al álbum</a>
            </p>
        </main>

        <footer>
            <?php include __DIR__ . '/../layout/footer.php'; ?>
        </footer>
    </body>
</html>

