<?php
namespace App;
use App;

class Aluno
{
    private $db;

    public function __construct(DBConnection $db) {
        $this->db = $db;
    }

    public function getAlunoById($id) {
        $stmt = $this->db->query("SELECT * FROM alunos WHERE id = :id", ['id' => $id]);
        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }

    public function getAlunoAll() {
        $stmt = $this->db->query("SELECT * FROM alunos");
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }


    public function createAluno($name, $email) {
        $this->db->query("INSERT INTO alunos (nome, email) VALUES (:name, :email)", ['name' => $name, 'email' => $email]);
        return $this->db->lastInsertId();
    }
}