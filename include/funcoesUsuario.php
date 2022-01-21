<?php

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

