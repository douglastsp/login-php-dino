<?php
require "../include/db.php";

$idDeletar = $_GET['id'];

$deletaUsuario = deletarUsuario($idDeletar);

if (!$deletaUsuario) {
    header("Location: ../pages/home.php?msg=sucesso");
    exit;
} else {
    header("Location: ../pages/home.php?msg=falhou");
    exit;
}













// FUNÇÃO DELETAR

//function deletarUsuario($id) {
//    if (!$id) return false;
//
//    $sql = "DELETE FROM `usuarios` WHERE `id` = '$id';";
//    $result = mysqli_query($_SESSION['con'], $sql);
//    if (!$result) return false;
//}

// FUNÇÃO ALTERAR STATUS

function deletarUsuario($id) {
    if (!$id) return false;

    $sql = "UPDATE `usuarios` SET `status` = '0' WHERE `id` = '$id'";
    $result = mysqli_query($_SESSION['con'], $sql);
    if (!$result) return false;
}

;