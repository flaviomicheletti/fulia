<?php

require __DIR__  . "/../boot.php";

class DbTest extends PHPUnit_Framework_TestCase
{

    public function testConectar() {
        $this->assertInstanceOf("pdo", Db::conectar());
    }

    public function testGetConexao() {

        // base padrão definida no arquivo "Db.php"
        $this->assertInstanceOf("pdo", Db::getConexao());

        //
        // mas você poderá escolher outra base
        //
        // $this->assertInstanceOf("pdo", Db::getConexao('outra-base'));
    }
}