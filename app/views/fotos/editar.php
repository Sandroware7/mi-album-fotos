

<!DOCTYPE html>
<html>
<head>
    <title>Editar Foto</title>
</head>
<body>
<h1>Editar Foto</h1>

<form method="POST">
    <input type="hidden" name="_method" value="PUT">

    <div>
        <label>Título:</label>
        <input type="text" name="titulo" value="<?= htmlspecialchars($foto->titulo) ?>" required>
    </div>
    <div>
        <label>Descripción:</label>
        <textarea name="descripcion"><?= htmlspecialchars($foto->descripcion) ?></textarea>
    </div>
    <div>
        <img src="<?= UPLOAD_URL ?>/<?= htmlspecialchars($foto->archivo) ?>" width="200">
    </div>
    <button type="submit">Actualizar Foto</button>
</form>

<p><a href="<?= BASE_URL ?>/fotos">Volver al álbum</a></p>
</body>
</html>
