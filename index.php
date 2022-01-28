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
                    <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900">
                        <?= $title; ?>
                    </h2>
                </div>

                <div>
                    <form class="flex flex-col items-center mt-6" action="include/validaLogin.php" method="POST">
                        <input
                            name="email"
                            class="appearance-none rounded-none relative block w-full px-3 py-2 border
                            border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none
                            focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm text-center"
                            type="text" placeholder="E-mail">
                        <input
                            name="pw"
                            class="appearance-none rounded-none relative block w-full px-3 py-2 border
                            border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none
                            focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm text-center"
                            type="password" placeholder="Senha">
                        <input
                            id="btn_logar"
                            class="ml-2 mt-6 flex items-center justify-center px-8 py-3 border border-transparent
                            text-base font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 md:py-4 md:text-lg md:px-10"
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
