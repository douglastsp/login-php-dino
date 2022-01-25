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

function buscaEquipeDeUsuario($idUsuario)
{
    $sql = "SELECT `id_equipe` FROM `equipe_usuario` WHERE `id_user` = '$idUsuario' AND `status` = '1';";
    $result = mysqli_query($_SESSION['con'], $sql);
    if (!$result) return false;
    $rEquipe = mysqli_fetch_assoc($result);
    return $rEquipe;
}

function buscaNomeEquipe($idEquipeRecebido)
{
    $sql = "SELECT `equipe` FROM `equipes` WHERE `id` = {$idEquipeRecebido} LIMIT 1;";
    $result = mysqli_query($_SESSION['con'], $sql);
    if (!$result) return false;
    $rNomeEquipe = mysqli_fetch_assoc($result);
    return $rNomeEquipe;
}

function tabela($arrayUsuarios)
{
    $html = "";
    if (!$arrayUsuarios) return false;
    foreach($arrayUsuarios as $usuario) {
        $id = $usuario['id'];
        $idEquipeArray = buscaEquipeDeUsuario($id);
        $idEquipe = $idEquipeArray['id_equipe'];
        $nomeEquipe = buscaNomeEquipe($idEquipe);
        $html .= "<tr>";
        $html .= "<td class='border-2 text-center'>{$usuario['id']}</td>";
        $html .= "<td class='border-2'>{$usuario['name']}</td>";
        $html .= "<td class='border-2'>{$usuario['email']}</td>";
        $html .= "<td class='border-2 text-center'>{$nomeEquipe['equipe']}</td>";
        if ($usuario['status'] == 1) {
            $html .= "<td class='border-2 text-center'>Ativo</td>";
        } elseif ($usuario['status'] == 0) {
            $html .= "<td class='border-2 text-center'>Desativado</td>";
        }
        $html .= "<td class='border-2 text-center'><a href='formCadastra.php?id={$id}'>Editar</a></td>";
        $html .= "<td class='border-2 text-center'><a href='../actions/deletarUsuario.php?id={$id}'>Desativar</a></td>";
        $html .= "</tr>";
    }
    return $html;
}

//function tabela($arrayUsuarios)
//{
//    $html = "";
//    if (!$arrayUsuarios) return false;
//    foreach($arrayUsuarios as $usuario) {
//        $id = $usuario['id'];
//        $html .= "<tr>";
//        $html .= "<td class='border-2 text-center'>{$usuario['id']}</td>";
//        $html .= "<td class='border-2'>{$usuario['name']}</td>";
//        $html .= "<td class='border-2'>{$usuario['email']}</td>";
//        $html .= "<td class='border-2 text-center'>Soon</td>";
//        if ($usuario['status'] == 1) {
//            $html .= "<td class='border-2 text-center'>Ativo</td>";
//        } elseif ($usuario['status'] == 0) {
//            $html .= "<td class='border-2 text-center'>Desativado</td>";
//        }
//        $html .= "<td class='border-2 text-center'><a href='formCadastra.php?id={$id}'>Editar</a></td>";
//        $html .= "<td class='border-2 text-center'><a href='../actions/deletarUsuario.php?id={$id}'>Desativar</a></td>";
//        $html .= "</tr>";
//    }
//    return $html;
//}

function cadastraUsuario($nome, $email)
{
    if (!$nome || !$email) return false;

    $sql = "INSERT INTO `usuarios` (`name`, `email`) VALUES ('$nome', '$email');";
    $result = mysqli_query($_SESSION['con'], $sql);
    if (!$result) return false;
    return mysqli_insert_id($_SESSION['con']);
}

function alteraUsuario($id, $nome, $email)
{
    if (!$id || !$nome || !$email) return false;
    $sql = "UPDATE `usuarios` SET `name` = '$nome', `email` = '$email' WHERE `id` = '$id';";
    $result = mysqli_query($_SESSION['con'], $sql);
    if (!$result) return false;
    return true;
}

function vinculaEquipe($id, $equipe)
{
    if (!$id || !$equipe) return false;
    $sql = "INSERT INTO `equipe_usuario` (`id_user`, `id_equipe`) VALUES ('$id', '$equipe');";
    $result = mysqli_query($_SESSION['con'], $sql);
    if (!$result) return false;
    return mysqli_insert_id($_SESSION['con']);
}

function registroEquipe($id)
{
    if (!$id) return false;
    $sql = "UPDATE `equipe_usuario` SET `status` = 0 WHERE `id_user` = '$id';";
    $result = mysqli_query($_SESSION['con'], $sql);
    if (!$result) return false;
    return true;
}