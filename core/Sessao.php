<?php 

class Sessao {
    // Inicia a sessão se precisar
    public static function iniciar() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
    }

    // Verifica se o usuário está logado
    public static function estaLogado() {
        return isset($_SESSION['usuario_id']);
    }

    // Faz login e armazena a sessão
    public static function login($usuario_id) {
        $_SESSION['usuario_id'] = $usuario_id;
    }

    // Destroi a sessão para realizar o logout
    public static function logout() {
        session_destroy();
    }
}
