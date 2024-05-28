<?php
    include '../functions.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?=template_head2("Clientes")?>
    <link rel="stylesheet" href="../css/styleIndex.css">
</head>
<body>
    <?=template_header2()?>
    <div class="abas">
        <a href="cadastroCliente.php">
        <div class="card-aba">
            <h3>Cadastrar</h3>
        </div>
        </a>
        <a href="readClientes.php">
        <div class="card-aba">
            <h3>Listar</h3>
        </div>
        </a>
        <a href="searchCliente.php">
        <div class="card-aba">
            <h3>Pesquisar</h3>
        </div>
        </a>
    </div>
    <?=template_footer()?>
</body>
</html>