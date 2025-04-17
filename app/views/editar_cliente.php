<!DOCTYPE html>
<html>
<head>
    <title>Clientes</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css?<?php echo time(); ?>">
</head>
<body>

<?php include_once 'header.php'; ?>

<h1>EDITAR CLIENTE</h1>

<!-- Formulário para editar os dados do cliente -->
<form method="POST">

    <label>Nome: 
        <input type="text" name="nome" value="<?= $cliente['nome'] ?>" 
               required 
               pattern="[A-Za-zÀ-ÿ\s]{3,}" 
               title="Somente letras e espaços, mínimo de 3 letras">
    </label>
    <label>Documento: 
        <input type="text" name="documento" value="<?= $cliente['documento'] ?>" 
               required 
               pattern="\d{11}" 
               title="Digite os 11 números do CPF, sem pontos ou traços">
    </label>
    <label>Telefone: 
        <input type="text" name="telefone" value="<?= $cliente['telefone'] ?>" 
               required 
               pattern="\d{10,11}" 
               title="Digite o telefone com DDD, sem espaços ou caracteres especiais">
    </label>
    <label>Email: 
        <input type="email" name="email" value="<?= $cliente['email'] ?>" required>
    </label>
    <label>Endereço: 
        <input type="text" name="endereco" value="<?= $cliente['endereco'] ?>" required>
    </label>

    <button type="submit">Atualizar</button>
    <button type="button" onclick="history.go(-1)">Voltar</button>

</form>

</body>
</html>
