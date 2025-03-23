<!-- Conexão do BDD -->
<?php
class Database {
    private $pdo;

    public function __construct() {
        try {
            $this->pdo = new PDO("sqlite:" . __DIR__ . "/../database/database.db");
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Erro na conexão: " . $e->getMessage());
        }
    }

    public function getPdo() {
        return $this->pdo;
    }
}
?>