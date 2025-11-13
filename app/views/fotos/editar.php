<!DOCTYPE html>
<html>
<head>
    <title>Editar Foto</title>
    <link rel="stylesheet" href="<?= BASE_URL ?>/css/style.css">
</head>
    <body class="layout">
    <header>
        <a href="<?= BASE_URL ?>/" class="logo-link">
            <img src="<?= BASE_URL ?>/img/logo.png" alt="Mi Álbum de Fotos" class="logo">
        </a>
    </header>

    <main style= "color: #000000">
        <h1>Editar Foto</h1>
        <form method="POST" enctype="multipart/form-data">
            <input type="hidden" name="_method" value="PUT">

        <div>
            <label>Título:</label>
            <input type="text" name="titulo" value="<?= htmlspecialchars($foto->titulo) ?>" required autocomplete="off">
        </div>
        <div>
            <label>Descripción:</label>
            <textarea name="descripcion"><?= htmlspecialchars($foto->descripcion) ?></textarea>
        </div>

        <div style="display: flex; margin-top: 20px; justify-content: center; align-items: center; gap: 15px;">
            <div>
                <label>Foto actual:</label><br>
                <img id="original" src="<?= UPLOAD_URL ?>/<?= htmlspecialchars($foto->archivo) ?>" width="200">
            </div>
            <div style="font-size: 24px;">→</div>
            <div>
                <label>Nueva foto:</label><br>
                <img id="preview" src="" width="200" style="display: none;">
            </div>
        </div>

        <div>
            <label>Cambiar foto:</label>
            <input type="file" name="archivo" accept="image/*" id="archivoInput">
        </div>

        <!--Script para mostrar la vista previa de la nueva imagen seleccionada-->
        <script>
            const archivoInput = document.getElementById('archivoInput');
            const preview = document.getElementById('preview');

            archivoInput.addEventListener('change', function() {
                const file = this.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        preview.src = e.target.result;
                        preview.style.display = 'block';
                    }
                    reader.readAsDataURL(file);
                } else {
                    preview.src = '';
                    preview.style.display = 'none';
                }
            });
        </script>

            <button type="submit" style="margin-top: 30px;">Actualizar</button>
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
