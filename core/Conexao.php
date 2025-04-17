<?php 

class Conexao {
    private static $instancia;

    // Método conectar com o banco de dados
    public static function obterConexao() {
        if (!isset(self::$instancia)) {
            $config = require __DIR__ . '/../config/config.php';
            try {
                self::$instancia = new PDO(
                    'mysql:host=' . $config['host'] . ';dbname=' . $config['dbname'],
                    $config['usuario'],
                    $config['senha']
                );
                self::$instancia->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                // Mensagem de erro caso precise
                die('Erro na conexao: ' . $e->getMessage());
            }
        }
        return self::$instancia;
    }
}
