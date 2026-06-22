<?php
include_once $_SERVER['DOCUMENT_ROOT'] . "/escoteiro/DAL/usuario.php";
include_once $_SERVER['DOCUMENT_ROOT'] . "/escoteiro/MODEL/usuario.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $login = $_POST['usuario'] ?? ''; 
    $senha = $_POST['password'] ?? '';

    // Instancia a DAL usando o namespace configurado
    $dalUsuario = new \DAL\UsuarioDAL(); 
    
    // Chama o método autenticar que faz a checação segura no banco de dados
    $usuario = $dalUsuario->autenticar($login, $senha);

    // Se o usuário existir e a senha estiver correta, ele não será null
    if ($usuario !== null) {
        session_start();
        // Armazena o nome do escoteiro retornado pelo banco na sessão
        $_SESSION['login'] = $usuario->getNome(); 
        
        header("location:/escoteiro/VIEW/home.php");
        exit();
    } else {
        // Se as credenciais estiverem erradas, volta para a tela de login
        header("location:/escoteiro/VIEW/LOGIN/inserir_login.php");
        exit();
    }
} else {
    header("location:/escoteiro/VIEW/LOGIN/inserir_login.php");
    exit();
}
?>