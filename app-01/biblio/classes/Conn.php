<?php
/**
 * 
 * Singleton para conexão com DB
 * 
 */
abstract class Conn {

    /**
     *
     * @var type 
     */
    private static $conn;

    /**
     *
     * @return type
     */
    static function getConexao() {
        $local   = "localhost";
        $usuario = "root";
        $senha   = "1234";
        $base    = "devfuria_main";

        if (empty(self::$conn)) {
            self::$conn = new PDO("mysql:host=$local;dbname=$base", "$usuario", "$senha", array(
                    PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"
                )
            );
        }

        return self::$conn;
    }
}
?>