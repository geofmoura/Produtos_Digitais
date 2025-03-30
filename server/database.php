<?php
class Database {
    private $pdo;

    public function __construct() {
        try {
            $this->pdo = new PDO('sqlite:' . __DIR__ . '/../database/database.db');
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            
            // Verifica se a tabela existe, se não, cria
            $this->verificarTabelaUsuarios();
        } catch (PDOException $e) {
            die("Erro na conexão: " . $e->getMessage());
        }
    }

    private function verificarTabelaUsuarios() {
        $sql = "CREATE TABLE IF NOT EXISTS usuarios (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            nome TEXT NOT NULL,
            email TEXT NOT NULL UNIQUE,
            senha TEXT NOT NULL
        )";
        $this->pdo->exec($sql);
    }

    public function getPdo() {
        return $this->pdo;
    }
}
?>