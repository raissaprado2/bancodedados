<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Locação</title>
    <link rel="stylesheet" href="estilo.css">
</head>
<body>
<div class="container">
    <h1>Cadastro de Locação</h1>
    <form action="processa_locacao.php" method="post">
        <div class="form-row">
            <div class="form-column">
                <label for="id_locacao">ID da Locação</label>
                <input type="text" id="id_locacao" name="id_locacao" required>
            </div>
            <div class="form-column">
                <label for="id_cliente">Cliente</label>
                <select id="id_cliente" name="id_cliente" required>
                    <!-- Opções de clientes serão preenchidas dinamicamente -->
                    <?php
                    // Conectar ao banco de dados e buscar os clientes
                    $conn = new mysqli('localhost', 'seu_usuario', 'sua_senha', 'seu_banco_de_dados');
                    if ($conn->connect_error) {
                        die("Falha na conexão: " . $conn->connect_error);
                    }
                    $result = $conn->query("SELECT id_cliente, nome FROM cliente");
                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            echo "<option value='" . $row['id_cliente'] . "'>" . $row['nome'] . "</option>";
                        }
                    }
                    $conn->close();
                    ?>
                </select>
            </div>
            <div class="form-column">
                <label for="id_carro">Carro</label>
                <select id="id_carro" name="id_carro" required>
                    <!-- Opções de carros serão preenchidas dinamicamente -->
                    <?php
                    // Conectar ao banco de dados e buscar os carros
                    $conn = new mysqli('localhost', 'seu_usuario', 'sua_senha', 'seu_banco_de_dados');
                    if ($conn->connect_error) {
                        die("Falha na conexão: " . $conn->connect_error);
                    }
                    $result = $conn->query("SELECT id_carro, modelo FROM carro WHERE disponibilidade = TRUE");
                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            echo "<option value='" . $row['id_carro'] . "'>" . $row['modelo'] . "</option>";
                        }
                    }
                    $conn->close();
                    ?>
                </select>
            </div>
            <div class="form-column">
                <label for="data_locacao">Data de Locação</label>
                <input type="date" id="data_locacao" name="data_locacao" required>
            </div>
            <div class="form-column">
                <label for="data_devolucao">Data de Devolução</label>
                <input type="date" id="data_devolucao" name="data_devolucao" required>
            </div>
            <div class="form-column">
                <label for="valor_total">Valor Total</label>
                <input type="text" id="valor_total" name="valor_total" required>
            </div>
        </div>
        <button type="submit">Enviar</button>
    </form>
</div>
</body>
</html>
