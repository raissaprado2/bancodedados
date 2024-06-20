<?php
include 'functions.php';
$pdo = pdo_connect_pgsql();
$msg = '';

if (!empty($_POST)) {
    $valor = isset($_POST['valor']) ? $_POST['valor'] : '';
    $data_locacao = isset($_POST['data_locacao']) ? $_POST['data_locacao'] : '';
    $data_devolucao = isset($_POST['data_devolucao']) ? $_POST['data_devolucao'] : '';
    $id_carro = isset($_POST['id_carro']) ? $_POST['id_carro'] : '';

    try {
        $stmt_reserva = $pdo->prepare('INSERT INTO reservar (valor, data_locacao, data_devolucao, id_cliente, id_carro) VALUES (?, ?, ?, ?, ?)');
        $stmt_reserva->execute([$valor, $data_locacao, $data_devolucao,  $id_carro]);
        $msg = 'Reserva Realizada com Sucesso!';
    } catch (Exception $e) {
        $msg = 'Erro ao realizar a reserva: ' . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="reservar.css">
    <title>Realizar Reservas</title>
</head>
<body>
<nav class="navtop">
    	<div>
    		<h1>Locadora HotWheels <br>  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-fire" viewBox="0 0 16 16">
            <path d="M8 16c3.314 0 6-2 6-5.5 0-1.5-.5-4-2.5-6 .25 1.5-1.25 2-1.25 2C11 4 9 .5 6 0c.357 2 .5 4-2 6-1.25 1-2 2.729-2 4.5C2 14 4.686 16 8 16m0-1c-1.657 0-3-1-3-2.75 0-.75.25-2 1.25-3C6.125 10 7 10.5 7 10.5c-.375-1.25.5-3.25 2-3.5-.179 1-.25 2 1 3 .625.5 1 1.364 1 2.25C11 14 9.657 15 8 15"/>
          </svg></h1>
            <a href="index.php"><i class="fas fa-home"></i>Inicio</a>
    		    <a href="reservar.php"><i class="fas fa-shopping-basket"></i>Realizar Reservas</a>
            <a href="carros.php"><i class="fas fa-search"></i>Carros</a>
            <a href="cadastro_carros.php"><i class="fas fa-search"></i>Cadastrar Carros</a>
            <a href="listar_cliente.php"><i class="fas fa-shopping-basket"></i>Listar Clientes</a>
            <a href="listar_carros.php"><i class="fas fa-shopping-basket"></i>Listar Carros</a>
            <a href="listar_funcionario.php"><i class="fas fa-shopping-basket"></i>Listar Funcionários</a>
           
        </form>
    	</div>
    </nav><br><br>
    

    <h1>Realizar Reservas</h1>
    <form action="reservar.php" method="POST">
        <label for="valor">Valor:</label>
        <input type="text" id="valor" name="valor" required><br>

        <label for="data_locacao">Data de Locação:</label>
        <input type="date" id="data_locacao" name="data_locacao" required><br>

        <label for="data_devolucao">Data de Devolução:</label>
        <input type="date" id="data_devolucao" name="data_devolucao" required><br>

        <label for="id_carro">ID do Carro:</label>
        <input type="text" id="id_carro" name="id_carro" required><br><br>

        <button type="submit">Cadastrar</button>
    </form>


    <hr class="featurette-divider">
          <div class="container">
            <div class="rodapé">
                <p>&copy; 2024 - Locadora HotWheels.</p>
              </div>

    <?php if ($msg) { ?>
        <div class="message <?= strpos($msg, 'Erro') === false ? 'success' : 'error' ?>">
            <?= $msg ?>
        </div>
    <?php } ?>

</body>
</html>