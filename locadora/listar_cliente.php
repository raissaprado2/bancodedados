<?php
include 'functions.php';
// Conectar ao banco de dados PostgreSQL
$pdo = pdo_connect_pgsql();
// Obter a página via solicitação GET (parâmetro URL: page), se não existir, defina a página como 1 por padrão
$page = isset($_GET['page']) && is_numeric($_GET['page']) ? (int)$_GET['page'] : 1;
// Número de registros para mostrar em cada página
$records_per_page = 10;

// Preparar a instrução SQL e obter registros da tabela contacts, LIMIT irá determinar a página
$stmt = $pdo->prepare('SELECT * FROM cliente ORDER BY id_cliente OFFSET :offset LIMIT :limit');
$stmt->bindValue(':offset', ($page - 1) * $records_per_page, PDO::PARAM_INT);
$stmt->bindValue(':limit', $records_per_page, PDO::PARAM_INT);
$stmt->execute();
// Buscar os registros para exibi-los em nosso modelo.
$contacts = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Obter o número total de cliente, isso é para determinar se deve haver um botão de próxima e anterior
$num_contacts = $pdo->query('SELECT COUNT(*) FROM cliente')->fetchColumn();
?>


<?=template_header('Visualizar clientes')?>
<link rel="stylesheet" href="css/style.css">


<div class="content read">

	<table>
        <thead>
            <tr>
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
            <?php foreach ($contacts as $contact): ?>
            <tr>
                
                <td><?=$contact['nome']?></td>
                <td><?=$contact['sobrenome']?></td>
                <td><?=$contact['estado']?></td>
                <td><?=$contact['endereco']?></td>
                <td><?=$contact['cidade']?></td>
                <td><?=$contact['email']?></td>
                <td><?=$contact['celular']?></td>
                <td class="actions">
                    <a href="update.php?id=<?=$contact['id_cliente']?>" class="edit"><i class="fas fa-pen fa-xs"></i></a>
                    <a href="delete.php?id=<?=$contact['id_cliente']?>" class="trash"><i class="fas fa-trash fa-xs"></i></a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
	<div class="pagination">
		<?php if ($page > 1): ?>
		<a href="listar_cliente.php?page=<?=$page-1?>"><i class="fas fa-angle-double-left fa-sm"></i></a>
		<?php endif; ?>
		<?php if ($page*$records_per_page < $num_contacts): ?>
		<a href="listar_cliente.php?page=<?=$page+1?>"><i class="fas fa-angle-double-right fa-sm"></i></a>
		<?php endif; ?>
	</div>
</div>

<?=template_footer()?>