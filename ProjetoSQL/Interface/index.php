<?php
include 'functions.php';
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <?= template_head("DriveNation") ?>
    <link rel="stylesheet" href="css/styleIndex.css">
</head>

<body>
    <?= template_header() ?>
    <div class="abas">
        <a href="">
            <div class="card-aba">
                <h3>Funcionarios</h3>
            </div>
        </a>

        <a href="carros/indexCarros.php">
            <div class="card-aba">
                <h3>Carros</h3>
            </div>
        </a>
        <a href="clientes/indexCliente.php">
            <div class="card-aba">
                <h3>Clientes</h3>
            </div>
        </a>
        <a href="dashboard/indexDash.php">
            <div class="card-aba">
                <h3>Dashboard</h3>
            </div>
        </a>
        <a href="aluga/indexAluga.php">
            <div class="card-aba">
                <h3>Reg. de Aluguel</h3>
            </div>
        </a>
    </div>
    
    <?=template_footer()?>
</body>

</html>