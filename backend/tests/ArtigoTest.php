<?php

require __DIR__  . "/../boot.php";

class ArtigoTest extends PHPUnit_Framework_TestCase
{

    public function testCrud() {

        #
        # Create
        #
        $artigo = new Artigo;
        $artigo->url            = "foo/";
        $artigo->titulo         = "Foo";
        $artigo->resumo         = "Apenas um foo";
        $artigo->keywords       = "foodie";
        $artigo->nivel          = "intermediario";
        $artigo->secao          = "php";
        $artigo->autor          = "euzinho";
        $artigo->dt_atualizacao = "2013-04-10";
        $artigo->dt_criacao     = "2013-04-10";
        $artigo->ordem          = 9;
        $this->assertTrue($artigo->create());

        $lastInsertId = $artigo->id;


        #
        # Read
        #
        $artigo = new Artigo($lastInsertId);

        $this->assertTrue($artigo->read());
        $this->assertEquals("Foo", $artigo->titulo);

        # or...

        $artigo = new Artigo;
        $artigo->id = $lastInsertId;
        $artigo->read();

        $this->assertTrue($artigo->read());
        $this->assertEquals("Foo", $artigo->titulo);


        #
        # Update
        #
        $artigo = new Artigo($lastInsertId);
        $artigo->read();
        $artigo->titulo = "New Foo";
        $this->assertTrue($artigo->update());
        $this->assertEquals("New Foo", $artigo->titulo);


        #
        # Delete
        #
        $artigo = new Artigo($lastInsertId);
        $artigo->read();
        $this->assertTrue($artigo->delete());

    }

}