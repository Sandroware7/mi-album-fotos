<?php


// BASE_URL → Ruta base del proyecto para usar en enlaces (no incluye el host)
// Se calcula automáticamente según la ubicación del archivo index.php
$scriptName = $_SERVER['SCRIPT_NAME'] ?? '';
$basePath = str_replace('/index.php', '', $scriptName);
if ($basePath === '') {
    $basePath = '/';
}
define('BASE_URL', $basePath);

// UPLOAD_PATH → Carpeta en el disco donde se guardan las fotos subidas
define('UPLOAD_PATH', __DIR__ . '/../public/uploads/');

// UPLOAD_URL → Ruta web para mostrar las fotos en el navegador
define('UPLOAD_URL', rtrim(BASE_URL, '/') . '/uploads');
