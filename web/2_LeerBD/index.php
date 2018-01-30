<?php include "conexion.php"; ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Proyecto DAM 17/18</title>
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />

<!--[if lte IE 8]><script src="css/ie/html5shiv.js"></script><![endif]-->
        <script src="../js/jquery.min.js"></script>
        <script src="../js/skel.min.js"></script>
        <script src="../js/skel-layers.min.js"></script>
        <script src="../js/init.js"></script>
        <noscript>
        <link rel="stylesheet" href="../css/skel.css" />
        <link rel="stylesheet" href="../css/style.css" />
        <link rel="stylesheet" href="../css/style-xlarge.css" />
        </noscript>
        <!--[if lte IE 8]><link rel="stylesheet" href="css/ie/v8.css" /><![endif]-->
    </head>

    <body  class="landing">

        <!-- Header -->
        <header id="header">
            <h1><a href="../index.html">Proyecto DAM 17/18</a></h1>
            <nav id="nav">
                <ul>
                    <li><a href="../index.html">Inicio</a></li>
                    <li><a href="index.php">Mostrar</a></li>
                </ul>
            </nav>
        </header>

        <!-- Main -->
        <section id="main" class="wrapper">
            <div class="container">

                <header class="major">
                    <h2>Base de datos</h2>
                    <p>Estos son los datos recibidos y guardados en nuestra base de datos.</p>
                </header>
                <p>
                    <?php
                    // creo la consulta SQL
                    $sql = "SELECT * FROM lecturas";
                    // cargo el resultado de la consulta SQL en la variable
                    $resultado = mysqli_query($conn, $sql);
                    // si hay datos
                    if (mysqli_num_rows($resultado) > 0) {
                        echo 'Hay ' . mysqli_num_rows($resultado) . ' registros.<br><br><br><br>';
                        $reg = 1;
                        ?>

                    </p>
                    <section id="banner">
                        <div class="table-wrapper">
                            <table class="steelBlueCols" >
                                <caption>DATOS RECOGIDOS POR EL SENSOR</caption>
                                <thead>
                                    <tr>
                                        <th>Lectura</th>
                                        <th>Humedad,Temperatura</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    // por cada registro
                                    while ($row = mysqli_fetch_assoc($resultado)) {
                                        ?><tr>
                                            <th><?php echo 'nº ' . $reg++; ?></th>
                                            <td><?php echo $row["humedad"]; ?></td>

                                        </tr>
                                        <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </section>
                    <?php
                } else {
                    echo 'No hay registros';
                }
                // cierro la conexion
                mysqli_close($conn);
                ?>

            </div>
        </section>
        <!-- Footer -->
        <!--        <footer id="footer">
                    <div class="container">
                        <div class="row">
                            <section class="4u$ 12u$(medium) 12u$(small)">
                                <ul class="tabular">
                                    <li>
                                        <h3>Autores</h3>
                                        Joseba<br>
                                        Kepa
                                    </li>

                                </ul>
                            </section>
                        </div>
                        <ul class="copyright">
                            <li>&copy; Joseba &amp Kepa.</li>
                            <li>Design: <a href="http://templated.co">TEMPLATED</a></li>
                            <li>Images: <a href="http://unsplash.com">Unsplash</a></li>
                        </ul>
                    </div>
                </footer>-->
    </body>
</html>

<?php
