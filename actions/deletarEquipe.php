<?php
require "../include/db.php";

$idDeletar = $_GET['id'];

$deletaEquipe = deletarEquipe($idDeletar);

if (!$deletaEquipe) {
    header("Location: ../pages/equipes.php?msg=sucesso");
    exit;
} else {
    header("Location: ../pages/equipes.php?msg=falhou");
    exit;
}















function deletarEquipe($id) {
    if (!$id) return false;

    $sql = "UPDATE `equipes` SET `status` = '0' WHERE `id` = '$id'";
    $result = mysqli_query($_SESSION['con'], $sql);
    if (!$result) return false;
}

;