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
    private $_dbhost = 'locahost';
    private $_dbuser = 'root';
    private $_dbpass = '';
    private $_dbname = 'tuto_poo';
    private $_msgFallo = 'Conexión a la base de datos falló';

    public __construct($this)
    {
        $this->connectDb()
    }

    /**
     * Method for connect to DB
     */
    public function connectDb()
    {
        $this->con = mysqli_connect($this->dbhost, $this->dbuser, $this->dbpass, $this->dbname);
        if (mysqli_connect_error()) {
            die($_msgFallo . mysqli_connect_error() . mysqli_connect_errno());
        }
    }
}
?>