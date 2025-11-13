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

    // metodo para mostrar todas las fotos del usuario
    public function index() {
        $fotos = $this->fotoModel->todasPorUsuario($_SESSION['usuario_id']);
        include __DIR__ . '/../views/fotos/index.php';
    }

    // metodo para crear una nueva foto (subirla).
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

    // metodo para editar una foto existente.
    public function editar($id) {
        $foto = $this->fotoModel->buscar($id, $_SESSION['usuario_id']);

        if (!$foto) {
            header('Location: /fotos');
            exit;
        }

        if ($_POST) {
            $metodo = $_POST['_method'] ?? $_SERVER['REQUEST_METHOD'];

            if ($metodo === 'PUT') {
                $titulo = $_POST['titulo'] ?? '';
                $descripcion = $_POST['descripcion'] ?? '';
                $archivo = $foto->archivo; // Mantiene la foto actual por defecto

                // verificar si se subio una nueva imagen
                if (isset($_FILES['archivo']) && $_FILES['archivo']['error'] === UPLOAD_ERR_OK) {
                    $extension = pathinfo($_FILES['archivo']['name'], PATHINFO_EXTENSION);
                    $nombre_archivo = uniqid() . '.' . $extension;
                    $ruta_destino = __DIR__ . '/../../public/uploads/' . $nombre_archivo;

                    if (move_uploaded_file($_FILES['archivo']['tmp_name'], $ruta_destino)) {
                        // eliminar la imagen anterior si existe
                        $ruta_anterior = __DIR__ . '/../../public/uploads/' . $foto->archivo;
                        if (file_exists($ruta_anterior)) {
                            unlink($ruta_anterior);
                        }
                        $archivo = $nombre_archivo;
                    }
                }

                // actualizar título, descripción y archivo
                $this->fotoModel->actualizar($id, $_SESSION['usuario_id'], $titulo, $descripcion, $archivo);

                header('Location: ' . BASE_URL . '/fotos');
                exit;
            }
        }

        include __DIR__ . '/../views/fotos/editar.php';
    }

    // metodo para eliminar una foto.
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

    public function mostrar($id)
    {
        $foto = $this->fotoModel->buscar($id, $_SESSION['usuario_id']);

        if (!$foto) {
            http_response_code(404);
            echo "Foto no encontrada.";
            return;
        }

        include __DIR__ . '/../views/fotos/showFoto.php';
    }


}