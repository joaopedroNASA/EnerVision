<?php

require_once 'C:\Turma2\xampp\htdocs\EnerVsion\model\Dispositivo.php';

class DispositivoController
{
    private $dispositivo;

    public function __construct($pdo)
    {
        $this->dispositivo = new Dispositivo($pdo);
    }

    public function cadastrar($nome_usuario, $email_usuario, $senha_usuario)
    {
        $resultado = $this->dispositivo->cadastrar($nome_usuario, $email_usuario, $senha_usuario);
        if ($resultado) {
            echo "Usuário cadastrado com sucesso!";
        } else {
            echo "Erro ao cadastrar usuário!";
        }
    }

    public function login($email_usuario, $senha_usuario)
    {
        $usuario = $this->dispositivo->login($email_usuario, $senha_usuario);

        if ($usuario) {
            $_SESSION["usuario_id"] = $usuario["id"];
            header("Location: index.php");
        } else {
            echo "Login inválido!";
        }
    }

    public function logout()
    {
        session_start();
        session_destroy();
        header("Location: view/login.php");
    }

    public function adicionarDispositivo($nome, $potencia, $tempo_uso)
{
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    if (!isset($_SESSION["usuario_id"])) {
        echo "Erro: Usuário não autenticado.";
        return false;
    }

    $usuario_id = $_SESSION["usuario_id"];
    return $this->dispositivo->adicionarDispositivo($nome, $potencia, $tempo_uso, $usuario_id);
}

public function listaDispositivos()
    {
        $dispositivos = $this->dispositivo->listaDispositivos();

        if (!$dispositivos) {
            $dispositivos = [];
        }
        return $dispositivos;
    }


public function registrarConsumoDiario()
{
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    if (!isset($_SESSION["usuario_id"])) {
        echo "Erro: Usuário não autenticado.";
        return false;
    }

    $usuario_id = $_SESSION["usuario_id"];
    $data = date("Y-m-d");
    
    $consumo_total = $this->dispositivo->calcularConsumoDiario($usuario_id);
    $this->dispositivo->registrarConsumo($usuario_id, $data, $consumo_total);

    echo "Consumo diário registrado!";
}

public function listarConsumos()
{
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    if (!isset($_SESSION["usuario_id"])) {
        echo "Erro: Usuário não autenticado.";
        return [];
    }

    $usuario_id = $_SESSION["usuario_id"];
    return $this->dispositivo->listarConsumoDiario($usuario_id) ?: [];
}

}
