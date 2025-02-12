<?php

require_once 'C:\Turma2\xampp\htdocs\EnerVsion\model\Dispositivo.php';

class DispositivoController {
    private $dispositivo;

    public function __construct($pdo) {
        $this->dispositivo = new Dispositivo($pdo);
    }

    public function cadastrar($nome_usuario, $email_usuario, $senha_usuario) {
      $resultado = $this->dispositivo->cadastrar($nome_usuario, $email_usuario, $senha_usuario);
              if($resultado) {
                 echo "Usuário cadastrado com sucesso!";
            } else {
                echo "Erro ao cadastrar usuário!";
            }
    }

    public function login($email_usuario, $senha_usuario) {
     $usuario = $this->dispositivo->login($email_usuario, $senha_usuario);
     
     if($usuario){
                $_SESSION["usuario_id"] = $usuario["id"];
                header("Location: index.php");
            } else {
                echo "Login inválido!";
            }
        
    }

    public function logout() {
        session_start();
        session_destroy();
        header("Location: view/login.php");
    }

    public function adicionarDispositivo($nome, $potencia, $tempo_uso) {
        session_start();

            $usuario_id = $_SESSION["usuario_id"];

            return $this->dispositivo->adicionarDispositivo($nome, $potencia, $tempo_uso, $usuario_id);
        }

    public function listarDispositivos() {
        $dispositivos = $this->dispositivo->listaDispositivos(); 
        
        if (!$dispositivos) {
            $dispositivos = [];
        }
return $dispositivos;
        //include 'C:\Turma2\xampp\htdocs\EnerVsion\view\listar_dispositivos.php';
    }
}
