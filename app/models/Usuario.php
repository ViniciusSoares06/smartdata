<?php 

require_once __DIR__ . '/../../core/Conexao.php';

class Usuario {
    // Cadastra um novo usuário com senha criptografada
    public static function cadastrar($username, $senha) {
        $db = Conexao::obterConexao();
        $senhaHash = password_hash($senha, PASSWORD_BCRYPT);
        $sql = 'INSERT INTO users (username, senha) VALUES (:username, :senha)';
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':senha', $senhaHash);
        return $stmt->execute();
    }

    // Busca um usuário pelo nome de usuário
    public static function buscarPorUsername($username) {
        $db = Conexao::obterConexao();
        $sql = 'SELECT * FROM users WHERE username = :username';
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':username', $username);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Autentica o usuário verificando o nome de usuário e a senha
    public static function autenticar($username, $senha) {
        $db = Conexao::obterConexao();
        $sql = 'SELECT * FROM users WHERE username = :username';
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':username', $username);
        $stmt->execute();
        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if ($usuario && password_verify($senha, $usuario['senha'])) {
            return $usuario['id'];
        }
        return false;
    }
}
