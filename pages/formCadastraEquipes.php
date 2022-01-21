<?php
require "../include/db.php";

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

    <nav class="bg-slate-900 text-white">
        <div class="py-2 px-4 flex justify-between">
            <div>
                <p>Olá <?= $_SESSION['user_name'] ?></p>
            </div>
            <div>
                <a href="../include/logout.php">Logout</a>
            </div>
        </div>
    </nav>

    <header>
        <h1 class="text-center text-3xl font-semibold my-4">Equipes de Dinossauros</h1>
    </header>

    <div class="text-center mb-4">
        <form action="../actions/cadastrarEquipe.php" method="post">
            <input type="hidden" name="inputId" value="<?= $equipeRecebida['id'] ?? ''?>">
            <label for="inputNome">Nome da Equipe:</label>
            <br>
            <input type="text" id="inputEquipe" name="inputEquipe" placeholder="Nome" class="text-center border rounded
             p-1 w-2/5" required value="<?= $equipeRecebida['equipe'] ?? '' ?>">
            <br>
            <button class="btn bg-green-400 rounded-full m-2 p-2" type="submit">Confirmar</button>
            <button class="btn bg-gray-400 rounded-full m-2 p-2 justify-center text-bold" type="submit">
                <a href="equipes.php"">Voltar</a>
            </button>
        </form>
    </div>

    <script src="https://cdn.tailwindcss.com"></script>

</body>
</html>

<?php

function checkEquipe($idRecebido)
{
    if (!$idRecebido) return false;

    $sql = "SELECT * FROM `equipes` WHERE id = {$idRecebido} LIMIT 1;";
    $result = mysqli_query($_SESSION['con'], $sql);
    if (!$result) return false;
    $userSql = mysqli_fetch_assoc($result);
    if (!$userSql) return false;
    return $userSql;
}

?>