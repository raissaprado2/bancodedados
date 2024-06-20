<?php
include 'functions.php';
$pdo = pdo_connect_pgsql();
$msg = '';
// Verifica se os dados POST não estão vazios
if (!empty($_POST)) {
    // Se os dados POST não estiverem vazios, insere um novo registro
    // Configura as variáveis que serão inserid_contatoas. Devemos verificar se as variáveis POST existem e, se não existirem, podemos atribuir um valor padrão a elas.
    // Verifica se a variável POST "nome" existe, se não existir, atribui o valor padrão para vazio, basicamente o mesmo para todas as variáveis
    $nome = isset($_POST['nome']) ? $_POST['nome'] : '';
    $sobrenome = isset($_POST['sobrenome']) ? $_POST['sobrenome'] : '';
    $salario = isset($_POST['salario']) ? $_POST['salario'] : '';
    $data_contratacao = isset($_POST['data_contratacao']) ? $_POST['data_contratacao'] : '';
    $cargo = isset($_POST['cargo']) ? $_POST['cargo'] : '';
    
    try{
      // Insere um novo registro na tabela contacts
    $stmt = $pdo->prepare('INSERT INTO funcionarios (nome, sobrenome, salario, data_contratacao, cargo) VALUES (?, ?, ?, ?, ?)');
    $stmt->execute([$nome, $sobrenome, $salario, $data_contratacao, $cargo]);
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
    <link rel="stylesheet" href="cadastro_funcionarios.css">
    <title> Cadastro Funcionários</title>
</head>
<body>
<nav class="navtop">
    	<div>
    		<h1>Locadora HotWheels <br> <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-fire" viewBox="0 0 16 16">
            <path d="M8 16c3.314 0 6-2 6-5.5 0-1.5-.5-4-2.5-6 .25 1.5-1.25 2-1.25 2C11 4 9 .5 6 0c.357 2 .5 4-2 6-1.25 1-2 2.729-2 4.5C2 14 4.686 16 8 16m0-1c-1.657 0-3-1-3-2.75 0-.75.25-2 1.25-3C6.125 10 7 10.5 7 10.5c-.375-1.25.5-3.25 2-3.5-.179 1-.25 2 1 3 .625.5 1 1.364 1 2.25C11 14 9.657 15 8 15"/>
          </svg></h1>
            <a href="index.php"><i class="fas fa-home"></i>Inicio</a>
    		<a href="reservar.php"><i class="fas fa-shopping-basket"></i>Realizar Reservas</a>
            <a href="carros.php"><i class="fas fa-search"></i>Carros</a>
            <a href="listar_cliente.php"><i class="fas fa-shopping-basket"></i>Listar Clientes</a>
            <a href="listar_carros.php"><i class="fas fa-shopping-basket"></i>Listar Carros</a>
            <a href="listar_funcionario.php"><i class="fas fa-shopping-basket"></i>Listar Funcionários</a>
            
           
        </form>
    	</div>
    </nav><br><br>
    
    <h1>Cadastro de Funcionários</h1>
    <form action="cadastro_funcionarios.php" method="POST">                                                                                 
        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome" required><br><br>

        <label for="sobrenome">Sobrenome</label>
        <input type="text" id="sobrenome" name="sobrenome" required><br><br>

        <label for="salario">Salário</label>
        <input type="number" id="salario" name="salario" required><br><br>

        <label for="data_contratacao">Data de Contratação</label>
        <input type="date" id="data_contratacao" name="data_contratacao" required><br><br>

        <label for="cargo">Cargo</label>
        <input type="text" id="cargo" name="cargo" required><br><br>
   

        
        <input type="submit" value="Cadastrar" >
        
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

