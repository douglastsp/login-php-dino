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

function tabelaEquipe($arrayEquipes)
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

function cadastraEquipe($nome)
{
    if (!$nome) return false;

    $sql = "INSERT INTO `equipes` (`equipe`) VALUES ('$nome');";
    $result = mysqli_query($_SESSION['con'], $sql);
    if (!$result) return false;
    return mysqli_insert_id($_SESSION['con']);
}

function alteraEquipe($id, $nome)
{
    if (!$id || !$nome) return false;
    $sql = "UPDATE `equipes` SET `equipe` = '$nome' WHERE `id` = '$id';";
    $result = mysqli_query($_SESSION['con'], $sql);
    if (!$result) return false;
    return true;
}