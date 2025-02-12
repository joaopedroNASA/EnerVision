<?php

class Dispositivo {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function cadastrar($nome_usuario, $email_usuario, $senha_usuario) {
        $hash = password_hash($senha_usuario, PASSWORD_BCRYPT);
        $stmt = $this->pdo->prepare("INSERT INTO usuarios (nome_usuario, email_usuario, senha_usuario) VALUES (?, ?, ?)");
        return $stmt->execute([$nome_usuario, $email_usuario, $hash]);
    }

    public function login($email_usuario, $senha_usuario) {
        $stmt = $this->pdo->prepare("SELECT * FROM usuarios WHERE email_usuario = ?");
        $stmt->execute([$email_usuario]);
        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);
        
        session_start();
            $_SESSION["usuario_id"] = $usuario["id"];
            $_SESSION["nome_usuario"] = $usuario["nome_usuario"];

        if ($usuario && password_verify($senha_usuario, $usuario["senha_usuario"])) {
            return $usuario;
        }
        return false;
    }

    public function adicionarDispositivo($nome_dispositivo, $potencia, $tempo_uso, $usuario_id) {
        $consumo_estimado = ($potencia * $tempo_uso) / 1000;
        $sql = "INSERT INTO dispositivos (nome_dispositivo, potencia, tempo_uso, consumo_estimado, usuario_id) VALUES (?, ?, ?, ?, ?)";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([$nome_dispositivo, $potencia, $tempo_uso, $consumo_estimado, $usuario_id]);
    }

    public function listaDispositivos() {
        $sql = "SELECT * FROM dispositivos ORDER BY id DESC"; 
        $stmt = $this->pdo->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC); 
    }
}

?>
