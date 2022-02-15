<?php 
require "../include/db.php";
require "../include/funcoesUsuario.php";
require "../include/funcoesEquipe.php";

if (!$_SESSION['user_id']) {
    header('location: ../index.php');
}

$listaUsuarios = buscaUsuarios();
$listaEquipes = buscaEquipes();

$msg = $_GET['msg'] ?? '';

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;500;700&display=swap" rel="stylesheet">
    <title>Home</title>
</head>
<body>
<!--<nav class="bg-slate-900 text-white">-->
<!--    <div class="py-2 px-4 flex justify-between">-->
<!--        <div>-->
<!--            <p>Olá --><?//= $_SESSION['user_name'] ?><!--</p>-->
<!--        </div>-->
<!--        <div>-->
<!--            <a href="../include/logout.php">Logout</a>-->
<!--        </div>-->
<!--    </div>-->
<!--</nav>-->

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

    <?php if ($msg == "falhou") { ?>
        <h3 class="text-center font-bold text-red-700">Deu ruim!</h3>
    <?php } ?>

    <?php if ($msg == "sucesso") { ?>
        <h3 class="text-center font-bold text-green-600">Deu bom!</h3>
    <?php } ?>

</header>

<div class="flex flex-col">
    <div class="flex justify-center -my-2 overflow-x-auto">
        <div class="m-4 py-2 align-middle inline-block w-11/12 sm:px-6 lg:px-8">
            <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                ID
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Nome
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                E-mail
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Equipe
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Status
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Editar
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Excluir
                            </th>
                    </thead>
                    </tr>
                    <tbody class="bg-white divide-y divide-gray-200">
                        <?= tabela($listaUsuarios) ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<div class="flex justify-center">
    <button type="submit">
        <a href="formCadastra.php" class="mt-6 flex items-center justify-center px-8 py-3 border border-transparent
        text-base font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 md:py-4 md:text-lg md:px-10" >
            Cadastrar Novo Usuário
        </a>
    </button>
    <button type="submit">
        <a href="equipes.php" class="ml-2 mt-6 flex items-center justify-center px-8 py-3 border border-transparent text-base font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 md:py-4 md:text-lg md:px-10" >
            Gerenciar Equipes
        </a>
    </button>
</div>
<?php
include "../include/lib_js.php";
?>
</body>
</html>

