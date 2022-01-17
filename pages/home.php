<?php 
require "../include/db.php";

if (!$_SESSION['user_id']) {
    header('location: ../index.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;500;700&display=swap" rel="stylesheet">
    <title>Home</title>
</head>
<body>
    <div class="py-2 px-4 flex justify-between">
        <div>
            <p>Olá <?= $_SESSION['user_name'] ?></p>
        </div>
        <div>
            <a href="../include/logout.php">Logout</a>
        </div>
    </div>
    
    <script src="https://cdn.tailwindcss.com"></script>
</body>
</html>