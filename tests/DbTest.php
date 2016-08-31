<?php

require "backend/Db.php";

class DbTest extends PHPUnit_Framework_TestCase
{

    public function testConectar() {
        $this->assertInstanceOf("pdo", Db::conectar());
    }

    public function testGetConexao() {

        $this->assertInstanceOf("pdo", Db::getConexao());

        //$this->assertInstanceOf("pdo", Db::getConexao('outra-base'));
    }
}