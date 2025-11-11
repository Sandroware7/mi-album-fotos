<?php
namespace App\Controllers;

use App\Models\Usuario;

class AuthController {
    private $usuarioModel;

    public function __construct() {
        $this->usuarioModel = new Usuario();
        //session_start();
    }

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

    public function logout() {
        session_destroy();
        header('Location: ' . BASE_URL . '/login');
        exit;
    }

    public function register() {
        if ($_POST) {
            $email = $_POST['email'] ?? '';
            $password = $_POST['password'] ?? '';
            $nombre = $_POST['nombre'] ?? '';

            if ($this->usuarioModel->crear($email, $password, $nombre)) {
                header('Location: ' . BASE_URL . '/login');
                exit;
            } else {
                $error = "Error al crear usuario";
            }
        }

        include __DIR__ . '/../views/auth/register.php';
    }
}