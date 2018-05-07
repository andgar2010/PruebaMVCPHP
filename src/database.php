<?php
/**
 * Class Database
 *
 * @category Class
 * @package  Poo
 * @author   Andres Garcia <afagrcia0479@misena.edu.co>
 * @license  <a href="www.mit.org">mit</a>
 * @link     www.github.com/andgar2010
 * Clase Database, crear un objeto db
 * Propiedadaes
 *
 * @con->variable
 * @dbhost->propiedad de clase de nombre de direccion en base de datos, normalmenete 'localhost'
 * @dbuser->propiedad de clase de nombre de usuario en base de datos
 * @dbpass->propiedad de clase de nombre de clave en base de datos
 * @dbname->propiedad de clase de nombre de base de datos
 */
class Database
{
    private $_con;
    private $_dbhost = 'localhost';
    private $_dbuser = 'root';
    private $_dbpass = '';
    private $_dbname = 'test_poo';
    private $_msgFallo = 'Conexión a la base de datos falló';

    /**
     * Constrctor
     * $this es entrada
     * @return this
     */
    function __construct()
    {
        $this->connectDb();
    }

    /**
     * Method for connect to DB
     *
     * @return this
     */
    function connectDb()
    {
        $this->_con = mysqli_connect($this->_dbhost, $this->_dbuser, $this->_dbpass, $this->_dbname);
        if (mysqli_connect_error()) {
            die('Conexión a la base de datos falló: ' . mysqli_connect_error() . ' código error: ' . mysqli_connect_errno());
        }
    }

    /**
     * Method clean the variable atfer save to db, for evitar inyeccion SQL.
     *
     * @var->inputvariable to function sanitize
     * @return->this
     */
    function sanitize($var)
    {
        $ret = mysqli_real_escape_string($this->_con, $var);
        return $ret;
    }


    /**
     * Crear un registro en db mediante este funcion
     *
     * @param nombres            es entrada nombre de cliente
     * @param apellidos          es entrada apellido de cliente
     * @param telefono           es entrada telefono de cliente
     * @param direccion          es entrada direccion de cliente
     * @param correo_electronico es entrada correo electronico de cliente
     *
     * @return res resultado por correctamente un registro nuevo guardado en BD
     */
    function create($nombres,$apellidos,$telefono,$direccion,$correo_electronico)
    {
        $sql_insert = "INSERT INTO `clientes` (`nombres`, `apellidos`, `telefono`, `direccion`, `correo_electronico`)
                        VALUES('$nombres',
                                '$apellidos',
                                '$telefono',
                                '$direccion',
                                '$correo_electronico')";

        $insertadoClienteDb = mysqli_query($this->_con, $sql_insert);
        return ($insertadoClienteDb) ? true : false;
    }

    function read()
    {
        $sql_query = "SELECT * FROM clientes";
        return mysqli_query($this->_con, $sql_query);
    }

    function single_record($id)
    {
        $sql_query_id = "SELECT * FROM clientes WHERE id='$id'";
        $ouput_sql = mysqli_query($this->_con, $sql_query_id);
        return mysqli_fetch_object($ouput_sql);
    }

    function update($nombres,$apellidos,$telefono,$direccion,$correo_electronico,$id)
    {
        $sql_update = "UPDATE clientes SET  nombres             = '$nombres',
                                            apellidos           = '$apellidos',
                                            telefono            = '$telefono',
                                            direccion           = '$direccion',
                                            correo_electronico  = '$correo_electronico'
                                        WHERE id=$id";
        $actualizadoRegistrado = mysqli_query($this->_con, $sql_update);
        return ($actualizadoRegistrado) ? true : false;
    }

    function delete($id)
    {
        $sql_delete = "DELETE FROM clientes WHERE id=$id";
        $eliminadoDB = mysqli_query($this->_con, $sql_delete);
        return ($eliminadoDB) ? true : false;
    }
}
?>