<?php

$conection = mysql_connect('db', 'root', 'root');

if (!$conection) {
    die('Sem conexao: ' . mysql_error());
}

mysql_select_db('revisao', $conection) or die('Sem banco de dados');
session_start();

// mysql_close($conection);
