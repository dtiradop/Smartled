<html>

<head>
    <title>SmartLED - Perfil</title>
    <link rel="stylesheet" href="estilo.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>

<body>
    <?php
    session_start();
    $us = $_SESSION['usuario'];
    if ($us == "") {
        header("Location: index.html");
    }
    $nodo = $_POST["nodo"];
    $var = $_POST["variable"];
    ?>
    <nav>
        <div class="o-img-nav">
            <img src="descarga.png" alt="SmartDor" class="o-imgv">
        </div>
        <div class="o-icons">
            <span class="material-icons">search</span>
            <br>
            <span class="material-icons">help</span>
        </div>
    </nav>
    <div class="o-container-body">
        <div class="container-perfil">
            <h1 class="o-title o-otro">Hola, Usuario</h1>
            <img src="smartled.png" alt="SmartDor" class="o-icon">
            <h4 class="o-title">Aquí visualizara <?php echo $var; ?> </h4>
        </div>
        <div class="container-tabla">
            <h2>Datos del: <?php echo $nodo; ?> y el dato: <?php echo $var; ?> </h2>

            <table>
                <tr>
                    <th><?php echo $var; ?></th>
                    <th>Fecha</th>
                </tr>
                <?php
                $url_rest = "https://api.thinger.io/v1/users/matteoordonez/buckets/$nodo/data?authorization=eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJqdGkiOiJEZXZpY2VDYWxsYmFja19Cb21iaWxsbzEiLCJ1c3IiOiJtYXR0ZW9vcmRvbmV6In0.PBcO1nY1HszZA80cm7vaj89WmhF5mQWKjX-ev6L2ji4";
                $curl = curl_init($url_rest);
                curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
                $respuesta = curl_exec($curl);
                if ($respuesta === false) {
                    curl_close($curl);
                    die("Error...");
                }
                curl_close($curl);
                //echo $respuesta;
                $resp = json_decode($respuesta);
                //$result = $resp->results;
                $tam = count($resp);
                for ($i = 0; $i < $tam; $i++) {
                    $var1=$var;
                    $j = $resp[$i];
                    $valor1 = $j->val;
                    $time = $j->ts;
                    $fecha = date('d-m-Y H:i:s', $time);
                    $variable =$valor1->$var1;
                    echo "<tr><td>$variable</td><td>$fecha</td></tr>";
                }
                ?>
            </table><br>
            <a href="seleccion.php">Volver</a><br>
            <a href="logout.php">Cerrar sesión</a><br>
        </div>
    </div>
</body>

</html>