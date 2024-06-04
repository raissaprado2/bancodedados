<?php
include 'functions.php';
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="cadastro_funcionarios.css">
    <title>Página de Cadastro</title>
</head>
<body>
    <h1>Cadastro de Funcionários</h1>
    <form action="cadastro.php" method="POST">                                                                                 
        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome" required><br><br>

        <label for="sobrenome">Sobrenome</label>
        <input type="text" id="sobrenome" name="sobrenome" required><br><br>

        <label for="salario">Salário</label>
        <input type="number" id="salario" name="salario" required><br><br>

        <label for="data">Data de Contratação</label>
        <input type="date" id="data" name="data" required><br><br>

        <label for="Cargo">Cargo</label>
        <input type="text" id="cargo" name="cargo" required><br><br>

        
        <input type="submit" value="Cadastrar" >
    </form>
</body>
</html>

