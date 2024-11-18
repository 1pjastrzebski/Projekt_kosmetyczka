<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logowanie</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        *{
            padding: 0;
            margin: 0;
            box-sizing: border-box;
            background-color: white;
        }
        .container{
            height: 50vh;
        }
        form{
            border: 1px solid black;
        }
        .form-floating{
            margin: 15px;
        }
    </style>
</head>
<body>
    <div class="container d-flex justify-content-center align-items-center">
        <form action="php/log.php" method="post" class="p-4 rounded">
            <h2 class="text-center">Zaloguj się</h2>
            <div class="form-floating">
                <input type="email" class="form-control" name="email" required placeholder="E-mail">
                <label for="email">E-mail</label>
            </div>
            <div class="form-floating">
                <input type="password" class="form-control" name="password" required placeholder="Hasło">
                <label for="password">Hasło</label>
            </div>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>