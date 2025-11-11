<?php

namespace App\Controllers;

use App\Models\Usuario;

class UsuarioController
{
    private $usuarioModel;

    public function __construct()
    {
        $this->usuarioModel = new Usuario();
        if (session_status() === PHP_SESSION_NONE) session_start();
    }

    // GET /usuarios/{id}
    public function mostrar($id)
    {
        $usuario = $this->usuarioModel->buscarPorId($id);
        if (!$usuario) {
            http_response_code(404);
            echo "Usuario no encontrado.";
            return;
        }
        include __DIR__ . '/../views/usuarios/show.php';
    }

    // GET /usuarios/{id}/editar
    public function editar($id)
    {
        $usuario = $this->usuarioModel->buscarPorId($id);
        if (!$usuario) {
            header('Location: ' . BASE_URL . '/usuarios');
            exit;
        }
        include __DIR__ . '/../views/usuarios/edit.php';
    }

    // PUT /usuarios/{id}
    public function actualizar($id)
    {
        if (($_POST['_method'] ?? '') === 'PUT') {
            $this->usuarioModel->actualizar($id, $_POST['nombre'], $_POST['email']);

            // 🔄 Actualiza sesión en una sola línea
            if ($_SESSION['usuario_id'] == $id) {
                $_SESSION['usuario_nombre'] = $_POST['nombre'];
            }

            header('Location: ' . BASE_URL . '/usuarios/' . $id);
            exit;
        }
    }


    // DELETE /usuarios/{id}
    public function destruir($id)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && ($_POST['_method'] ?? '') === 'DELETE') {
            $this->usuarioModel->eliminar($id);
            session_destroy();
            header('Location: ' . BASE_URL . '/register');
            exit;
        }
    }
}
