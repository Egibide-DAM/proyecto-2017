<?php

include_once __DIR__ ."/../../modelo/Mensajes/obj_mensaje.php";
include_once __DIR__ ."/../../modelo/Conector/Connector.php";


class dal_mensaje
{

    public function getAllMensajes(){

        //conexion con host
        $conn = null;
        //result_set
        $result = null;
        //Array return
        $arr_mensajes = array();

        try{

            //obj_connector con parametros para la conexion
            $connector =  new Connector();


            //Obtenemos la conexión con el host
            $conn = $connector->getConn();

            // Realizar una consulta MySQL
            $query = 'select * from datos order by id desc';

            //Ejecutamos el resultset de MySql
            $result = mysqli_query($conn, $query) or die('Consulta fallida: ' . mysqli_error($conn));

            $total = mysqli_num_rows($result);

            //Recorremos resultset
            while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {

                $cur_mensaje = new obj_mensaje();

                $cur_mensaje->setMessageID($row['id']);
                $cur_mensaje->setClientID($row['cliente']);
                $cur_mensaje->setTopic($row['topic']);
                $cur_mensaje->setMessage($row['mensaje']);
                $cur_mensaje->setDateTimeCreated($row['DateTime_created']);

                $arr_mensajes[$cur_mensaje->getMessageID()] = $cur_mensaje;
            }


        }catch (mysqli_sql_exception $e) {
            var_dump($e ->getTraceAsString());
        }finally{
            // Liberar resultados
            if($result != null)
                mysqli_free_result($result);

            // Cerrar la conexión
            if($conn != null)
                mysqli_close($conn);
        }

        return $arr_mensajes;

    }

}