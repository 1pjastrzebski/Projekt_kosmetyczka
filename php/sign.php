<?php
session_start();
require_once "../components/connect.php";



$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die("Błąd połączenia " . $conn->connect_error);
} else {
    if (isset($_POST["email"]) && isset($_POST["haslo"])) {
        $imie = $_POST["Imie"];
        $nazwisko = $_POST["Nazwisko"];
        $email = $_POST["email"];
        $haslo = $_POST["haslo"];
        $phaslo = $_POST["phaslo"];
        $plec = $_POST['plec'];
        $hHaslo = password_hash($haslo, PASSWORD_DEFAULT);
        $sql = "SELECT email FROM klienci WHERE email='$email'";
        if ($kwerenda = $conn->query($sql)) {
            if ($kwerenda->num_rows > 0) {
                $_SESSION["email_err"] = "Istnieje już konto z tym adresem email";
                header('Location: ../sign-form.php');
                $conn->close();
                exit();
            }
        } else {
            header("Location: ../sign-form.php");
        }
        $sql = "INSERT into klienci VALUES(null,'$imie','$nazwisko','$email','$plec','$hHaslo')";
        if ($kwerenda = $conn->query($sql)) {
            $_SESSION['rejestracja'] = true;
            header("Location: ../index.php");
        } else {
            header("Location: ../sign-form.php");
        }
    }
}
$conn->close();
?>
