<?php
require "../include/db.php";

$nomeUsuario = $_POST['inputNome'];
$emailUsuario = $_POST['inputEmail'];
$idUsuario = $_POST['inputId'];

if (!$idUsuario) {
    $novoCadastro = cadastraUsuario($nomeUsuario, $emailUsuario);

    if (!$novoCadastro) {
        header("Location: ../pages/home.php?msg=falhou");
        exit;
    } else {
        header("Location: ../pages/home.php?msg=sucesso");
        exit;
    }
} else {
    $alteraCadastro = alteraUsuario($idUsuario, $nomeUsuario, $emailUsuario);

    if (!$alteraCadastro) {
        header("Location: ../pages/home.php?msg=falhou");
        exit;
    } else {
        header("Location: ../pages/home.php?msg=sucesso");
        exit;
    }
}


















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
