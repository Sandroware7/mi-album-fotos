<?php
// se incluyen las dependencias necesarias para la aplicación
require_once '../vendor/autoload.php';
require_once '../config/database.php';
require_once '../config/session.php';
require_once '../config/config.php';

use App\Controllers\AuthController;
use App\Controllers\FotoController;
use App\Controllers\UsuarioController;

$request_uri = $_SERVER['REQUEST_URI'];
$script_name = $_SERVER['SCRIPT_NAME'];


$base_path = dirname($script_name);
$ruta = str_replace($base_path, '', $request_uri);
$ruta = strtok($ruta, '?');

if ($ruta === '') {
    $ruta = '/';
}

// enrutamiento basico
switch (true) {
    case $ruta === '/':
        // si hay sesion activa, redirige al album de fotos
        if (isset($_SESSION['usuario_id'])) {
            header('Location: ' . BASE_URL . '/fotos');
            exit;
        }
        // si no hay sesion, muestra la pagina de bienvenida
        else {
            include '../app/views/welcome.php';
        }
        break;

    // ruta para mostrar las fotos
    case $ruta === '/fotos':
        $controller = new App\Controllers\FotoController();
        $controller->index();
        break;

    // ruta para subir foto
    case $ruta === '/fotos/crear':
        $controller = new App\Controllers\FotoController();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $controller->crear();
        } else {
            include '../app/views/fotos/crear.php';
        }
        break;

    // ruta para editar foto
    case preg_match('#^/fotos/editar/(\d+)$#', $ruta, $matches):
        $controller = new App\Controllers\FotoController();
        $controller->editar($matches[1]);
        break;

    // ruta para eliminar foto
    case preg_match('#^/fotos/eliminar/(\d+)$#', $ruta, $matches):
        $controller = new App\Controllers\FotoController();
        $controller->eliminar($matches[1]);
        break;

    case $ruta === '/login':
        $controller = new App\Controllers\AuthController();
        $controller->login();
        break;

    case $ruta === '/register':
        $controller = new App\Controllers\AuthController();
        $controller->register();
        break;

    case $ruta === '/logout':
        $controller = new App\Controllers\AuthController();
        $controller->logout();
        break;

    case preg_match('#^/public/uploads/(.+)$#', $ruta, $matches):
        $archivo = '../public/uploads/' . $matches[1];
        if (file_exists($archivo)) {
            $tipo = mime_content_type($archivo);
            header('Content-Type: ' . $tipo);
            readfile($archivo);
            exit;
        }
    // rutas para USUARIOS
    case preg_match('#^/usuarios/(\d+)$#', $ruta, $matches) && $_SERVER['REQUEST_METHOD'] === 'POST' && ($_POST['_method'] ?? '') === 'PUT':
        $controller = new App\Controllers\UsuarioController();
        $controller->actualizar($matches[1]);
        break;

    case preg_match('#^/usuarios/(\d+)$#', $ruta, $matches) && $_SERVER['REQUEST_METHOD'] === 'POST' && ($_POST['_method'] ?? '') === 'DELETE':
        $controller = new App\Controllers\UsuarioController();
        $controller->destruir($matches[1]);
        break;

    case preg_match('#^/usuarios/(\d+)$#', $ruta, $matches):
        $controller = new App\Controllers\UsuarioController();
        $controller->mostrar($matches[1]);
        break;

    case preg_match('#^/usuarios/(\d+)/editar$#', $ruta, $matches):
        $controller = new App\Controllers\UsuarioController();
        $controller->editar($matches[1]);
        break;

    // rutas para FOTOS
    case preg_match('#^/fotos/(\d+)$#', $ruta, $matches):
        $controller = new App\Controllers\FotoController();
        $controller->mostrar($matches[1]);
        break;


    default:
        http_response_code(404);
        echo "Página no encontrada: " . htmlspecialchars($ruta);
        break;
}