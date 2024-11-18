<?php
    session_start();
    if(isset($_SESSION['logged'])){
        header("Location: ../index.php");
        exit();
    }
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logowanie</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        
        .container{
            height: 55vh;
        }
        form{
            border: 1px solid black;
        }
        .form-floating{
            margin: 15px;
        }
        .form-error-text{
            color: tomato;
        }
    </style>
    <script src="js/form.js" defer></script>
</head>
<body>
    <div class="container d-flex justify-content-center align-items-center mt-5">
        <form action="php/log.php" method="post" class="p-4 rounded">
            <h2 class="text-center">Zaloguj się</h2>
            <div class="form-floating">
                <input type="email" class="form-control" id="email" name="email" required placeholder="E-mail">
                <label for="email">E-mail</label>
            </div>
            <div class="form-floating">
                <input type="password" class="form-control" id="password" name="password" required placeholder="Hasło">
                <label for="password">Hasło</label>
            </div>
            <div class="d-flex justify-content-center">
                <button class="btn" type="submit">Zaloguj się</button>
            </div>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>