<?php

function checkUsuario($idRecebido)
{
    if (!$idRecebido) return false;

    $sql = "SELECT * FROM `usuarios` WHERE id = {$idRecebido} LIMIT 1;";
    $result = mysqli_query($_SESSION['con'], $sql);
    if (!$result) return false;
    $userSql = mysqli_fetch_assoc($result);
    if (!$userSql) return false;
    return $userSql;
}

function checkEquipe($idRecebido)
{
    if (!$idRecebido) return false;

    $sql = "SELECT * FROM `equipe_usuario` WHERE id_user = {$idRecebido} AND `status` = 1 LIMIT 1;";
    $result = mysqli_query($_SESSION['con'], $sql);
    if (!$result) return false;
    $userSql = mysqli_fetch_assoc($result);
    if (!$userSql) return false;
    return $userSql;
}

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

function montaListaEquipes($arrayEquipes, $equipeRecebida)
{
    $html = "";
    if (!$arrayEquipes) return false;
    foreach ($arrayEquipes as $equipe) {
        $id = $equipe['id'];
        if ($equipe['id'] == $equipeRecebida['id_equipe']) {
            $html .= "<option value='{$equipe['id']}' selected> {$equipe['equipe']}</option>";
        } else {
            $html .= "<option value='{$equipe['id']}'>{$equipe['equipe']}</option>";
        }
    }
    return $html;
};