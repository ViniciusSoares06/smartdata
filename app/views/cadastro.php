<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title>Cadastro de Usuário</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css?<?php echo time(); ?>">
</head>
<body>
    <h1>Cadastro de Usuário</h1>
    <!-- Formulário de cadastro -->
    <form action="/smartdata/public/cadastro.php" method="POST">
        <label>Nome *
            <input type="text" name="username" placeholder="Nome de Usuário" required>
        </label>
        
        <label>Senha *
            <input type="password" name="senha" placeholder="Senha" required minlength="8">
        </label>

        <button type="submit" name="cadastrar">Cadastrar</button>
        <p><a href="login.php">Já tenho uma conta</a></p>

    </form>

    <!-- Exibe mensagens de erro -->
    <?php if (isset($erro)) echo "<p>$erro</p>"; ?>

</body>
</html>
