<!-- SELECT carros.* 
FROM carros
LEFT JOIN aluga ON aluga.id_carro = carros.id_carro
WHERE aluga.id_carro IS NULL;
 -->

<?php
include '../functions.php';

// Conectar ao banco de dados PostgreSQL
$pdo = pdo_connect_pgsql();
// Obter a página via solicitação GET (parâmetro URL: page), se não existir, defina a página como 1 por padrão
$page = isset($_GET['page']) && is_numeric($_GET['page']) ? (int)$_GET['page'] : 1;
// Número de registros para mostrar em cada página
$records_per_page = 8;

// Preparar a instrução SQL e obter registros da tabela contacts, LIMIT irá determinar a página
$stmt = $pdo->prepare('SELECT carros.marca,carros.modelo, carros.ano, carros.placa, carros.cor, carros.num_agencia 
                        FROM carros
                        LEFT JOIN aluga ON aluga.id_carro = carros.id_carro
                        WHERE aluga.id_carro IS NULL OFFSET :offset LIMIT :limit');
$stmt->bindValue(':offset', ($page - 1) * $records_per_page, PDO::PARAM_INT);
$stmt->bindValue(':limit', $records_per_page, PDO::PARAM_INT);
$stmt->execute();
// Buscar os registros para exibi-los em nosso modelo.
$contacts = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Obter o número total de contatos, isso é para determinar se deve haver um botão de próxima e anterior
$num_contacts = $pdo->query('SELECT COUNT(*) FROM carros LEFT JOIN aluga ON aluga.id_carro = carros.id_carro
WHERE aluga.id_carro IS NULL ')->fetchColumn();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?= template_head2("Carros nunca alugados") ?>
    <link rel="stylesheet" href="../css/styleCadastro.css">
    <link rel="stylesheet" href="../css/styleRead.css">
</head>

<body>
    <?= template_header2() ?>
    <?= voltar("indexDash.php") ?>
    <div class="content read">
        <table>
            <thead>
                <tr>
                    <td>Placa</td>
                    <td>Marca</td>
                    <td>Modelo</td>
                    <td>Ano</td>
                    <td>Cor</td>
                    <td>N° agência</td>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($contacts as $contact) : ?>
                    <tr>
                        <td><?= $contact['placa'] ?></td>
                        <td><?= $contact['marca'] ?></td>
                        <td><?= $contact['modelo'] ?></td>
                        <td><?= $contact['ano'] ?></td>
                        <td><?= $contact['cor'] ?></td>
                        <td><?= $contact['num_agencia'] ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <div class="pagination">
            <?php if ($page > 1) : ?>
                <a href="carrosDash.php?page=<?= $page - 1 ?>"><i class="fas fa-angle-double-left fa-sm"></i></a>
            <?php endif; ?>
            <?php if ($page * $records_per_page < $num_contacts) : ?>
                <a href="carrosDash.php?page=<?= $page + 1 ?>"><i class="fas fa-angle-double-right fa-sm"></i></a>
            <?php endif; ?>
        </div>
    </div>

    <?= template_footer() ?>
</body>

</html>