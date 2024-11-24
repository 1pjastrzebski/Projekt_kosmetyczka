<?php
    session_start();
    require_once "../components/connect.php";
    $conn = new mysqli($host,$username,$password,$database);
    if($conn->connect_error){
        die("Błąd połączenia " . $conn->connect_error);
    }
    else{
        if(isset($_POST["email"]) && isset($_POST["password"])){
            $email = $_POST["email"];
            $password = $_POST["password"];
            $sql = "SELECT * FROM klienci Where email='%s'";
            if($kwerenda = $conn->query($sql)){
                if($kwerenda->num_rows == 1){
                    $row = $kwerenda->fetch_assoc();
                    if(password_verify($password, $row['password'])){
                        $_SESSION["user"] = $row;   
                        unset($_SESSION["log_err"]);
                        $_SESSION["logged"] = true;
                        $kwerenda->close();
                        header("Location: ../index.php");
                    }else{
                        $_SESSION['log_err'] = "Nieprawidłowe hasło";
                        header("Location: ../log-form.php");
                    }
                }else{
                    $_SESSION["log_err"] = "Nieprawidłowy email";
                    header("Location: ../log-form.php");
                }
            }
        }else{
            header("Location: ../log-form.php");
        }
        $conn->close();
    }
?>