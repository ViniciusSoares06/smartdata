<?php 

require_once __DIR__ . '/../../core/Conexao.php';

class Cliente {
    // Lista todos os clientes
    public static function listarTodos() {
        $db = Conexao::obterConexao();
        return $db->query('SELECT * FROM clientes')->fetchAll(PDO::FETCH_ASSOC);
    }

    // Busca um cliente por ID
    public static function buscarPorId($id) {
        $db = Conexao::obterConexao();
        $stmt = $db->prepare('SELECT * FROM clientes WHERE id = :id');
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Adiciona um novo cliente
    public static function adicionar($dados) {
        $db = Conexao::obterConexao();
        $stmt = $db->prepare('INSERT INTO clientes (nome, documento, telefone, email, endereco) VALUES (:nome, :documento, :telefone, :email, :endereco)');
        return $stmt->execute($dados);
    }

    // Atualiza as informações de um cliente
    public static function atualizar($id, $dados) {
        $db = Conexao::obterConexao();
        $stmt = $db->prepare('UPDATE clientes SET nome = :nome, documento = :documento, telefone = :telefone, email = :email, endereco = :endereco WHERE id = :id');
        $dados['id'] = $id;
        return $stmt->execute($dados);
    }

    // Exclui um cliente pelo ID
    public static function excluir($id) {
        $db = Conexao::obterConexao();
        $stmt = $db->prepare('DELETE FROM clientes WHERE id = :id');
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }
}
