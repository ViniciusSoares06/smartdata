<?php

require_once __DIR__ . '/../models/Cliente.php';
require_once __DIR__ . '/../../core/Sessao.php';

# Inicia a sessão e verifica se o usuário está logado
Sessao::iniciar();
if (!Sessao::estaLogado()) {
    // Se não estiver logado, redireciona para a página de login
    header('Location: login.php');
    exit;
}

$acao = $_GET['acao'] ?? 'listar';

// Verifica a ação solicitada
switch ($acao) {
    case 'adicionar':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            Cliente::adicionar($_POST);
            header('Location: index.php');
        } else {
            include '../app/views/adicionar_cliente.php';
        }
        break;
    case 'editar':
        $id = $_GET['id'];
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            Cliente::atualizar($id, $_POST);
            header('Location: index.php');
        } else {
            $cliente = Cliente::buscarPorId($id);
            include '../app/views/editar_cliente.php';
        }
        break;
    case 'excluir':
        Cliente::excluir($_GET['id']);
        header('Location: index.php');
        break;
    default:
        $clientes = Cliente::listarTodos();
        include '../app/views/clientes.php';
        break;
}
