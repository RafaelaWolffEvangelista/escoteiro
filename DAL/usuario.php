<?php
include_once $_SERVER['DOCUMENT_ROOT'] . "/escoteiro/DAL/conexao.php";
include_once $_SERVER['DOCUMENT_ROOT'] . "/escoteiro/MODEL/usuario.php";

// Avisa que vai usar o Modelo de Usuário que possui Namespace
use MODEL\Usuario;

class UsuarioDAL {
    
    // Método de login seguro solicitado pelas regras do sistema
    public function autenticar(string $email, string $senha): ?Usuario {
        $pdo = Conexao::getConexao();
        
        // 1. Criptografia MD5 aplicada na senha para segurança no banco
        $senha_criptografada = md5($senha);
        
        // 2. Uso de Prepared Statement (stmt) para blindar contra SQL Injection
        $stmt = $pdo->prepare("SELECT * FROM usuarios WHERE email = ? AND senha = ?");
        $stmt->execute([$email, $senha_criptografada]);
        $row = $stmt->fetch();
        
        if ($row) {
            // Retorna o objeto do usuário devidamente preenchido
            return new Usuario(
                $row['id_usuario'], 
                $row['nome'], 
                $row['email'], 
                $row['senha'], 
                $row['cargo']
            );
        }
        return null;
    }
}
?>