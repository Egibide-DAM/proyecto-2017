<?php
/**
 * Created by PhpStorm.
 * User: jlopez
 * Date: 25/10/2017
 * Time: 9:51
 */


class Connector
{
    //Variable de conexión para enlazar con una BDatos Sql o MySql
    private $conn;

    const _HOST = "127.0.0.1:3306";
    const _DBNAME = "bd";
    const _USER = "vlamp";
    const _PASS = "vlamp";

    /**
     * Connector constructor.
     * @type_conn String, indica que tipo de conexión queremos devolver en return
     */
    public function __construct()
    {

        try {
            //Conectamos con servidor
            $conn = mysqli_connect( self::_HOST, self::_USER, self::_PASS)
            or die('No se pudo conectar: ' . mysqli_error($conn));

            //Obetenemos la conexión con la base de datos
            mysqli_select_db($conn, self::_DBNAME ) or die('No se pudo seleccionar la base de datos');

            //Llenamos la varaible de conexión que vamos a usar
            self::setConn($conn);

        } catch (mysqli_sql_exception $ex) {
            var_dump($ex ->getTraceAsString());
        }

    }

    /**
     * @return mixed
     */
    public function getConn()
    {
        return $this->conn;
    }

    /**
     * @param mixed $conn
     */
    public function setConn($conn)
    {
        $this->conn = $conn;
    }

}