<!DOCTYPE html>
<html>
<head>
    <title>Subir Foto</title>
</head>
<body>
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
    <button type="submit">Subir Foto</button>
</form>

<p><a href="<?= BASE_URL ?>/fotos">Volver al álbum</a></p>
</body>
</html>
