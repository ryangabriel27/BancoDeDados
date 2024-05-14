<?php
function pdo_connect_pgsql()
{
    $DATABASE_HOST = 'localhost';
    $DATABASE_PORT = '5432';
    $DATABASE_USER = 'postgres';
    $DATABASE_PASS = 'postgres';
    $DATABASE_NAME = 'turmabtarde';
    try {
        $pdo = new PDO('pgsql:host=' . $DATABASE_HOST . ';port=' . $DATABASE_PORT . ';dbname=' . $DATABASE_NAME . ';user=' . $DATABASE_USER . ';password=' . $DATABASE_PASS);
        // Define o modo de erro para Exception para que os erros sejam lançados e possam ser capturados.
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    } catch (PDOException $exception) {
        // Log do erro ou exibição de mensagem mais detalhada.
        $errorDetails = 'Error details: ' . $exception->getMessage() . ' Code: ' . $exception->getCode();
        error_log('Failed to connect to database: ' . $errorDetails);
        exit('Failed to connect to database. Check error log for details. Debug: ' . $errorDetails);
    }
}

function template_head($title)
{
    echo <<<EOT
		<meta charset="utf-8">
		<title>$title</title>
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <link href="css/style.css" rel="stylesheet" type="text/css">
EOT;
}
function template_head2($title)
{
    echo <<<EOT
		<meta charset="utf-8">
		<title>$title</title>
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <link href="../css/style.css" rel="stylesheet" type="text/css">
EOT;
}

function template_header()
{
    echo <<<EOT
    <header>
    <nav class="title">
        <img src="img/logo.png" alt="logo">
        <h1>DriveNation</h1>
    </nav>
    <nav class="border">
    <span>  </span>
    </nav>
    </header>
EOT;
}
function template_header2()
{
    echo <<<EOT
    <header>
    <nav class="title">
        <img src="../img/logo.png" alt="logo">
        <h1>DriveNation</h1>
    </nav>
    <nav class="border">
    <span>  </span>
    </nav>
    </header>
EOT;
}

function template_footer()
{
    echo <<<EOT
    <footer>
        <nav class="border">
            <span> </span>
        </nav>
        <p class="text-center">© 2024 DriveNation, Brasil</p>
        </footer>
    EOT;
}
