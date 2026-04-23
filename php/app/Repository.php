<?php

class Repository {
    private PDO $pdo;

    public function __construct() {
        $this->pdo = Database::connect();
    }

    public function findAll(): array {
        return $this->pdo->query('SELECT * FROM matricula ORDER BY id DESC')->fetchAll();
    }

    public function findByCpf(string $cpf): ?array {
        $stmt = $this->pdo->prepare('SELECT * FROM matricula WHERE cpf = ?');
        $stmt->execute([$cpf]);
        return $stmt->fetch() ?: null;
    }

    public function findById(int $id): ?array {
        $stmt = $this->pdo->prepare('SELECT * FROM matricula WHERE id = ?');
        $stmt->execute([$id]);
        return $stmt->fetch() ?: null;
    }

    public function insert(string $cpf): int {
        $stmt = $this->pdo->prepare('INSERT INTO matricula (cpf, bloqueado) VALUES (:cpf, 0)');
        $stmt->execute(['cpf' => $cpf]);
        return (int) $this->pdo->lastInsertId();
    }

    public function update(int $id, array $fields): void {
        $set = implode(', ', array_map(fn($k) => "`$k` = :$k", array_keys($fields)));
        $stmt = $this->pdo->prepare("UPDATE matricula SET $set WHERE id = :id");
        $stmt->execute(array_merge($fields, ['id' => $id]));
    }
}
