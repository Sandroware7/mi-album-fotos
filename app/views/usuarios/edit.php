<!DOCTYPE html>
<html>
<head><title>Editar Usuario</title></head>
<body>
<h1>Editar Usuario</h1>

<form method="POST" action="<?= BASE_URL ?>/usuarios/<?= $usuario->id ?>">
    <input type="hidden" name="_method" value="PUT">

    <div>
        <label>Nombre:</label>
        <input type="text" name="nombre" value="<?= htmlspecialchars($usuario->nombre) ?>" required>
    </div>

    <div>
        <label>Email:</label>
        <input type="email" name="email" value="<?= htmlspecialchars($usuario->email) ?>" required>
    </div>

    <button type="submit">Actualizar</button>
</form>

<p><a href="<?= BASE_URL ?>/usuarios/<?= $usuario->id ?>">Volver al perfil</a></p>
</body>
</html>
