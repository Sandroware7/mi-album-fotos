<?php
/** @var array|App\Models\Foto[] $fotos */
?>

<!DOCTYPE html>
<html>
<head>
    <title>Mis Fotos</title>
</head>
<body>
    <h1>Mi Álbum de Fotos</h1>
    <p>Bienvenido, <?= htmlspecialchars($_SESSION['usuario_nombre'] ?? 'Invitado') ?> | <a href="<?= BASE_URL ?>/logout">Salir</a></p>
    <a href="<?= BASE_URL ?>/fotos/crear">Subir Nueva Foto</a>

    <div>
        <?php foreach ($fotos as $foto): ?>
            <div style="border: 1px solid #ccc; margin: 10px; padding: 10px;">
                <h3><?= htmlspecialchars($foto->titulo) ?></h3>
                <img src="<?= UPLOAD_URL ?>/<?= htmlspecialchars($foto->archivo) ?>" width="200">
                <p><?= htmlspecialchars($foto->descripcion) ?></p>
                <small>Subida: <?= $foto->subida_en ?></small>

                <form action="<?= BASE_URL ?>/fotos/editar/<?= $foto->id ?>" method="GET" style="display: inline;">
                    <button type="submit">Editar</button>
                </form>

                <form action="<?= BASE_URL ?>/fotos/eliminar/<?= $foto->id ?>" method="POST" style="display: inline;">
                    <input type="hidden" name="_method" value="DELETE">
                    <button type="submit" onclick="return confirm('¿Eliminar foto?')">Eliminar</button>
                </form>
            </div>
        <?php endforeach; ?>
    </div>
</body>
</html>