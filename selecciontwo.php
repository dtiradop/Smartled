<html>

<head>
    <title>SmartLED - Seleccion</title>
    <link rel="stylesheet" href="estilo.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
</head>

<body>
    <?php
    session_start();
    $us = $_SESSION['usuario'];
    if ($us == "") {
        header("Location: index.html");
    }
    ?>
    <div class="container-login">
        <div class="o-container-img">
            <img src="smartled.png" alt="SmartLed" class="o-img">
        </div>
        <div class="o-form-container">
            <h1 class="o-title o-otro">Tu casa siempre iluminada</h1>
            <h2 class="o-title">Seleccione el bombillo y el dato que desea visualizar: </h2>
            <form action="nodo1.php" method="POST">
                Led: <input type="text" name="nodo" value="Luz2B" class="o-input"><br>
                Dato: <br>
                <input type="submit" name="variable" class="o-button" value="Luminosidad">
                <input type="submit" name="variable" value="Distancia" class="o-button">
                <input type="submit" name="variable" value="Encendido" class="o-button">
            </form>
            <h4 class="o-close"><a href="logout.php">CERRAR SESION</a></h4>
        </div>
    </div>
</body>

</html>