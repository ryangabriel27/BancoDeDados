<?php
    include '../functions.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?=template_head2("Funcionarios")?>
    <link rel="stylesheet" href="../css/styleIndex.css">
</head>
<body>
    <?=template_header2()?>
    <div class="abas">
        <a href="createFuncionario.php">
        <div class="card-aba">
            <h3>Cadastrar</h3>
        </div>
        </a>
        <a href="readFuncionario.php">
        <div class="card-aba">
            <h3>Listar</h3>
        </div>
        </a>
    </div>
    <?=template_footer()?>
</body>
</html>