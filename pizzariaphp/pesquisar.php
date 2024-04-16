<?php
include 'functions.php';

// Verifica se o parâmetro 'pizza' foi enviado via GET
if (isset($_GET['pizza'])) {
    $pizza = $_GET['pizza'];


    // Executa a consulta SQL usando a conexão com o banco de dados
    $sql = "SELECT * FROM contatos WHERE pizza LIKE '%$pizza%'";
    $result = $conn->query($sql);

    
} else {
    // Código para exibir todos os pedidos caso nenhum sabor de pizza seja especificado.
}

// Fecha a conexão com o banco de dados
$conn->close();
?>
