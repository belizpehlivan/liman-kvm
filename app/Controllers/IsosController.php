<?php

namespace App\Controllers;

use Liman\Toolkit\RemoteTask\TaskManager;
use Liman\Toolkit\Shell\Command;

class IsosController{
    function listIsos(){
        $output = command::runSudo("virsh vol-list isos");
        $output = explode("\n ", $output);
        array_splice($output, 0, 1);
        $data = [];
        foreach($output as &$line){
            $line = preg_replace("/ {2,}/", " ",  $line);
            $line = explode(" ",  $line);
            $data[]=[
                "name" => $line[0],
                "path" => $line[1],
            ];
        }
        
        return view('table', [
            "value" => $data,
            "title" => ["İsim", "Dosya Yolu"],
            "display" => ["name", "path"]
        ]);
    }
}