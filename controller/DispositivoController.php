<?php

require_once 'C:\Turma2\xampp\htdocs\EnerVsion\model\Dispositivo.php';

class DispositivoController {
    private $dispositivo;

    public function __construct($pdo) {
        $this->dispositivo = new Dispositivo($pdo);
    }

    public function cadastrar() {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $nome = $_POST["nome"];
            $email = $_POST["email"];
            $senha = $_POST["senha"];
            if ($this->dispositivo->cadastrar($nome, $email, $senha)) {
                echo "Usuário cadastrado com sucesso!";
            } else {
                echo "Erro ao cadastrar usuário!";
            }
        }
    }

    public function login() {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $email = $_POST["email"];
            $senha = $_POST["senha"];
            if ($this->dispositivo->login($email, $senha)) {
                header("Location: dashboard.php");
            } else {
                echo "Login inválido!";
            }
        }
    }

    public function logout() {
        session_start();
        session_destroy();
        header("Location: login.php");
    }

    public function adicionarDispositivo() {
        session_start();
        if (!isset($_SESSION["usuario_id"])) {
            header("Location: login.php");
            exit;
        }

        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $nome = $_POST["nome"];
            $potencia = $_POST["potencia"];
            $tempo_uso = $_POST["tempo_uso"];
            $usuario_id = $_SESSION["usuario_id"];

            if ($this->dispositivo->adicionarDispositivo($nome, $potencia, $tempo_uso, $usuario_id)) {
                echo "Dispositivo cadastrado com sucesso!";
                header("Location: index.php");
            } else {
                echo "Erro ao cadastrar dispositivo!";
            }
        }
    }

    public function listar() {
        session_start();
        if (!isset($_SESSION["usuario_id"])) {
            header("Location: login.php");
            exit;
        }
    
        $dispositivos = $this->dispositivo->listarDispositivos($_SESSION["usuario_id"]);
        require 'C:\Turma2\xampp\htdocs\EnerVsion\view\listar_dispositivos.php';
    }
}