<?php /** @var object|App\Models\Foto $foto */ ?>
<!DOCTYPE html>
<html>
<head>
    <title><?= htmlspecialchars($foto->titulo) ?></title>
</head>
<body>
<h1><?= htmlspecialchars($foto->titulo) ?></h1>

<img src="<?= UPLOAD_URL ?>/<?= htmlspecialchars($foto->archivo) ?>" width="400"><br>

<p><strong>Descripción:</strong> <?= htmlspecialchars($foto->descripcion ?: 'Sin descripción') ?></p>
<p><small>Subida el <?= htmlspecialchars($foto->subida_en) ?></small></p>

<form action="<?= BASE_URL ?>/fotos/editar/<?= $foto->id ?>" method="GET" style="display: inline;">
    <button type="submit">Editar</button>
</form>

<form action="<?= BASE_URL ?>/fotos/eliminar/<?= $foto->id ?>" method="POST" style="display: inline;">
    <input type="hidden" name="_method" value="DELETE">
    <button type="submit" onclick="return confirm('¿Eliminar foto?')">Eliminar</button>
</form>

<p><a href="<?= BASE_URL ?>/fotos">← Volver al álbum</a></p>
</body>
</html>
