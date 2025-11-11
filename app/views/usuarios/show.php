<!DOCTYPE html>
<html>
<head><title>Perfil de Usuario</title></head>
<body>
<h1>Perfil de <?= htmlspecialchars($usuario->nombre) ?></h1>

<p><strong>Email:</strong> <?= htmlspecialchars($usuario->email) ?></p>

<p>
    <a href="<?= BASE_URL ?>/usuarios/<?= $usuario->id ?>/editar">Editar</a> |
<form action="<?= BASE_URL ?>/usuarios/<?= $usuario->id ?>" method="POST" style="display:inline;">
    <input type="hidden" name="_method" value="DELETE">
    <button type="submit" onclick="return confirm('¿Eliminar cuenta?')">Eliminar cuenta</button>
</form>
</p>

<p><a href="<?= BASE_URL ?>/fotos">Volver al álbum</a></p>
</body>
</html>
