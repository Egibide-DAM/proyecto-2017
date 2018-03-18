<?php

    include_once __DIR__.'/web_server/controlador/Mensajes/MensajesAction.php';
    $arr_mensajes = MensajesAction::findAllMensajes();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Mi Web</title>
    <link rel="shortcut icon" href="./web_server/vista/img/favicon.ico" type="image/x-icon">

    <!-- CSS de Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <!-- Mi CSS -->
    <link href="web_server/vista/css/styles.css" rel="stylesheet" type="text/css">
</head>
<body>

    <div class="container-fluid"><!-- Contenedor -->

        <!-- Menú -->
        <?php
        include_once __DIR__."/web_server/vista/menu.inc";
        ?>
        <!-- /Menú -->

        <div class="contenido">

        <!-- Cuerpo -->
        <div class="row"><!-- Primer párrafo -->
            <div class="col-sm-12">
                <h3>Bienvenidos</h3>
            </div>
        </div><!-- /Primer párrafo -->

		<div class="row">
            <div class="col-sm-12">
                <p>Total de filas: <?php echo sizeof($arr_mensajes) ?> </p>
<?php
                // Mostrar el contenido de las filas
                if ($arr_mensajes != null && sizeof($arr_mensajes) > 0) {

                    foreach( $arr_mensajes as $id => $qty) {

                        $cur_mensaje = (object) $qty;

                        ?>

            <div class="item-msg">
                <p>Idetificador -> <?php echo $cur_mensaje->getMessageID()?></p>

                <?php
                if($cur_mensaje->getTopic() == "photon/humedad"){
                    echo '<strong>TOPIC HUMEDAD -> ' .$cur_mensaje->getTopic() .'</strong>';
                }else if($cur_mensaje->getTopic() == "photon/temperatura"){
                    echo '<strong>TOPIC TEMPERATURA -> ' .$cur_mensaje->getTopic() .'</strong>';
                }else{
                echo '<strong>TOPIC DESCONOCIDO ->' .$cur_mensaje->getTopic() .'</strong>' ;
                }
                ?>


                <p>Cliente -> <?php echo $cur_mensaje->getClientID()?></p>


                <?php
                if($cur_mensaje->getTopic() == "photon/humedad"){
                    echo '<strong>Humedad -> ' .$cur_mensaje->getMessage() .' %</strong>';
                }else if($cur_mensaje->getTopic() == "photon/temperatura"){
                    echo '<strong>Temperatura -> ' .$cur_mensaje->getMessage() .' Cº</strong>';
                }else{
                    echo '<strong>Topic desc. ->' .$cur_mensaje->getMessage() .'</strong>' ;
                }
                ?>
                <p>Mensaje -> <?php echo $cur_mensaje->getMessage()?></p>

                <p>Fecha de creación -> <?php echo $cur_mensaje->getDateTimeCreated()?></p>
            </div>
                <?php
                    }
                }
?>
        </div>

        <!-- /Cuerpo -->

        </div>

        <!-- Pié de página -->
        <?php
        include_once __DIR__."/web_server/vista/pie.inc";
        ?>
        <!-- /Pié de página -->

    </div><!-- /contenedor -->

    <!-- -->

</body>
</html>