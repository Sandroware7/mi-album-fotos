<?php
namespace App\Controllers;

use App\Models\Usuario;

class AuthController {
    private $usuarioModel;

    public function __construct() {
        $this->usuarioModel = new Usuario();
        //session_start();
    }

    // metodo para manejar el inicio de sesion
    public function login() {
        if ($_POST) {
            $email = $_POST['email'] ?? '';
            $password = $_POST['password'] ?? '';

            $usuario = $this->usuarioModel->buscarPorEmail($email);

            if ($usuario && $this->usuarioModel->verificarPassword($password, $usuario->password)) {
                $_SESSION['usuario_id'] = $usuario->id;
                $_SESSION['usuario_nombre'] = $usuario->nombre;
                header('Location: ' . BASE_URL . '/fotos');
                exit;
            } else {
                $error = "Credenciales incorrectas";
            }
        }

        include __DIR__ . '/../views/auth/login.php';
    }

    // metodo para manejar el cierre de sesión
    public function logout() {
        session_destroy();
        header('Location: ' . BASE_URL . '/login');
        exit;
    }

    // metodo para manejar el registro de un nuevo usuario
    public function register() {
        if ($_POST) {
            $email = $_POST['email'] ?? '';
            $password = $_POST['password'] ?? '';
            $nombre = $_POST['nombre'] ?? '';

            $resultado = $this->usuarioModel->crear($email, $password, $nombre);

            if ($resultado === 'duplicate') {
                $error = 'El correo ya está registrado.';
                include __DIR__ . '/../views/auth/register.php';
                return;
            }

            if ($resultado) {
                $_SESSION['mensaje'] = 'Usuario creado correctamente. Inicia sesión para continuar.';
                header('Location: ' . BASE_URL . '/login');
                exit;
            }

            $error = 'Error al crear usuario.';
        }

        include __DIR__ . '/../views/auth/register.php';
    }

}