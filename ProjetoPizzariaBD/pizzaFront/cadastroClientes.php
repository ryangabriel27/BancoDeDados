<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pizzaria</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <nav>
        <header>
            <div class="logo">
                <img src="img/logoDouradaSemfundo.png" alt="">
            </div>
        </header>
    </nav>
    <section class="paginas">
        <div class="produtos">
            <span>PRODUTOS</span>
        </div>
        <div class="cadastro">
            <span>CADASTRO</span>
        </div>
        <div class="carrinho">
            <span>CARRINHO</span>
        </div>
    </section>
    <section class="main-cadastro">
        <div class="container-cadastro">
            <div class="img-cadastro">
                <img src="img/logoSemFundo2.png" alt="">
            </div>
            <form action="cadastro.php" method="POST">
                <label for="cNome">Digite seu nome:</label>
                <input type="text" name="cNome" id="cNome" placeholder="Digite seu nome"/><br />
                <label for="cEmail">Digite seu e-mail:</label>
                <input type="text" name="cEmail" id="cEmail" placeholder="Digite seu e-mail"/><br>
                <label for="cCpf">Digite seu CPF:</label>
                <input type="text" name="cCpf" id="cCpf" placeholder="Digite seu CPF"/><br>
                <label for="cIdade">Digite sua Idade:</label>
                <input type="text" name="cIdade" id="cIdade" placeholder="Digite sua idade"/><br>
                <label for="cEndereco">Digite seu endereço:</label>
                <input type="text" name="cEndereco" id="cEndereco" placeholder="Digite seu endereço"/><br>
                <label for="cSenha">Digite sua senha:</label>
                <input type="password" name="cSenha" id="cSenha" placeholder="Digite sua senha"/><br>
                <button type="submit" id="enviarDados">Cadastrar</button>
            </form>
        </div>
    </section>
</body>

</html>