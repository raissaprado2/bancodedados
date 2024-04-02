<?php
include 'conexao.php'; // Arquivo de conexão com o banco de dados

if (isset($_GET['pizza'])) {
    $pizza = $_GET['pizza'];
    
    $sql = "SELECT * FROM pedidos WHERE pizza LIKE '%$pizza%'";
    $result = $conn->query($sql);

    // Restante do código para exibir os resultados...
} else {
    // Código para exibir todos os pedidos caso nenhum sabor de pizza seja especificado.
}

$conn->close();
?>
