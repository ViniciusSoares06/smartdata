<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title>Clientes</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css?<?php echo time(); ?>">
</head>
<body>

    <!-- Formulário de login -->
    <h1>Login</h1>
    <form action="" method="POST">
        <label>Nome<input type="text" name="username" placeholder="Nome de Usuário" required></label>
        <label>Nome<input type="password" name="senha" placeholder="Senha" required></label>
        
        <button type="submit" name="login">Entrar</button>

        <p><a href="cadastro.php">Cadastrar uma nova conta</a></p>

    </form>

    <!-- Exibe mensagens de erro -->
    <?php if (isset($erro)) { echo "<p>$erro</p>"; } ?>
</body>
</html>
