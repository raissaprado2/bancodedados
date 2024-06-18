<?php
include 'functions.php';
$pdo = pdo_connect_pgsql();
$msg = '';

// Verifica se o ID do cliente existe, por exemplo, update.php?id=1 irá obter o cliente com o id 1
if (isset($_GET['id_cliente'])) {
    if (!empty($_POST)) {
        // Atualiza as informações do cliente
        $id_cliente = isset($_POST['id_cliente']) ? $_POST['id_cliente'] : NULL;
        $nome = isset($_POST['nome']) ? $_POST['nome'] : '';
        $sobrenome = isset($_POST['sobrenome']) ? $_POST['sobrenome'] : '';
        $estado = isset($_POST['estado']) ? $_POST['estado'] : '';
        $endereco = isset($_POST['endereco']) ? $_POST['endereco'] : '';
        $cidade = isset($_POST['cidade']) ? $_POST['cidade'] : '';
        $email = isset($_POST['email']) ? $_POST['email'] : '';
        $celular = isset($_POST['celular']) ? $_POST['celular'] : '';

        // Atualiza o registro
        $stmt = $pdo->prepare('UPDATE cliente SET nome = ?, sobrenome = ?, estado = ?, endereco = ?, cidade = ?, email = ?, celular = ? WHERE id_cliente = ?');
        $stmt->execute([$nome, $sobrenome, $estado, $endereco, $cidade, $email, $celular, $_GET['id_cliente']]);
        $msg = 'Atualização Realizada com Sucesso!';
    }

    // Obter o cliente da tabela cliente
    $stmt = $pdo->prepare('SELECT * FROM cliente WHERE id_cliente = ?');
    $stmt->execute([$_GET['id_cliente']]);
    $cliente = $stmt->fetch(PDO::FETCH_ASSOC);
    if (!$cliente) {
        exit('Cliente Não Localizado!');
    }
} else {
    exit('Nenhum Cliente Especificado!');
}
?>

<?=template_header('Atualizar Cliente')?>

<div class="content update">
    <h2>Atualizar Cliente - <?=$cliente['id_cliente']?></h2>
    <form action="update.php?id_cliente=<?=$cliente['id_cliente']?>" method="post">
        <label for="id_cliente">ID</label>
        <input type="text" name="id_cliente" placeholder="" value="<?=$cliente['id_cliente']?>" id="id_cliente">
        <label for="nome">Nome</label>
        <input type="text" name="nome" placeholder="Seu Nome" value="<?=$cliente['nome']?>" id="nome">
        <label for="sobrenome">Sobrenome</label>
        <input type="text" name="sobrenome" placeholder="Seu Sobrenome" value="<?=$cliente['sobrenome']?>" id="sobrenome">
        <label for="estado">Estado</label>
        <input type="text" name="estado" placeholder="Seu Estado" value="<?=$cliente['estado']?>" id="estado">
        <label for="endereco">Endereço</label>
        <input type="text" name="endereco" placeholder="Seu Endereço" value="<?=$cliente['endereco']?>" id="endereco">
        <label for="cidade">Cidade</label>
        <input type="text" name="cidade" placeholder="Sua Cidade" value="<?=$cliente['cidade']?>" id="cidade">
        <label for="email">Email</label>
        <input type="text" name="email" placeholder="seuemail@seuprovedor.com.br" value="<?=$cliente['email']?>" id="email">
        <label for="celular">Celular</label>
        <input type="text" name="celular" placeholder="(XX) X.XXXX-XXXX" value="<?=$cliente['celular']?>" id="celular">
        <input type="submit" value="Update">
    </form>
    <?php if ($msg): ?>
    <p><?=$msg?></p>
    <?php endif; ?>
</div>

<?=template_footer()?>