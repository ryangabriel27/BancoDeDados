<?php
include '../functions.php';
// Conectar ao banco de dados PostgreSQL
$pdo = pdo_connect_pgsql();
// Obter a página via solicitação GET (parâmetro URL: page), se não existir, defina a página como 1 por padrão
$page = isset($_GET['page']) && is_numeric($_GET['page']) ? (int)$_GET['page'] : 1;
// Número de registros para mostrar em cada página
$records_per_page = 5;

if (isset($_GET['search']) && isset($_GET['filtro'])) {
    $search = $_GET['search'];
    $filtro = $_GET['filtro'];

    // Monta a consulta SQL baseada no filtro selecionado
    $sql = "SELECT * FROM funcionarios_pizzaria WHERE $filtro LIKE ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(["%$search%"]);
    $contacts = $stmt->fetchAll(PDO::FETCH_ASSOC);
} else {
    // Consulta padrão caso não haja nenhum filtro selecionado
    $stmt = $pdo->query("SELECT * FROM funcionarios_pizzaria");
    $contacts = $stmt->fetchAll(PDO::FETCH_ASSOC);
}
// Obter o número total de funcionarios_pizzaria, isso é para determinar se deve haver um botão de próxima e anterior
$num_contacts = $pdo->query('SELECT COUNT(*) FROM funcionarios_pizzaria')->fetchColumn();

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
    <form method="GET" action="readFuncionarios.php">
        <input type="text" name="search" id="search" placeholder="Pesquisar" />
        <select name="filtro">
            <option value="nomefun">Nome</option>
            <option value="cpffun">Cpf</option>
            <option value="cargofun">Cargo</option>
        </select>
        <button type="submit" class="create-contact"><span><i class="fa-solid fa-magnifying-glass"></i>Buscar</span></button>
    </form>
    <table>
        <thead>
            <tr>
                <td>#</td>
                <td>Nome</td>
                <td>Cpf</td>
                <td>Cargo</td>
                <td>Salario</td>
                <td></td>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($contacts as $contact) : ?>
                <tr>
                    <td><?= $contact['idfun'] ?></td>
                    <td><?= $contact['nomefun'] ?></td>
                    <td><?= $contact['cpffun'] ?></td>
                    <td><?= $contact['cargofun'] ?></td>
                    <td><?= $contact['salariofun'] ?></td>
                    <td class="actions">
                        <a href="updateFuncionarios.php?idfun=<?= $contact['idfun'] ?>" class="edit"><i class="fas fa-pen fa-xs"></i></a>
                        <a href="deleteFuncionarios.php?idfun=<?= $contact['idfun'] ?>" class="trash"><i class="fas fa-trash fa-xs"></i></a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="pagination">
        <?php if ($page > 1) : ?>
            <a href="readFuncionarios.php?page=<?= $page - 1 ?>"><i class="fas fa-angle-double-left fa-sm"></i></a>
        <?php endif; ?>
        <?php if ($page * $records_per_page < $num_contacts) : ?>
            <a href="readFuncionarios.php?page=<?= $page + 1 ?>"><i class="fas fa-angle-double-right fa-sm"></i></a>
        <?php endif; ?>
    </div>
</div>
</body>
</html>