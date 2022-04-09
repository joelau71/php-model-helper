<?php

namespace MyFirstPackage\Models;

use GuzzleHttp\Client;

class Jake
{
    public static function getContent(){
        $client = new Client();
        $res = $client->request("get", 'https://icanhazdadjoke.com/', [
            'headers' => [
                "Accept" => "text/plain",
            ]
        ]);
        $body = $res->getBody();
        $content = $body->getContents();
        return $content;
    }
}