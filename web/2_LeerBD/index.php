<?php include "conexion.php"; ?>
<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <title>Proyecto Joseba &amp Kepa</title>
</head>
 
<body>
    <?php
    // creo la consulta SQL
    $sql = "SELECT * FROM lecturas";
    // cargo el resultado de la consulta SQL en la variable
    $resultado = mysqli_query($conn, $sql);
    // si hay datos   
    if (mysqli_num_rows($resultado) > 0) {
        echo 'Hay ' . mysqli_num_rows($resultado) . ' registros.<br><br>';
        $reg = 1;
        ?>
  


        <table border="1" >
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
                    //   echo "Temperatura: " . $row["dato"] . "<br>";
                }
                ?>
            </tbody>
        </table>
        <?php
    } else {
        echo 'No hay registros';
    }
    // cierro la conexion
    mysqli_close($conn);
    ?>
</body>

