<?php

class Dispositivo {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function cadastrar($nome, $email, $senha) {
        $hash = password_hash($senha, PASSWORD_BCRYPT);
        $stmt = $this->pdo->prepare("INSERT INTO usuarios (nome, email, senha) VALUES (?, ?, ?)");
        return $stmt->execute([$nome, $email, $hash]);
    }

    public function login($email, $senha) {
        $stmt = $this->pdo->prepare("SELECT * FROM usuarios WHERE email = ?");
        $stmt->execute([$email]);
        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if ($usuario && password_verify($senha, $usuario["senha"])) {
            session_start();
            $_SESSION["usuario_id"] = $usuario["id"];
            $_SESSION["nome"] = $usuario["nome"];
            return true;
        }
        return false;
    }

    public function adicionarDispositivo($nome, $potencia, $tempo_uso, $usuario_id) {
        $consumo_estimado = ($potencia * $tempo_uso) / 1000;
        $sql = "INSERT INTO dispositivos (nome, potencia, tempo_uso, consumo_estimado, usuario_id) VALUES (?, ?, ?, ?, ?)";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([$nome, $potencia, $tempo_uso, $consumo_estimado, $usuario_id]);
    }

    public function listarDispositivos($usuario_id) {
        $stmt = $this->pdo->prepare("SELECT * FROM dispositivos WHERE usuario_id = ?");
        $stmt->execute([$usuario_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}

?>
