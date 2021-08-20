<?php

use GuzzleHttp\Client;

class ApiController{

    function assignVDI(){

       // $ip = extensionDb('pardus3IP');
       

        $name = request('name');
        $username = request('username');
        $ip = request('ip');
        $port = "5000";
        $url = "http://" . $ip . ":" . $port;
        
        $client = new GuzzleHttp\Client(
            [
                'base_uri' => $url,
                'headers' => ['Content-Type' => 'application/json']
            ]
        );

        $response = $client->request('POST', '/assignVdi', 
        [  
            "json"=> [  
                    "name" => $name,
                    "username"=> $username
                    ]
        ]);
  
        return $response->getBody()->getContents();
    }

}