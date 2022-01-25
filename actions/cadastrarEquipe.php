<?php
require "../include/db.php";
require "../include/funcoesEquipe.php";

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


