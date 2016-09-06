<?php

require_once "backend/Db.php";
require "backend/Posts.php";

class PostsTest extends PHPUnit_Framework_TestCase
{

    public function testCrud() {

        #
        # Create
        #
        $post = new Posts;
        $post->url            = "foo/";
        $post->titulo         = "Foo";
        $post->resumo         = "Apenas um foo";
        $post->keywords       = "foodie";
        $post->nivel          = "intermediario";
        $post->secao          = "php";
        $post->autor          = "euzinho";
        $post->dt_atualizacao = "2013-04-10";
        $post->dt_criacao     = "2013-04-10";
        $post->ordem          = 9;
        $this->assertTrue($post->create());

        $lastInsertId = $post->id;


        #
        # Read
        #
        $post = new Posts($lastInsertId);

        $this->assertTrue($post->read());
        $this->assertEquals("Foo", $post->titulo);

        # or...

        $post = new Posts;
        $post->id = $lastInsertId;
        $post->read();

        $this->assertTrue($post->read());
        $this->assertEquals("Foo", $post->titulo);


        #
        # Update
        #
        $post = new Posts($lastInsertId);
        $post->read();
        $post->titulo = "New Foo";
        $this->assertTrue($post->update());
        $this->assertEquals("New Foo", $post->titulo);


        #
        # Delete
        #
        $post = new Posts($lastInsertId);
        $post->read();
        $this->assertTrue($post->delete());

    }

}