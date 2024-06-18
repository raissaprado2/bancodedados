<?php
include 'functions.php';
$pdo = pdo_connect_pgsql();
$msg = '';
// Verifica se os dados POST não estão vazios
if (!empty($_POST)) {
    // Se os dados POST não estiverem vazios, insere um novo registro
    // Configura as variáveis que serão inserid_contatoas. Devemos verificar se as variáveis POST existem e, se não existirem, podemos atribuir um valor padrão a elas.
    // Verifica se a variável POST "nome" existe, se não existir, atribui o valor padrão para vazio, basicamente o mesmo para todas as variáveis
    $modelo = isset($_POST['modelo']) ? $_POST['modelo'] : '';
    $ano = isset($_POST['ano']) ? $_POST['ano'] : '';
    $placa = isset($_POST['data_contratacao']) ? $_POST['data_contratacao'] : '';
    $tipo= isset($_POST['cargo']) ? $_POST['cargo'] : '';
    $disponibilidade= isset($_POST['cargo']) ? $_POST['cargo'] : '';
    
    try{
      // Insere um novo registro na tabela contacts
    $stmt = $pdo->prepare('INSERT INTO carro (modelo, ano, placa, tipo, disponibilidade) VALUES (?, ?, ?, ?, ?)');
    $stmt->execute([$modelo, $ano, $placa, $tipo, $disponibilidade]);
    // Mensagem de saída
    $msg = 'Cadastro Realizado com Sucesso!';
    } catch (Exception $e){
      $msg = $e;
    }
    
}
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="reservar.css">
    <title> Reservas</title>
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
            <a href="encontrar.php"><i class="fas fa-shopping-basket"></i>Encontre sua reserva</a>
            <a href="update.php"><i class="fas fa-shopping-basket"></i>Editar</a>
            <a href="delete.php"><i class="fas fa-shopping-basket"></i>Excluir</a>
           
        </form>
    	</div>
    </nav><br><br>
    
    <h1>Cadastro de Carros</h1>
    <form action="cadastro_carros.php" method="POST">                                                                                 
        <label for="modelo">modelo:</label>
        <input type="text" id="modelo" name="modelo" required><br><br>

        <label for="ano">Ano :</label>
        <input type="text" id="Ano" name="Ano " required><br><br>

        <label for="placa">Placa</label>
        <input type="text" id="placa" name="placa" required><br><br>

        <label for="tipo">Tipo</label>
        <input type="text" id="tipo" name="tipo" required><br><br>

        <label for="disponibilidade">Disponibilidade</label>
        <input type="text" id="disponibilidade" name="disponibilidade" required><br><br>

        
     
        <input type="submit" value="Cadastrar">
        <p><?=$msg?></p>
   

    
    </form><br><br>


    <hr class="featurette-divider">
          <div class="container">
            <div class="rodapé">
                <p>&copy; 2024 - Locadora HotWheels.</p>
              </div>
              <?=template_footer()?>
</body>
</html>

