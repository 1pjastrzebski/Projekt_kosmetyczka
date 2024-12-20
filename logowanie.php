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
    <link rel="stylesheet" href="log.css">
    <script src="js/form.js" defer></script>
</head>
<body>
<div class="container d-flex align-items-center flex-column">
        <main class="d-flex flex-column align-items-center p-4 rounded mt-5 bg-dark">
            <h1 class="text-white-50">Zaloguj</h1>
            <form method="post" action="php/log.php">
                <div class="form-body">
                    <div class="fdiv">
                        <div class="form-floating text-white-50">
                            <input type="email" name="email" required maxlength="100" class="form-control bg-dark border-top-0 border-end-0 border-start-0 line border-5 text-white" placeholder="Email">
                            <label for="email">Email</label>
                        </div>
                        <div class="form-floating text-white-50">
                            <input type="password" id="haslo" name="haslo" required maxlength="50" class="form-control bg-dark border-top-0 border-end-0 border-start-0 line border-5 text-white" placeholder="Haslo">
                            <label for="haslo">Hasło</label>
                        </div>


                    </div>
                </div>
                <div class="d-flex justify-content-center width-100">
                    <button type="submit" class="btn text-light butn" >Zaloguj</button>

                </div>
            </form>
            <?php
            if (isset($_SESSION["email_err"])) {
                echo "<p id='log_err' class='form-error-text'>" . $_SESSION["email_err"] . "</p>";
                unset($_SESSION["email_err"]);
            }
            ?>
            <div>
                <p>Nie masz konta? <a href="logowanie.php">Zarejestruj się.</a></p>
            </div>
        </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>