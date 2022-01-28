<?php
require "../include/db.php";
require "../include/funcoesForm.php";

if (!$_SESSION['user_id']) {
    header('location: ../index.php');
}

$idRecebido = $_GET['id'] ?? '';
$usuarioRecebido = checkUsuario($idRecebido);
$equipeRecebida = checkEquipe($idRecebido);
$listaEquipes = buscaEquipes();

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
    <title>Cadastrar Usuário</title>
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
            Gestão de Dinossauros
        </h1>
    </header>

    <div class="text-center mb-4">
        <form action="../actions/cadastrarUsuario.php" method="post">
            <input type="hidden" name="inputId" value="<?= $usuarioRecebido['id'] ?? ''?>">
            <label for="inputNome" class="font-semibold">Nome do Usuário:</label>
            <br>
            <input type="text" id="inputNome" name="inputNome" placeholder="Nome" class="text-center border rounded
             p-1 w-2/5 mt-1 focus:ring-indigo-500 focus:border-indigo-500 shadow-sm sm:text-sm border-gray-300 rounded-md" required value="<?= $usuarioRecebido['name'] ?? '' ?>">
            <br>
            <label for="inputEmail" class="font-semibold">E-mail do Usuário:</label>
            <br>
            <input type="email" id="inputEmail" name="inputEmail" placeholder="Email" class="text-center border rounded
             p-1 w-2/5 mt-1 focus:ring-indigo-500 focus:border-indigo-500 shadow-sm sm:text-sm border-gray-300 rounded-md" required value="<?= $usuarioRecebido['email'] ?? '' ?>">
            <br>
            <label for="inputEquipe" class="font-semibold">Equipe do Usuário:</label>
            <br>
            <select name="inputEquipe" id="inputEquipe" class="border-solid border rounded w-1/5 p-0.5
            text-center bg-white border border-gray-300 rounded-md shadow-sm py-1 cursor-default focus:outline-none
            focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
                <option value="">Escolha</option>
                <?= montaListaEquipes($listaEquipes, $equipeRecebida) ?>
            </select>
            <br>
            <button class="ml-2 mt-6 items-center justify-center px-8 py-3 border border-transparent text-base
            font-medium rounded-md text-white bg-lime-700 hover:bg-lime-500 md:py-4 md:text-lg md:px-10" type="submit">Confirmar</button>
            <button>
                <a href="home.php" class="ml-2 mt-6 items-center justify-center px-8 py-3 border border-transparent
                text-base font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 md:py-4 md:text-lg md:px-10" type="submit">
                    Voltar
                </a>
            </button>
        </form>
    </div>

    <script src="https://cdn.tailwindcss.com"></script>

</body>
</html>