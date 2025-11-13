<?php
namespace App\Models;

//esta clase interactua con la base de datos para manejar las fotos de un usuario
class Foto {
    private $db;

    public function __construct() {
        $this->db = \Database::getConnection();
    }
    // metodo para obtener todas las fotos de un usuario específico.
    public function todasPorUsuario($usuario_id) {
        $stmt = $this->db->prepare("SELECT * FROM fotos WHERE usuario_id = ? ORDER BY subida_en DESC");
        $stmt->execute([$usuario_id]);
        return $stmt->fetchAll(\PDO::FETCH_OBJ);
    }

    public function buscar($id, $usuario_id) {
        $stmt = $this->db->prepare("SELECT * FROM fotos WHERE id = ? AND usuario_id = ?");
        $stmt->execute([$id, $usuario_id]);
        return $stmt->fetch(\PDO::FETCH_OBJ);
    }

    public function crear($usuario_id, $titulo, $archivo, $descripcion = '') {
        $stmt = $this->db->prepare("INSERT INTO fotos (usuario_id, titulo, archivo, descripcion) VALUES (?, ?, ?, ?)");
        return $stmt->execute([
            $usuario_id,
            htmlspecialchars($titulo),
            $archivo,
            htmlspecialchars($descripcion)
        ]);
    }

    public function actualizar($id, $usuario_id, $titulo, $descripcion, $archivo)
    {
        $stmt = $this->db->prepare("
        UPDATE fotos 
        SET titulo = ?, descripcion = ?, archivo = ? 
        WHERE id = ? AND usuario_id = ?
    ");
        return $stmt->execute([$titulo, $descripcion, $archivo, $id, $usuario_id]);
    }


    public function eliminar($id, $usuario_id) {
        $foto = $this->buscar($id, $usuario_id);
        if ($foto) {
            $ruta_archivo = UPLOAD_PATH . $foto->archivo;
            if (file_exists($ruta_archivo)) {
                unlink($ruta_archivo);
            }
        }

        $stmt = $this->db->prepare("DELETE FROM fotos WHERE id = ? AND usuario_id = ?");
        return $stmt->execute([$id, $usuario_id]);
    }
}
