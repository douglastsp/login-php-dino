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
        $html .= "<td class='px-6 py-4 whitespace-nowrap'>{$equipe['id']}</td>";
        $html .= "<td class='px-6 py-4 whitespace-nowrap'>{$equipe['equipe']}</td>";
        $html .= "<td class='px-6 py-4 whitespace-nowrap'>
                    <a href='formCadastraEquipes.php?id={$id}'>
                        <span class='px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-green-800 hover:bg-blue-300'>
                            Editar
                        </span>
                    </a>
                  </td>";
        $html .= "<td class='px-6 py-4 whitespace-nowrap'>
                    <a href='../actions/deletarEquipe.php?id={$id}'>
                        <span class='px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-green-800 hover:bg-red-300'>
                            Desativar
                        </span>
                    </a>
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