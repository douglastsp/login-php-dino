<?php 
require "../include/db.php";

if (!$_SESSION['user_id']) {
    header('location: ../index.php');
}

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
    <title>Gerenciamento de Equipes</title>
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

<header class=>
    <h1 class="text-center text-3xl font-semibold my-4">Equipes de Dinossauros</h1>

    <?php if ($msg == "falhou") { ?>
        <h3 class="text-center font-bold text-red-700">Deu ruim!</h3>
    <?php } ?>

    <?php if ($msg == "sucesso") { ?>
        <h3 class="text-center font-bold text-green-600">Deu bom!</h3>
    <?php } ?>

</header>

<div class="flex flex-col md:flex-row justify-center">
    <table class="w-3/4 border-collapse table-fixed">
        <tr>
            <th class="border-4">ID</th>
            <th class="border-4">Nome da Equipe</th>
            <th class="border-4">Editar</th>
            <th class="border-4">Excluir</th>
        </tr>
        <?= tabela($listaEquipes) ?>
    </table>
</div>
<div class="flex justify-center">
    <button class="btn bg-gray-400 rounded-full m-2 p-2 justify-center text-bold" type="submit">
        <a href="formCadastraEquipes.php">Cadastrar Nova Equipe</a>
    </button>
    <button class="btn bg-gray-400 rounded-full m-2 p-2 justify-center text-bold" type="submit">
        <a href="home.php"">Voltar ao Início</a>
    </button>
</div>
    <script src="https://cdn.tailwindcss.com"></script>
</body>
</html>

<?php
function buscaEquipes()
{
    $sql = "SELECT * FROM equipes WHERE status = 1;";
    $result = mysqli_query($_SESSION['con'], $sql);
    if (!$result) return false;

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $r[] = $row;
        }
    } else return false;

    return $r;
}

function tabela($arrayEquipes)
{
    $html = "";
    if (!$arrayEquipes) return false;
    foreach($arrayEquipes as $equipe) {
        $id = $equipe['id'];
        $html .= "<tr>";
        $html .= "<td class='border-2 text-center'>{$equipe['id']}</td>";
        $html .= "<td class='border-2'>{$equipe['equipe']}</td>";
        $html .= "<td class='border-2 text-center'>
                    <a href='formCadastraEquipes.php?id={$id}'>Editar</a>
                  </td>";
        $html .= "<td class='border-2 text-center'>
                    <a href='../actions/deletarEquipe.php?id={$id}'>Desativar</a>
                  </td>";
        $html .= "</tr>";
    }
    return $html;
}

?>


