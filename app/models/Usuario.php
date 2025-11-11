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
        $stmt = $this->db->prepare("INSERT INTO usuarios (email, password, nombre) VALUES (?, ?, ?)");
        return $stmt->execute([
            $email,
            password_hash($password, PASSWORD_DEFAULT),
            $nombre
        ]);
    }

    public function verificarPassword($password, $hash)
    {
        return password_verify($password, $hash);
    }
}