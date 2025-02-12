<?php

require_once 'C:\Turma2\xampp\htdocs\EnerVsion\model\Dispositivo.php';

class DispositivoController {
    private $dispositivo;

    public function __construct($pdo) {
        $this->dispositivo = new Dispositivo($pdo);
    }

    public function cadastrar() {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $nome_usuario = $_POST["nome"];
            $email_usuario = $_POST["email"];
            $senha_usuario = $_POST["senha"];
            if ($this->dispositivo->cadastrar($nome_usuario, $email_usuario, $senha_usuario)) {
                echo "Usuário cadastrado com sucesso!";
            } else {
                echo "Erro ao cadastrar usuário!";
            }
        }
    }

    public function login() {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $email_usuario = $_POST["email"];
            $senha_usuario = $_POST["senha"];
            if ($this->dispositivo->login($email_usuario, $senha_usuario)) {
                header("Location: view/cadastrar.php");
            } else {
                echo "Login inválido!";
            }
        }
    }

    public function logout() {
        session_start();
        session_destroy();
        header("Location: view/login.php");
    }

    public function adicionarDispositivo() {
        session_start();
        if (!isset($_SESSION["usuario_id"])) {
            header("Location: view/login.php");
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

    public function listaDispositivos() {
        return $this->dispositivo->listaDispositivos(); 
    }
    
    public function exibirListaDispositivos() {
        $dispositivos = $this->listaDispositivos(); 
        if (!$dispositivos) {  
            $dispositivos = [];
        }
        include 'C:\Turma2\xampp\htdocs\EnerVsion\view\listar_dispositivos.php';

}
}
