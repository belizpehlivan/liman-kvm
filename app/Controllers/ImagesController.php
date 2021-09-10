<?php
namespace App\Controllers;
use Liman\Toolkit\RemoteTask\TaskManager;
use Liman\Toolkit\Shell\Command;

class ImagesController
{
	function listImages(){
        $output = command::runSudo("virsh vol-list images");
        $output = explode("\n ", $output);
        array_splice($output, 0, 1);
        $data = [];
        foreach($output as &$line){
            $line = preg_replace("/ {2,}/", " ",  $line);
            $line = explode(" ",  $line);
            $filepath = $line[1];
            $isExist = Command::runSudo("test -e $filepath && echo 'Found' || echo 'Not found'");
            if($isExist == 'Found')
            {
                $data[]=[
                "name" => $line[0],
                "path" => $line[1],
                ];
            }
        }
        return view('table', [
            "value" => $data,
            "title" => ["İsim", "Dosya Yolu"],
            "display" => ["name", "path"]
        ]);
    }
}
