<?php

$conection = mysqli_connect('login-php-dino.test', 'root', 'root');

if (!$conection) {
    die('Sem conexao: ' . mysqli_error());
}

mysqli_select_db($conection, 'revisao') or die('Sem banco de dados');
session_start();
$_SESSION['con'] = $conection;
// mysql_close($conection);
