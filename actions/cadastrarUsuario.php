<?php
require "../include/db.php";
require "../include/funcoesUsuario.php";

$idUsuario = $_POST['inputId'];
$nomeUsuario = $_POST['inputNome'];
$emailUsuario = $_POST['inputEmail'];
$idEquipe = $_POST['inputEquipe'];

if (!$idUsuario) {
    $novoCadastro = vinculaEquipe(cadastraUsuario($nomeUsuario, $emailUsuario), $idEquipe);

    if (!$novoCadastro) {
        header("Location: ../pages/home.php?msg=falhou");
        exit;
    } else {
        header("Location: ../pages/home.php?msg=sucesso");
        exit;
    }
} else {
    $registroEquipe = registroEquipe($idUsuario);
    $alteraCadastro = alteraUsuario($idUsuario, $nomeUsuario, $emailUsuario);
    $vinculaEquipe = vinculaEquipe($idUsuario, $idEquipe);

    if (!$alteraCadastro && !$vinculaEquipe && !$registroEquipe) {
        header("Location: ../pages/home.php?msg=falhou");
        exit;
    } else {
        header("Location: ../pages/home.php?msg=sucesso");
        exit;
    }
}