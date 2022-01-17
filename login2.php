<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;500;700&display=swap" rel="stylesheet">
    <link 
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" 
    rel="stylesheet" 
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" 
    crossorigin="anonymous">
    <link rel="stylesheet" href="styles/main2.css">
</head>
<body>
    <main class="container">
        
        <section class="row justify-content-center align-items-center vh-100">
            <div class="col-5 login text-center py-5 rounded">
                <div class="col-12 mb-4">
                    <h2 class="fs-3">Insira seus dados para realizar o login</h2>
                </div>
                
                <div class="col-12">
                    <form action="" method="POST" class="px-5">
                        <input class="form-control shadow-none rounded-pill text-center" type="email" placeholder="E-mail" required>
                        <input class="form-control shadow-none mb-2 rounded-pill text-center" type="password" placeholder="Senha" required>
                        <input class="btn btn-secondary rounded-pill" type="submit" value="Logar">
                    </form>
                </div>
            </div>
        </section>
        
    </main>
</body>
</html>