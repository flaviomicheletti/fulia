<?php
/**
 * Singleton para conexão com banco de dados
 */
abstract class Db {

    private static $pdo;
    private static $local   = "localhost";
    private static $usuario = "root";
    private static $senha   = "1234";
    private static $base    = "fulia";

    static function getConexao($base=null) {
        if (!self::$pdo) {
            self::conectar();
        }

        if ($base) {
            self::$pdo->query("use $base");
        } else {
            self::$pdo->query("use " . self::$base);
        }

        return self::$pdo;
    }

    static function conectar() {
        if (empty(self::$pdo)) {
            self::$pdo = new PDO("mysql:host=" . self::$local . ";", self::$usuario, self::$senha);
            self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            self::$pdo->exec("SET CHARACTER SET utf8");
            return self::$pdo;
        }
    }


}