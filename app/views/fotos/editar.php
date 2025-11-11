<?php
/** @var object|App\Models\Foto $foto */
?>

<!DOCTYPE html>
<html>
<head>
    <title>Editar Foto</title>
</head>
<body>
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

    <div style="display: flex; align-items: center; gap: 10px;">
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

    <script>
        const archivoInput = document.getElementById('archivoInput');
        const preview = document.getElementById('preview');

        archivoInput.addEventListener('change', function() {
            const file = this.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    preview.src = e.target.result;
                    preview.style.display = 'block'; // mostrar la imagen solo cuando se selecciona
                }
                reader.readAsDataURL(file);
            } else {
                preview.src = '';
                preview.style.display = 'none';
            }
        });
    </script>


    <button type="submit">Actualizar</button>
</form>


<p><a href="<?= BASE_URL ?>/fotos">Volver al álbum</a></p>
</body>
</html>
