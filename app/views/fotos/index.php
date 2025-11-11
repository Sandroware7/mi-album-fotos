<!DOCTYPE html>
<html>
<head>
    <title>Mis Fotos</title>
</head>
<body>
<h1>Mi Álbum de Fotos</h1>
<p>
    Bienvenido, <?= htmlspecialchars($_SESSION['usuario_nombre'] ?? 'Invitado') ?> |
    <a href="<?= BASE_URL ?>/usuarios/<?= $_SESSION['usuario_id'] ?>">Mi perfil</a> |
    <a href="<?= BASE_URL ?>/fotos/crear">Subir Nueva Foto</a> |
    <a href="<?= BASE_URL ?>/logout" onclick="return confirm('¿Estás seguro de que quieres salir?');">Salir</a>
</p>

<div>
    <?php foreach ($fotos as $foto): ?>
        <div style="border: 1px solid #ccc; margin: 10px; padding: 10px; text-align: left;">
            <h3><?= htmlspecialchars($foto->titulo) ?></h3>

            <!-- Enlace a la vista individual -->
            <a href="<?= BASE_URL ?>/fotos/<?= $foto->id ?>">
                <img src="<?= UPLOAD_URL ?>/<?= htmlspecialchars($foto->archivo) ?>" width="200">
            </a>
        </div>
    <?php endforeach; ?>
</div>
</body>
</html>
