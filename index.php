<?php
$title = "Login";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title; ?></title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;500;700&display=swap" rel="stylesheet">
</head>
<body class=" bg-gray-100">
    <main class="flex justify-center items-center h-screen">

        <section class="bg-white p-8 w-96 rounded">
            <div class="text-center">
                <div>
                    <h2 class="text-2xl mb-4"><?= $title; ?></h2>
                </div>

                <div>
                    <form class="flex flex-col items-center" action="include/validaLogin.php" method="POST">
                        <input
                            name="email"
                            class="p-3 w-full border rounded-full mb-1 focus:outline-cyan-500 text-center"
                            type="text" placeholder="E-mail">
                        <input
                            name="pw"
                            class="p-3 w-full border rounded-full mb-4 focus:outline-cyan-500 text-center"
                            type="password" placeholder="Senha">
                        <input
                            id="btn_logar"
                            class="p-2 rounded-full w-1/3 bg-gray-500 duration-1000
                                transition ease-in-out delay-150 hover:-translate-y-1
                                hover:scale-110 duration-300 border
                                hover:bg-gray-900 text-white text-base cursor-pointer"
                            type="submit" value="Logar">
                    </form>
                </div>
            </div>
        </section>

    </main>
    <script src="https://cdn.tailwindcss.com"></script>
    <script
        src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
        crossorigin="anonymous"></script>
    <script src="js/validaLogin.js"></script>
</body>
</html>
