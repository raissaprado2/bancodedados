<?php
include 'conexao.php'; // Arquivo de conexão com o banco de dados

if (isset($_GET['cliente'])) {
    $cliente = $_GET['cliente'];
    
    $sql = "SELECT * FROM pedidos WHERE cliente LIKE '%$cliente%'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<table>";
        echo "<tr><th>ID</th><th>Cliente</th><th>Produto</th><th>Quantidade</th><th>Valor</th><th>Data do Pedido</th></tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr><td>"  . $row["pizza"]  . "</td></tr>";
        }
        echo "</table>";
    } else {
        echo "Nenhum resultado encontrado.";
    }
} else {
    echo "Por favor, insira um cliente para pesquisar.";
}

$conn->close();
?>