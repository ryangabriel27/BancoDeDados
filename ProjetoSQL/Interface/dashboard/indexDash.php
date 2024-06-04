<?php
    include '../functions.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?=template_head2("Dashboard")?>
    <link rel="stylesheet" href="../css/styleIndex.css">
</head>
<body>
    <?=template_header2()?>
    <div class="abas">
        <a href="clientesDash.php">
        <div class="card-aba">
            <h3>Clientes mais fiéis</h3>
        </div>
        </a>
        <a href="receitaDash.php">
        <div class="card-aba">
            <h3>Receita total</h3>
        </div>
        </a>
        <a href="carrosDash.php">
        <div class="card-aba">
            <h3>Carros nunca alugados</h3>
        </div>
        </a>
        <a href="manutencaoDash.php">
        <div class="card-aba">
            <h3>Registro de manutencao</h3>
        </div>
        </a>
        </a>
        <a href="clienteAlugaDash.php">
        <div class="card-aba">
            <h3>Clientes que alugaram mais de 1 carro</h3>
        </div>
        </a>
    </div>
    <?=template_footer()?>
</body>
</html>