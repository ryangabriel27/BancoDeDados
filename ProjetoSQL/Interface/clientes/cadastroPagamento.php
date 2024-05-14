<?php
    include '../functions.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?=template_head2("Cadastro pagamento")?>
    <link rel="stylesheet" href="../css/styleCadastro.css">
</head>
<body>
    <?=template_header2()?>
    <div class="content update">
        <h1 class="text-center">Cadastrar forma de pagamento</h1>
        <form action="cadastro-aluno" method="POST">
            <div class="form-group">
                <label for="cadastro">Forma de pagamento:</label>
                <label for="usuario">Valor:</label>
            </div>
            <div class="form-group">
            <select name="forma_pagamento" id="forma_pagamento" required>
                    <option value="BOLETO">Boleto</option>
                    <option value="CARTAO DE CREDITO">Cartão de crédito</option>
                    <option value="DEBITO EM CONTA">Débito em conta</option>
                    <option value="CHEQUE">Cheque</option>
                    <option value="PIX">Pix</option>
                </select>
                <input type="text" name="valor" placeholder="valor" id="valor" required>
            </div>
            <div class="form-group">
                <label for="nome_completo">CNH:</label>
                <label for="usuario">Telefone:</label>
            </div>
            <div class="form-group">
                <input type="text" name="cnh" placeholder="cnh" id="cnh" required>
                <input type="password" name="telefone" placeholder="telefone" id="telefone" required>
            </div>
            <div class="form-group">
                <label for="cidade">Cidade:</label>
                <label for="cel">Estado:</label>
            </div>
            <div class="form-group">
                <input type="text" name="cidade" placeholder="cidade" id="cidade" required>
                <input type="text" name="estado" placeholder="estado" id="estado" required>
            </div>
            <div class="form-group">
                <label for="cadastro">Endereço:</label>
                <label for="cadastro">Id. Pagamento:</label>
            </div>
            <div class="form-group">
                <input type="text" name="endereco" id="endereco" placeholder="endereco">
                <input type="text" name="id_pagamento" id="id_pagamento" placeholder="Id pagamento">
            </div>
            <div class="form-group">
                <input type="submit" value="Cadastrar">
                <a href="cadastroPagamento.php">
                    <p>Cadastrar pagamento</p>
                </a>
            </div>
        </form>
    </div>

    <?=template_footer()?>
</body>
</html>