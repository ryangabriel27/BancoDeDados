<?php
    include '../functions.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?=template_head2("Registro de Aluguel")?>
    <link rel="stylesheet" href="../css/styleIndex.css">
</head>
<body>
    <?=template_header2()?>
    <div class="abas">
        <a href="cadastroAluga.php">
        <div class="card-aba">
            <h3>Cadastrar</h3>
        </div>
        </a>
        <a href="readAluga.php">
        <div class="card-aba">
            <h3>Listar</h3>
        </div>
        </a>
        <a href="searchAluga.php">
        <div class="card-aba">
            <h3>Pesquisar</h3>
        </div>
        </a>
    </div>
    <?=template_footer()?>
</body>
</html>