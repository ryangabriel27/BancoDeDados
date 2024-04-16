<?php
include '../functions.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Clientes</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/styleP.css">
</head>

<body>
    <?= header2() ?>
    <section class="main-cadastro">
            <div class="content update">
                <form action="cadastro.php" method="POST">
                    <label for="cNome">Nome:</label>
                    <label for="cEmail">E-mail:</label>
                    <input type="text" name="cNome" id="cNome" placeholder="Digite seu nome" /><br />
                    <input type="text" name="cEmail" id="cEmail" placeholder="Digite seu e-mail" /><br>
                    <label for="cCpf">CPF:</label>
                    <label for="cIdade">Idade:</label>
                    <input type="text" name="cCpf" id="cCpf" placeholder="Digite seu CPF" /><br>
                    <input type="text" name="cIdade" id="cIdade" placeholder="Digite sua idade" /><br>
                    <label for="cEndereco">Endereço:</label>
                    <label for="cSenha">Senha:</label>
                    <input type="text" name="cEndereco" id="cEndereco" placeholder="Digite seu endereço" /><br>
                    <input type="password" name="cSenha" id="cSenha" placeholder="Digite sua senha" /><br>
                    <input type="submit" id="enviarDados"></input>
                    <a href="searchClientes.php" class="search-contact">Ver clientes</a>
                </form>
            </div>
    </section>
</body>

</html>