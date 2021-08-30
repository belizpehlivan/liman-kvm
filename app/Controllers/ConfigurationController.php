<?php

namespace App\Controllers;

use Liman\Toolkit\RemoteTask\TaskManager;
use Liman\Toolkit\Shell\Command;

class ConfigurationController
{
    function checkConfiguration(){

        $output = Command::runSudo("cat /usr/share/hvl/vdi/vdi.conf 2>&1");

        if(str_contains($output, "cat:")){
            Command::runSudo("mkdir /usr/share/hvl");
            Command::runSudo("mkdir /usr/share/hvl/vdi");
            Command::runSudo("touch /usr/share/hvl/vdi/vdi.conf");

            return respond("create",200);
        } 
        else{
            if($output == null){return respond("create",200);}
            else{
                $data = [];
                $item = 0;
                $output = explode("\n", $output);
                foreach($output as &$line){
                    $line = explode("= ", $line);
                    if($item != 0){
                        array_push($data,$line[1]);
                    }
                    $item++;
                }
                return respond($data,200);
            }       
        }
    }

    function updateConfigurationFile(){
        
        $ldap_host = request("ldaphost");
        $ldap_basedn = request("ldapbasedn");
        $ldap_username = request("ldapusername");
        $ldap_password = request("ldappassword");
        $host_ip = request("hostip");
        
        $fileName = "vdi.conf";  
//        $fileContent = '\nLDAP_HOST = 192.168.0.199\nLDAP_BASE_DN = dc=staj,dc=lab\nLDAP_USERNAME = cn=serviceuser,cn=Users,dc=staj,dc=lab\nLDAP_PASSWORD = 123123Aa\nHOST_IP = 192.168.0.30';
        $fileContent = "\\nLDAP_HOST = " . "{$ldap_host}" . "\\nLDAP_BASE_DN = " . "{$ldap_basedn}" . "\\nLDAP_USERNAME = " . "{$ldap_username}" . "\\nLDAP_PASSWORD = " . "{$ldap_password}" . "\\nHOST_IP = " . "{$host_ip}";

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
