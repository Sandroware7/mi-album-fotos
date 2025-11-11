<?php

// config/config.php

// BASE_URL -> ruta base relativa usada en los href/src (no incluye host)
// Se calcula automáticamente a partir del script actual (/mi-album-fotos/public por ejemplo)
$scriptName = $_SERVER['SCRIPT_NAME'] ?? '';
$basePath = str_replace('/index.php', '', $scriptName);
if ($basePath === '') {
    $basePath = '/';
}
define('BASE_URL', $basePath);

// UPLOAD_PATH -> ruta absoluta en disco para guardar/eliminar archivos
define('UPLOAD_PATH', __DIR__ . '/../public/uploads/');

// UPLOAD_URL -> url pública para acceder a las imágenes (BASE_URL + /uploads)
define('UPLOAD_URL', rtrim(BASE_URL, '/') . '/uploads');
