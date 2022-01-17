<?php 
require "db.php";

session_destroy();

header('location: ../index.php');
exit;

?>