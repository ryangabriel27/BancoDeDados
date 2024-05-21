<?php
include '../functions.php';
$pdo = pdo_connect_pgsql();
$msg = '';
// Verifica se os dados POST não estão vazios
if (!empty($_POST)) {
    // Se os dados POST não estiverem vazios, insere um novo registro
    // Verifica se a variável POST "nome" existe, se não existir, atribui o valor padrão para vazio, basicamente o mesmo para todas as variáveis
    $forma_pagamento = isset($_POST['forma_pagamento']) ? $_POST['forma_pagamento'] : '';
    $cnh = isset($_POST['cnh']) ? $_POST['cnh'] : NULL;
    $nome_titular = isset($_POST['nome_titular']) ? $_POST['nome_titular'] : '';
    $numero_cartao = isset($_POST['numero_cartao']) ? $_POST['numero_cartao'] : '';
    // Insere um novo registro na tabela contacts
    if ($cnh != NULL) {
        try {
            $stmt = $pdo->prepare('INSERT INTO forma_pagamento (forma_pagamento, cnh, nome_titular, numero_cartao) VALUES (?, ?, ?, ?)');
            $stmt->execute([$forma_pagamento, $cnh, $nome_titular, $numero_cartao]);
        } catch (Exception $e) {
            $msg = $e;
        }

        // Mensagem de saída
        $msg = 'Forma de pagamento cadastrada com Sucesso!';
    } else {
        $msg = 'Coloque o id do cliente';
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?= template_head2("Cadastro pagamento") ?>
    <link rel="stylesheet" href="../css/styleCadastro.css">
</head>

<body>
    <?= template_header2() ?>
    <?= voltar("indexCliente.php") ?>
    <div class="content update">
        <h1 class="text-center">Cadastrar forma de pagamento</h1>
        <form action="cadastroPagamento" method="POST">
            <div class="form-group">
                <label for="cadastro">Forma de pagamento:</label>
                <label for="usuario">CNH do Cliente:</label>
            </div>
            <div class="form-group">
                <select name="forma_pagamento" id="forma_pagamento" required>
                    <option value="BOLETO">Boleto</option>
                    <option value="CARTAO DE CREDITO">Cartão de crédito</option>
                    <option value="PIX">Pix</option>
                </select>
                <input type="text" name="cnh" placeholder="CNH do cliente" id="cnh" required>
            </div>
            <div class="form-group" id="camposCartao" style="display: none;">
                <label for="nome_completo">Nome do titular:</label>
                <label for="usuario">Número:</label>
            </div>
            <div class="form-group" id="fieldCartao" style="display: none;">
                <input type="text" name="nome_titular" placeholder="Nome" id="nome_titular" required>
                <input type="text" name="numero_cartão" placeholder="Numero" id="numero_cartão" required>
            </div>
            <div class="form-group">
                <input type="submit" value="Cadastrar">
            </div>
        </form>
    </div>

    <?= template_footer() ?>
</body>
<script>
    document.getElementById("forma_pagamento").addEventListener("change", function() {
        var camposCartao = document.getElementById("camposCartao");
        var fieldCartao = document.getElementById("fieldCartao");
        if (this.value === "CARTAO DE CREDITO") {
            camposCartao.style.display = "";
            fieldCartao.style.display = "";

        } else {
            camposCartao.style.display = "none";
            fieldCartao.style.display = "none";
        }
    });
</script>

</html>