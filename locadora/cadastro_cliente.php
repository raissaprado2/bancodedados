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
    $estado = isset($_POST['estado']) ? $_POST['estado'] : '';
    $endereco = isset($_POST['endereco']) ? $_POST['endereco'] : '';
    $cidade = isset($_POST['cidade']) ? $_POST['cidade'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $celular = isset($_POST['celular']) ? $_POST['celular'] : '';
   
    try{
      // Insere um novo registro na tabela contacts
    $stmt = $pdo->prepare('INSERT INTO cliente (nome, sobrenome, estado, endereco, cidade, email, celular) VALUES (?, ?, ?, ?, ?, ?, ?)');
    $stmt->execute([$nome, $sobrenome, $estado, $endereco, $cidade, $email,$celular]);
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
    <link rel="stylesheet" href="cadastro_cliente.css">
    <title>Página de Cadastro</title>
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
            <a href="encontrar.php"><i class="fas fa-shopping-basket"></i>Encontre sua reserva</a>
           
        </form>
    	</div>
    </nav><br><br>

    <h1>Cadastro de Clientes</h1>
    <form action="cadastro_cliente.php" method="POST">                                                                                 
        <label for="nome">Nome :</label>
        <input type="text" id="nome" name="nome" required><br><br>

        <label for="sobrenome">Sobrenome :</label>
        <input type="text" id="sobrenome" name="sobrenome" required><br>

        <label for="estado">Estado :</label>
        <input type="text" id="estado" name="estado" required><br>

        <label for="endereco">Endereço :</label>
        <input type="text" id="endereco" name="endereco" required><br>

        <label for="Cidade">Cidade :</label>
        <input type="text" id="cidade" name="cidade" required><br>

        <label for="email">Email :</label>
        <input type="email" id="email" name="email" required><br>

        <label for="celular">celular :</label>
        <input type="text" id="celular" name="celular" required><br>

        
        <button type="submit">Cadastrar</button>
        </form>
    <p><?=$msg?></p>
  </div><br><br>



  <hr class="featurette-divider">
          <div class="container">
            <div class="rodapé">
                <p>&copy; 2024 - Locadora HotWheels.</p>
              </div>

  
  <?=template_footer()?>
</body>
</html>

