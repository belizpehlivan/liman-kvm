<?php

namespace App\Controllers;

use Liman\Toolkit\RemoteTask\TaskManager;
use Liman\Toolkit\Shell\Command;

class VdiController
{
    function checkConfiguration(){

        $output = Command::runSudo("cat /usr/share/hvl/vdi/vdi.conf 2>&1");
        if(str_contains($output, "cat:")){
            return respond("not exists",200);
        } 
        else{
            $output = explode("\n", $output, 2);
            return respond($output[1],200);
        }
    }

    function editConfigurationFile(){

        Command::runSudo("mkdir /usr/share/hvl");
        Command::runSudo("mkdir /usr/share/hvl/vdi");

        $fileName = "vdi.conf";  
        $fileContent = '\nLDAP_HOST = 192.168.0.199\nLDAP_BASE_DN = dc=staj,dc=lab\nLDAP_USERNAME = cn=serviceuser,cn=Users,dc=staj,dc=lab\nLDAP_PASSWORD = 123123Aa\nHOST_IP = 192.168.0.30';

        $result = Command::runSudo(
            "sh -c \"echo '[vdi]'@{:fileContent} | tee /usr/share/hvl/vdi/@{:fileName}\"",
            [
                'fileContent' => $fileContent,
                'fileName' => $fileName
                
            ]
        );
        return respond($result, 200);
    }
}
