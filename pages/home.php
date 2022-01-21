<?php 
require "../include/db.php";

if (!$_SESSION['user_id']) {
    header('location: ../index.php');
}

$listaUsuarios = buscaUsuarios();
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

    <?php if ($msg == "falhou") { ?>
        <h3 class="text-center">Deu ruim!</h3>
    <?php } ?>

    <?php if ($msg == "sucesso") { ?>
        <h3 class="text-center">Deu bom!</h3>
    <?php } ?>

</header>

<div class="flex flex-col md:flex-row justify-center">
    <table class="w-3/4 border-collapse table-fixed">
        <tr>
            <th class="border-4">ID</th>
            <th class="border-4">Nome</th>
            <th class="border-4">E-mail</th>
            <th class="border-4">Status</th>
            <th class="border-4">Editar</th>
            <th class="border-4">Excluir</th>
        </tr>
        <?= tabela($listaUsuarios) ?>
    </table>
</div>
    
    <script src="https://cdn.tailwindcss.com"></script>
</body>
</html>

<?php
function buscaUsuarios()
{
    $sql = "SELECT * FROM usuarios WHERE id <> 1 AND status = 1;";
    $result = mysqli_query($_SESSION['con'], $sql);

    if (!$result) return false;

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $r[] = $row;
        }
    } else return false;

    return $r;
}

function tabela($arrayUsuarios)
{
    $html = "";
    if (!$arrayUsuarios) return false;
    foreach($arrayUsuarios as $usuario) {
        $id = $usuario['id'];
        $html .= "<tr>";
        $html .= "<td class='border-2 text-center'>{$usuario['id']}</td>";
        $html .= "<td class='border-2'>{$usuario['name']}</td>";
        $html .= "<td class='border-2'>{$usuario['email']}</td>";
        $html .= "<td class='border-2 text-center'>{$usuario['status']}</td>";
        $html .= "<td class='border-2 text-center'><a href='formCadastra.php?id={$id}'>Editar</a></td>";
        $html .= "<td class='border-2 text-center'><a href='../actions/deletarUsuario.php?id={$id}'>Deletar</a></td>";
        $html .= "</tr>";
    }
    return $html;
}

?>


