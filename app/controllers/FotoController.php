<?php
namespace App\Controllers;

use App\Models\Foto;

class FotoController {
    private $fotoModel;

    public function __construct() {
        $this->fotoModel = new Foto();
        //session_start();
        $this->verificarAutenticacion();
    }

    private function verificarAutenticacion() {
        if (!isset($_SESSION['usuario_id'])) {
            header('Location: ' . BASE_URL . '/login');
            exit;
        }
    }

    public function index() {
        $fotos = $this->fotoModel->todasPorUsuario($_SESSION['usuario_id']);
        include __DIR__ . '/../views/fotos/index.php';
    }

    public function crear() {
        if ($_POST) {
            $titulo = $_POST['titulo'] ?? '';
            $descripcion = $_POST['descripcion'] ?? '';

            if (isset($_FILES['archivo']) && $_FILES['archivo']['error'] === UPLOAD_ERR_OK) {
                $extension = pathinfo($_FILES['archivo']['name'], PATHINFO_EXTENSION);
                $nombre_archivo = uniqid() . '.' . $extension;
                $ruta_destino = UPLOAD_PATH . $nombre_archivo;

                if (move_uploaded_file($_FILES['archivo']['tmp_name'], $ruta_destino)) {
                    $this->fotoModel->crear($_SESSION['usuario_id'], $titulo, $nombre_archivo, $descripcion);
                    header('Location: ' . BASE_URL . '/fotos');
                    exit;
                }
            }
        }

        include __DIR__ . '/../views/fotos/crear.php';
    }

    public function editar($id) {
        $foto = $this->fotoModel->buscar($id, $_SESSION['usuario_id']);

        if (!$foto) {
            header('Location: ' . BASE_URL . '/fotos');
            exit;
        }

        if ($_POST) {
            $metodo = $_POST['_method'] ?? $_SERVER['REQUEST_METHOD'];

            if ($metodo === 'PUT') {
                $titulo = $_POST['titulo'] ?? '';
                $descripcion = $_POST['descripcion'] ?? '';

                $this->fotoModel->actualizar($id, $_SESSION['usuario_id'], $titulo, $descripcion);
                header('Location: ' . BASE_URL . '/fotos');
                exit;
            }
        }

        include __DIR__ . '/../views/fotos/editar.php';
    }

    public function eliminar($id) {
        if ($_POST) {
            $metodo = $_POST['_method'] ?? $_SERVER['REQUEST_METHOD'];

            if ($metodo === 'DELETE') {
                $this->fotoModel->eliminar($id, $_SESSION['usuario_id']);
            }
        }

        header('Location: ' . BASE_URL . '/fotos');
        exit;
    }
}