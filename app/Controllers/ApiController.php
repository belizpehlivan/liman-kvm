<?php

use GuzzleHttp\Client;

class ApiController{

    function listVDI(){
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

        $response = $client->request('GET', '/getAllVdis');
   //     return gettype($response->getBody());//->getContents();

        $list = json_decode($response->getBody()->getContents(),true);

        $data = [];
        foreach($list as $vdi){
            $data[] = [
                "id" => $vdi["id"],
                "name" => $vdi["name"],
                "username" => $vdi["username"]
            ];
        }

        return view('table', [
            "value" => $data,
            "title" => ["ID", "VM İsmi", "Kullanıcı Adı"],
            "display" => ["id", "name", "username"],
            "menu" => [
                "Sil" => [
                    "target" => "deleteVdi",
                    "icon" => "fas fa-trash"
                ],
                "Düzenle" => [
                    "target" => "showEditVdiModal",
                    "icon" => "fas fa-ellipsis-h"
                ]
            ]
        ]);
    }

    function assignVDI(){

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
    
    function deleteVDI(){

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

        $response = $client->request('DELETE', '/deleteVdi', 
        [  
            "json"=> [  
                    "name" => $name,
                    "username"=> $username
                    ]
        ]);
         return $response->getBody()->getContents();
     }

    function editVDI(){

         $name = request('name');
         $username = request('username');
         $new_name = request('new_name');
         var_dump($new_name);
         $new_username = request('new_username');
         $ip = request('ip');
         $port = "5000";
         $url = "http://" . $ip . ":" . $port;
         
         $client = new GuzzleHttp\Client(
            [
                'base_uri' => $url,
                'headers' => ['Content-Type' => 'application/json']
            ]
        );

        $response = $client->request('PATCH', '/editVdi', 
        [  
            "json"=> [  
                    "name" => $name,
                    "username"=> $username,
                    "new_name" => $new_name,
                    "new_username"=> $new_username,
                    ]
        ]);
         return $response->getBody()->getContents();
     }


}