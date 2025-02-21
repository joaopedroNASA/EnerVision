<?php
class GraficoModel {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function inserirDado($mes, $kilowatts, $usuario_id) {
        $sql_insert = "INSERT INTO grafico (mes, kilowatts, usuario_id) VALUES (?, ?, ?)";
        $stmt = $this->pdo->prepare($sql_insert);
        $stmt->execute([$mes, $kilowatts, $usuario_id]);
    }

    public function deletarDado($mes) {
        $sql_delete = "DELETE FROM grafico WHERE mes = ?";
        $stmt = $this->pdo->prepare($sql_delete);
        $stmt->execute([$mes]);
    }

    public function listarDados($usuario_id) {
        $sql = "SELECT mes, kilowatts FROM grafico WHERE usuario_id = $usuario_id";
        $stmt = $this->pdo->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function fecharConexao() {
        $this->pdo = null;
    }
    public function deletarTodosDados() {
        $sql_delete_all = "DELETE FROM grafico";
        $this->pdo->exec($sql_delete_all);
    }
    
}
?>
