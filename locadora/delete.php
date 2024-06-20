<?php
include 'functions.php';
$pdo = pdo_connect_pgsql();
$msg = '';
// Verifica se o ID do contato existe
if (isset($_GET['id_cliente'])) {
    // Seleciona o registro que será deletado
    $stmt = $pdo->prepare('SELECT * FROM cliente WHERE id_cliente = ?');
    $stmt->execute([$_GET['id_cliente']]);
    $contact = $stmt->fetch(PDO::FETCH_ASSOC);
    if (!$contact) {
        exit('Carro Não Localizado!');
    }
    // Certifique-se de que o usuário confirma antes da exclusão
    if (isset($_GET['confirm'])) {
        if ($_GET['confirm'] == 'yes') {
//             // Antes de excluir o cliente, exclua todas as locações associadas a ele
// $stmt = $pdo->prepare('DELETE FROM locacao WHERE id = ?');
// $stmt->execute([$_GET['id']]);

            // O usuário clicou no botão "Sim", deleta o registro
            $stmt = $pdo->prepare('DELETE FROM cliente WHERE id_cliente = ?');
            $stmt->execute([$_GET['id_cliente']]);
            $msg = 'Cliente Apagado com Sucesso!';
        } else {
            // O usuário clicou no botão "Não", redireciona de volta para a página de leitura
            header('Location: listar_cliente.php');
            exit;
        }
    }
} else {
    exit('Nenhum veiculo especificado!');
}
?>


<?=template_header('Apagar Cliente')?>
<link rel="stylesheet" href="css/style.css">

<div class="content delete">
    <h2>Apagar Cliente----  <?=$contact['nome']?></h2>
    <?php if ($msg): ?>
    <p><?=$msg?></p>
    <?php else: ?>
    <p>Você tem certeza que deseja apagar o cliente #<?=$contact['nome']?>?</p>
    <div class="yesno">
        <a href="delete.php?id=<?=$contact['id_cliente' ]?>&confirm=yes">Sim</a>
        <a href="delete.php?id=<?=$contact['id_cliente']?>&confirm=no">Não</a>
    </div>
    <?php endif; ?>
</div>

<?=template_footer()?>