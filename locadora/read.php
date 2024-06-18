<?php
include 'functions.php';
// Conectar ao banco de dados PostgreSQL
$pdo = pdo_connect_pgsql();
// Obter a página via solicitação GET (parâmetro URL: page), se não existir, defina a página como 1 por padrão
$page = isset($_GET['page']) && is_numeric($_GET['page']) ? (int)$_GET['page'] : 1;
// Número de registros para mostrar em cada página
$records_per_page = 5;

// Preparar a instrução SQL e obter registros da tabela cliente, LIMIT irá determinar a página
$stmt = $pdo->prepare('SELECT * FROM cliente ORDER BY id_cliente OFFSET :offset LIMIT :limit');
$stmt->bindValue(':offset', ($page - 1) * $records_per_page, PDO::PARAM_INT);
$stmt->bindValue(':limit', $records_per_page, PDO::PARAM_INT);
$stmt->execute();
// Buscar os registros para exibi-los em nosso modelo.
$clients = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Obter o número total de clientes, isso é para determinar se deve haver um botão de próxima e anterior
$num_clients = $pdo->query('SELECT COUNT(*) FROM cliente')->fetchColumn();
?>


<?=template_header('Visualizar Cadastros')?>

<div class="content read">
    <h2>Visualizar Cadastros</h2>
    <a href="reservar.php" class="create-contact">Realizar Cadastro</a>
    <table>
        <thead>
            <tr>
                <td>#</td>
                <td>Nome</td>
                <td>Sobrenome</td>
                <td>Estado</td>
                <td>Endereço</td>
                <td>Cidade</td>
                <td>Email</td>
                <td>Celular</td>
                <td></td>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($clients as $client): ?>
            <tr>
                <td><?=$client['id_cliente']?></td>
                <td><?=$client['nome']?></td>
                <td><?=$client['sobrenome']?></td>
                <td><?=$client['estado']?></td>
                <td><?=$client['endereco']?></td>
                <td><?=$client['cidade']?></td>
                <td><?=$client['email']?></td>
                <td><?=$client['celular']?></td>
                <td class="actions">
                    <a href="update.php?id=<?=$client['id_cliente']?>" class="edit"><i class="fas fa-pen fa-xs"></i></a>
                    <a href="delete.php?id=<?=$client['id_cliente']?>" class="trash"><i class="fas fa-trash fa-xs"></i></a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="pagination">
        <?php if ($page > 1): ?>
        <a href="read.php?page=<?=$page-1?>"><i class="fas fa-angle-double-left fa-sm"></i></a>
        <?php endif; ?>
        <?php if ($page*$records_per_page < $num_clients): ?>
        <a href="read.php?page=<?=$page+1?>"><i class="fas fa-angle-double-right fa-sm"></i></a>
        <?php endif; ?>
    </div>
</div>

<?=template_footer()?>