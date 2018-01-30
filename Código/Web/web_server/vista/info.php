<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Mi Web</title>
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">

    <!-- CSS de Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <!-- Mi CSS -->
    <link href="css/styles.css" rel="stylesheet" type="text/css">
</head>
<body>

    <div class="container-fluid"><!-- Contenedor -->

        <!-- Menú -->
        <?php
        include_once __DIR__."/menu.inc";
        ?>
        <!-- /Menú -->

        <div class="contenido">

        <!-- Cuerpo -->
        <div class="row"><!-- Primer párrafo -->
            <div class="col-sm-12">
                <h3>Bienvenidos</h3>
            </div>
        </div><!-- /Primer párrafo -->

        <div class="row"><!-- Primera fila de imágenes -->
            <!-- Izq -->
            <div class="col-sm-4">
                <a href="img/ajedrez.png"><img src="img/ajedrez.png"/></a>
            </div>
            <!-- Medio -->
            <div class="col-sm-4">
                <a href="img/logox6_positivo.png"><img src="img/logox6_positivo.png"/></a>
            </div>
            <!-- Drch -->
            <div class="col-sm-4">
                <a href="img/logox6-2.png"><img src="img/logox6-2.png"/></a>
            </div>
        </div><!-- /Primera fila de imágenes -->

        <div class="row"><!-- Segunda fila de imágenes -->
            <!-- Izq -->
            <div class="col-sm-4">
                <a href="img/ajedrez2.png"><img src="img/ajedrez2.png"/></a>
            </div>
            <!-- Medio -->
            <div class="col-sm-4">
                <a href="img/ajedrez3.png"><img src="img/ajedrez3.png"/></a>
            </div>
            <!-- Drch -->
            <div class="col-sm-4">
                <a href="img/logox6_negativo.png"><img src="img/logox6_negativo.png"/></a>
            </div>
        </div><!-- /Segunda fila de imágenes -->


        <!-- /Cuerpo -->

        </div>

        <!-- Pié de página -->
        <?php
        include_once __DIR__."/pie.inc";
        ?>
        <!-- /Pié de página -->

    </div><!-- /contenedor -->

    <!-- -->

</body>
</html>