<?php

namespace App\Models;

class Usuario
{
    private $db;

    public function __construct()
    {
        $this->db = \Database::getConnection();
    }

    public function buscarPorEmail($email)
    {
        $stmt = $this->db->prepare("SELECT * FROM usuarios WHERE email = ?");
        $stmt->execute([$email]);
        return $stmt->fetch(\PDO::FETCH_OBJ);
    }

    public function crear($email, $password, $nombre)
    {
        try {
            $stmt = $this->db->prepare("INSERT INTO usuarios (email, password, nombre) VALUES (?, ?, ?)");
            $stmt->execute([$email, password_hash($password, PASSWORD_DEFAULT), $nombre]);
            return true;
        } catch (\PDOException $e) {
            return ($e->errorInfo[1] == 1062) ? 'duplicate' : false;
        }
    }


    public function verificarPassword($password, $hash)
    {
        return password_verify($password, $hash);
    }
}