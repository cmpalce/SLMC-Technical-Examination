<?php

namespace App;

class RestApi
{
    public function fetch($url)
    {
        $client = new \GuzzleHttp\Client();
        $res = $client->request('GET', $url);
        return json_decode($res->getBody()->getContents());
    }
}
