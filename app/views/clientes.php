<!DOCTYPE html>
<html>
<head>
    <title>SmartData | Início</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css?<?php echo time(); ?>">
    <link rel="icon" type="image/png" href="img/smartdatalogo.png">
</head>
<body>
    
    <?php include_once 'header.php'; ?>

    <h1>LISTA DE CLIENTES</h1>
    <table border="1">
        <tr><th>NOME</th><th>DOCUMENTO</th><th>TELEFONE</th><th>EMAIL</th><th>ENDEREÇO</th><th>AÇÕES</th></tr>

        <!-- Laço para puxar dados do BD e listar -->
        <?php foreach ($clientes as $c): ?>
        <tr>
            <td><?= $c['nome'] ?></td>
            <td><?= $c['documento'] ?></td>
            <td><?= $c['telefone'] ?></td>
            <td><?= $c['email'] ?></td>
            <td><?= $c['endereco'] ?></td>
            <td class="acoes">
                <!-- Links para editar ou excluir o cliente -->
                <a href="?acao=editar&id=<?= $c['id'] ?>"><img class="acao" src="img/edit.png" alt="Editar"></a>
                <a href="?acao=excluir&id=<?= $c['id'] ?>" onclick="return confirm('Tem certeza?')"><img class="acao" src="img/delete.png" alt="Deletar"></a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
