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
<h1>NOVO CLIENTE</h1>
<form method="POST">
    <!-- Formulário para adicionar novo cliente -->
    <label>Nome: <input type="text" name="nome" required pattern="[A-Za-zÀ-ÿ\s]{2,}" title="Digite um nome válido com pelo menos 2 letras."></label>
    <label>Documento: <input type="text" name="documento" required pattern="\d{11}" title="Digite exatamente 11 números."></label>
    <label>Telefone: <input type="text" name="telefone" required pattern="\d{10,11}" title="Digite um telefone com DDD (10 ou 11 dígitos)."></label>
    <label>Email: <input type="email" name="email" required></label>
    <label>Endereço: <input type="text" name="endereco" required></label>

    <button type="submit">Salvar</button>
    <button type="button" onclick="history.go(-1)">Voltar</button>
</form>

</body>
</html>
