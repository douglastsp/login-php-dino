<?php
require "../include/db.php";

$idEquipe = $_POST['inputId'];
$nomeEquipe = $_POST['inputEquipe'];

if (!$idEquipe) {
    $novoCadastro = cadastraEquipe($nomeEquipe);

    if (!$novoCadastro) {
        header("Location: ../pages/equipes.php?msg=falhou");
        exit;
    } else {
        header("Location: ../pages/equipes.php?msg=sucesso");
        exit;
    }
} else {
    $alteraCadastro = alteraEquipe($idEquipe, $nomeEquipe);

    if (!$alteraCadastro) {
        header("Location: ../pages/equipes.php?msg=falhou");
        exit;
    } else {
        header("Location: ../pages/equipes.php?msg=sucesso");
        exit;
    }
}


// FUNÇÕES

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
