<?php
include '../functions.php';

// Conectar ao banco de dados PostgreSQL
$pdo = pdo_connect_pgsql();
// Obter a página via solicitação GET (parâmetro URL: page), se não existir, defina a página como 1 por padrão
$page = isset($_GET['page']) && is_numeric($_GET['page']) ? (int)$_GET['page'] : 1;
// Número de registros para mostrar em cada página
$records_per_page = 8;

// Preparar a instrução SQL e obter registros da tabela contacts, LIMIT irá determinar a página
$stmt = $pdo->prepare('SELECT SUM(valor_total) AS receita_total FROM aluga OFFSET :offset LIMIT :limit');
$stmt->bindValue(':offset', ($page - 1) * $records_per_page, PDO::PARAM_INT);
$stmt->bindValue(':limit', $records_per_page, PDO::PARAM_INT);
$stmt->execute();
// Buscar os registros para exibi-los em nosso modelo.
$receita = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?= template_head2("Dashboard") ?>
    <link rel="stylesheet" href="../css/styleIndex.css">
</head>

<body>
    <?= template_header2() ?>
    <div class="receita">
            <h3 class="archivo-black-regular">Receita total da locadora</h3>
            <?php foreach ($receita as $row) : ?>
                <h1 class="money archivo-black-regular">R$ <?= $row['receita_total'] ?></h1>
            <?php endforeach; ?>
        </div>
    </div>
    <div class="abas">
        <a href="clientesDash.php">
            <div class="card-aba">
                <h3>Clientes mais fiéis</h3>
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
    <?= template_footer() ?>
</body>

</html>