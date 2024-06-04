<?php
include 'functions.php';
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="cadastro_cliente.css">
    <title>Página de Cadastro</title>
</head>
<body>
    <h1>Cadastro de Clientes</h1>
    <form action="cadastro.php" method="POST">                                                                                 
        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome" required><br><br>

        <label for="sobrenome">Sobrenome</label>
        <input type="text" id="sobrenome" name="sobrenome" required><br><br>

        <label for="endereco">Endereço</label>
        <input type="text" id="email" name="email" required><br><br>
        
        <label for="email">Estado</label>
        <input type="email" id="email" name="email" required><br><br>

        <label for="email">Cidade</label>
        <input type="email" id="email" name="email" required><br><br>

        <label for="email">Email</label>
        <input type="email" id="email" name="email" required><br><br>

        <label for="email">Celular</label>
        <input type="email" id="email" name="email" required><br><br>

        
        <input type="submit" value="Cadastrar"  >
    </form>
</body>
</html>

