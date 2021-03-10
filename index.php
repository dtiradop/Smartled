<!DOCTYPE html>
<html>
<head>
    <title>SmartLed</title>
    <link rel="stylesheet" href="estilo.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
</head>

<body>
    <?php
    if (isset($_POST['enviar'])) {
        $login = $_POST['login'];
        $password = $_POST['pass'];
        if ($login == "userone" && $password == "1234")  {
            session_start();
            $_SESSION['usuario'] = $login;
            header("Location: seleccionuserone.php");
        } else
        if  ($login == "usertwo" && $password == "5678") {
            session_start();
            $_SESSION['usuario'] = $login;
            header("Location: selecciontwo.php");
        }
        else {
            session_start();
            $_SESSION['usuario'] = "";
            header("Location: index.html");
        }
    } else {
    ?>
    <div class="container-login">
        <div class="o-container-img">
            <img src="smartled.png" alt="SmartDor" class="o-img">
        </div>
        <div class="o-form-container"> 
        <h2 class="o-title">INGRESO</h2>
        <form action="index.php" method="POST">
            Usuario: <br>
            <input type="text" name="login" width="50" class="o-input"><br><br>
            Contraseña: <br>
            <input type="password" name="pass" width="50" class="o-input"><br><br>
            <input type="submit" name="enviar" value="ENVIAR" class="o-button">
        </form>
        </div>
    </div>
    <?php } ?>
</body>

</html>