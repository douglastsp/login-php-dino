<?php 
include "db.php";

$email = (string) $_POST['email'];
$pw = (string) $_POST['pw'];

if (!$isUser = getUser($email)) {
    echo "Usuario não cadastrado <br><br><br> 
        <a style='padding:10px; color: white; background-color:black' href='../index.php'>Voltar</a>";    
} elseif ($pw != $isUser['password']) {
    echo "Senha incorreta <br><br><br> 
        <a style='padding:10px; color: white; background-color:black' href='../index.php'>Voltar</a>";
} else {
    $_SESSION['user_id'] = $isUser['id'];
    $_SESSION['user_name'] = $isUser['name'];
    
    header('location: ../pages/home.php');
    exit;
}



/**
 * Funções;
 */
function getUser($email) {

    $query = "SELECT * FROM `usuarios` WHERE `email` LIKE '{$email}'";
    
    $result = mysql_query($query);
    
    if(!$result) return false;
    
    if(mysql_num_rows($result)>0) {
        while($row = mysql_fetch_assoc($result)) {
            $r[] = $row;
        }
    } else {
        return false;
    }
    
    return $r[0];
}

