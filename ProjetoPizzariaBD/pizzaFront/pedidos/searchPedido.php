<?php
include '../functions.php';
// Conectar ao banco de dados PostgreSQL
$pdo = pdo_connect_pgsql();
// Obter a página via solicitação GET (parâmetro URL: page), se não existir, defina a página como 1 por padrão
$page = isset($_GET['page']) && is_numeric($_GET['page']) ? (int)$_GET['page'] : 1;
// Número de registros para mostrar em cada página
$records_per_page = 5;

// Verifica se foi submetido um formulário de pesquisa
if (isset($_GET['search']) && isset($_GET['filtro'])) {
    $search = $_GET['search'];
    $filtro = $_GET['filtro'];

    // Monta a consulta SQL baseada no filtro selecionado
    $sql = "SELECT * FROM pedidos_pizzaria WHERE $filtro LIKE ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(["%$search%"]);
    $contacts = $stmt->fetchAll(PDO::FETCH_ASSOC);
} else {
    // Consulta padrão caso não haja nenhum filtro selecionado
    $stmt = $pdo->query("SELECT * FROM pedidos_pizzaria");
    $contacts = $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// Obter o número total de contatos, isso é para determinar se deve haver um botão de próxima e anterior
$num_contacts = $pdo->query('SELECT COUNT(*) FROM pedidos_pizzaria')->fetchColumn();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
    <link rel="stylesheet" href="../css/styleP.css">
</head>
<body>

<?= header2() ?>
<div class="content read">
    <form method="GET" action="searchPedido.php">
        <input type="text" name="search" id="search" placeholder="Pesquisar" />
        <select name="filtro">
            <option value="cpf_cliente">Cpf</option>
            <option value="pizza">Pizza</option>
            <option value="status_pedido">Status</option>
        </select>
        <button type="submit" class="create-contact"><span><i class="fa-solid fa-magnifying-glass"></i>Buscar</span></button>
    </form>
    <table>
        <thead>
            <tr>
                <td>#</td>
                <td>Cliente</td>
                <td>Atendido por</td>
                <td>Pizza</td>
                <td>Tamanho pizza</td>
                <td>Data do Pedido</td>
                <td>Status do Pedido</td>
                <td></td>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($contacts as $contact) : ?>
                <tr>
                    <td><?= $contact['id_pedido'] ?></td>
                    <td><?= $contact['cpf_cliente'] ?></td>
                    <td><?= $contact['codfun'] ?></td>
                    <td><?= $contact['pizza'] ?></td>
                    <td><?= $contact['tamanho_pizza'] ?></td>
                    <td><?= $contact['cadastro'] ?></td>
                    <td><?= $contact['status_pedido'] ?></td>
                    <td class="actions">
                        <a href="updatePedido.php?id_pedido=<?= $contact['id_pedido'] ?>" class="edit"><i class="fas fa-pen fa-xs"></i></a>
                        <a href="deletePedido.php?id_pedido=<?= $contact['id_pedido'] ?>" class="trash"><i class="fas fa-trash fa-xs"></i></a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="pagination">
        <?php if ($page > 1) : ?>
            <a href="searchPedido.php?page=<?= $page - 1 ?>"><i class="fas fa-angle-double-left fa-sm"></i></a>
        <?php endif; ?>
        <?php if ($page * $records_per_page < $num_contacts) : ?>
            <a href="searchPedido.php?page=<?= $page + 1 ?>"><i class="fas fa-angle-double-right fa-sm"></i></a>
        <?php endif; ?>
    </div>
</div>
</body>
</html>
