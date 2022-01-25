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
        <h1 class="text-center text-3xl font-semibold my-4">Gestão de Dinossauros</h1>
    </header>

    <div class="text-center mb-4">
        <form action="../actions/cadastrarUsuario.php" method="post">
            <input type="hidden" name="inputId" value="<?= $usuarioRecebido['id'] ?? ''?>">
            <label for="inputNome">Nome do Usuário:</label>
            <br>
            <input type="text" id="inputNome" name="inputNome" placeholder="Nome" class="text-center border rounded
             p-1 w-2/5" required value="<?= $usuarioRecebido['name'] ?? '' ?>">
            <br>
            <label for="inputEmail">E-mail do Usuário:</label>
            <br>
            <input type="email" id="inputEmail" name="inputEmail" placeholder="Email" class="text-center border
            rounded p-1 w-2/5" required value="<?= $usuarioRecebido['email'] ?? '' ?>">
            <br>
            <label for="inputEquipe">Equipe do Usuário:</label>
            <br>
            <select name="inputEquipe" id="inputEquipe" class="border-solid border rounded w-1/5 p-0.5
            text-center" required>
                <option value="">Escolha</option>
                <?= montaListaEquipes($listaEquipes, $equipeRecebida) ?>
            </select>
            <br>
            <button class="btn bg-green-400 rounded-full m-2 p-2" type="submit">Confirmar</button>
            <button class="btn bg-gray-400 rounded-full m-2 p-2 justify-center text-bold" type="submit">
                <a href="home.php"">Voltar</a>
            </button>
        </form>
    </div>

    <script src="https://cdn.tailwindcss.com"></script>

</body>
</html>