<?php

require_once __DIR__ . '/../models/Usuario.php';  
require_once __DIR__ . '/../../core/Sessao.php';  

Sessao::iniciar();  

if ($_SERVER['REQUEST_METHOD'] === 'POST') {  

    if (isset($_POST['cadastrar'])) {
        $username = $_POST['username'];  
        $senha = $_POST['senha'];  

        // Verifica se o nome de usuário já existe
        $usuarioExistente = Usuario::buscarPorUsername($username);
        if ($usuarioExistente) {
            $erro = 'Nome de usuário já existe';  
            include '../app/views/cadastro.php';  
            exit;
        }

        // Tenta cadastrar o usuário
        if (Usuario::cadastrar($username, $senha)) {
            header('Location: login.php');  
            exit;
        } else {
            $erro = 'Erro ao cadastrar usuário';  
            include '../app/views/cadastro.php';  
            exit;
        }
    }

    if (isset($_POST['login'])) {
        $username = $_POST['username'];  
        $senha = $_POST['senha'];  

        // Tenta autenticar o usuário
        $usuario_id = Usuario::autenticar($username, $senha);
        if ($usuario_id) {
            Sessao::login($usuario_id);  
            header('Location: index.php');  
            exit;
        } else {
            $erro = 'Usuário ou senha inválidos';  
            include '../app/views/login.php';  
            exit;
        }
    }
} else {  
    // Exibe o formulário de cadastro ou login
    if (strpos($_SERVER['SCRIPT_NAME'], 'cadastro.php') !== false) {
        include '../app/views/cadastro.php';  
    } else {
        include '../app/views/login.php';  
    }
}
