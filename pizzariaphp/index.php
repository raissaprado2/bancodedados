<?php
include 'functions.php';
// Seu código PHP aqui.

// Array com os nomes das imagens
$imagens = array("imagem1.jpg", "imagem2.jpg", "imagem3.jpg");

// Página inicial abaixo.
?>

<?=template_header('Pizzaria Raissa')?>

<div class="content">
    <h2>Bem-Vindo</h2>
    <div class="gallery">
        <?php
        // Loop para exibir as imagens
        foreach ($imagens as $imagem) {
            echo '<div class="image">';
            echo '<img src="img/banner1' . $imagem . '" alt="' . $imagem . '">';
            echo '</div>';
        }
        ?>
    </div>
</div>

<?=template_footer()?>
