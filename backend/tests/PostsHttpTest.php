<?php

require __DIR__  . "/../boot.php";

class PostsSelectTest extends PHPUnit_Framework_TestCase
{

    protected $base_uri = "http://192.168.0.122/fulia";

    public function testCrud() {

        $cURL = curl_init();
        curl_setopt($cURL, CURLOPT_URL, $this->base_uri .'/backend/posts/read.php');
        curl_setopt($cURL, CURLOPT_RETURNTRANSFER, TRUE);
        $response = curl_exec($cURL);
        $httpCode = curl_getinfo($cURL, CURLINFO_HTTP_CODE);

        $this->assertEquals(200, $httpCode);

        curl_close($cURL);

    }

}