<?php

class Repository {
    private $pdo;

    public function __construct() {
        $this->pdo = Database::connect();
    }

    public function findAll() {
        return $this->pdo->query('SELECT * FROM matricula ORDER BY id DESC')->fetchAll();
    }

    public function findByCpf($cpf) {
        $stmt = $this->pdo->prepare('SELECT * FROM matricula WHERE cpf = ?');
        $stmt->execute([$cpf]);
        $row = $stmt->fetch();
        return $row ?: null;
    }

    public function findById($id) {
        $stmt = $this->pdo->prepare('SELECT * FROM matricula WHERE id = ?');
        $stmt->execute([(int) $id]);
        $row = $stmt->fetch();
        return $row ?: null;
    }

    public function insert($cpf) {
        $stmt = $this->pdo->prepare('INSERT INTO matricula (cpf, bloqueado) VALUES (:cpf, 0)');
        $stmt->execute(['cpf' => $cpf]);
        return (int) $this->pdo->lastInsertId();
    }

    public function delete($id) {
        $stmt = $this->pdo->prepare('DELETE FROM matricula WHERE id = ?');
        $stmt->execute([(int) $id]);
    }

    public function update($id, $fields) {
        $parts = [];
        foreach (array_keys($fields) as $k) {
            $parts[] = "`$k` = :$k";
        }
        $set  = implode(', ', $parts);
        $stmt = $this->pdo->prepare("UPDATE matricula SET $set WHERE id = :id");
        $stmt->execute(array_merge($fields, ['id' => (int) $id]));
    }
}
