<?php
require "../include/db.php";
require "../include/funcoesEquipe.php";

if (!$_SESSION['user_id']) {
    header('location: ../index.php');
}

$idRecebido = $_GET['id'] ?? '';
$equipeRecebida = checkEquipe($idRecebido);

?>

<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;500;700&display=swap" rel="stylesheet">
    <title>Cadastrar Equipes</title>
</head>
<body>

<nav class="bg-black drop-shadow">
    <div class="flex justify-between">
        <div>
            <h2 class="m-4 text-2xl font-bold leading-7 text-white sm:text-3xl sm:truncate">
                Olá <?= $_SESSION['user_name'] ?>
            </h2>
        </div>
        <div>
            <a href="../include/logout.php" class="m-4 inline-flex items-center px-4 py-2 border border-transparent
            rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                Logout
            </a>
        </div>
    </div>
</nav>

    <header>
        <h1 class="text-center m-2 text-2xl font-bold leading-7 text-indigo-600 sm:text-3xl sm:truncate">
            Equipes de Dinossauros
        </h1>
    </header>

    <div class="text-center mb-4">
        <form action="../actions/cadastrarEquipe.php" method="post">
            <input type="hidden" name="inputId" value="<?= $equipeRecebida['id'] ?? ''?>">
            <label for="inputNome" class="font-semibold">Nome da Equipe:</label>
            <br>
            <input type="text" id="inputEquipe" name="inputEquipe" placeholder="Nome" class="text-center border rounded
             p-1 w-2/5 mt-1 focus:ring-indigo-500 focus:border-indigo-500 shadow-sm sm:text-sm border-gray-300 rounded-md" required value="<?= $equipeRecebida['equipe'] ?? '' ?>">
            <br>
            <button class="ml-2 mt-6 items-center justify-center px-8 py-3 border border-transparent text-base
            font-medium rounded-md text-white bg-lime-700 hover:bg-lime-500 md:py-4 md:text-lg md:px-10" type="submit">Confirmar</button>
            <button>
                <a href="equipes.php" class="ml-2 mt-6 items-center justify-center px-8 py-3 border border-transparent text-base font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 md:py-4 md:text-lg md:px-10" type="submit">
                    Voltar
                </a>
            </button>
        </form>
    </div>

    <script src="https://cdn.tailwindcss.com"></script>

</body>
</html>