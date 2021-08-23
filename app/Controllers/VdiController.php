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

        $output = Command::run("cd /usr/share/hvl/vdi 2>&1");
        if(str_contains($output, "bash")){
            Command::runSudo("mkdir /usr/share/hvl/vdi");
          
        }
        Command::runSudo("touch /usr/share/hvl/vdi/vdi.conf");

        /*
        Command::runSudo("echo '[vdi]' >> /usr/share/hvl/vdi/vdi.conf");
        Command::runSudo("echo 'LDAP_HOST = 192.168.0.199' >> /usr/share/hvl/vdi/vdi.conf");
        Command::runSudo("echo 'LDAP_BASE_DN = dc=staj,dc=lab' >> /usr/share/hvl/vdi/vdi.conf");
        Command::runSudo("echo 'LDAP_USERNAME = cn=serviceuser,cn=Users,dc=staj,dc=lab' >> /usr/share/hvl/vdi/vdi.conf");
        Command::runSudo("echo 'LDAP_PASSWORD = 123123Aa' >> /usr/share/hvl/vdi/vdi.conf");
        Command::runSudo("echo 'HOST_IP = 192.168.0.30' >> /usr/share/hvl/vdi/vdi.conf");
        */
        
        Command::runSudo("echo '[vdi]' >> /usr/share/hvl/vdi/vdi.conf");
        Command::runSudo("echo 'LDAP_HOST = @{:host}' >> /usr/share/hvl/vdi/vdi.conf",[
            "host" => request("ldap-host")
        ]);
        Command::runSudo("echo 'LDAP_BASE_DN = @{:basedn}' >> /usr/share/hvl/vdi/vdi.conf",[
            "basedn" => request("ldap-basedn")
        ]);
        Command::runSudo("echo 'LDAP_USERNAME = @{:username}' >> /usr/share/hvl/vdi/vdi.conf",[
            "username" => request("ldap-username")
        ]);
        Command::runSudo("echo 'LDAP_PASSWORD = @{:password}' >> /usr/share/hvl/vdi/vdi.conf",[
            "password" => request("ldap-password")
        ]);
        Command::runSudo("echo 'HOST_IP = @{:ip}' >> /usr/share/hvl/vdi/vdi.conf",[
            "ip" => request("host-ip")
        ]);
       
     /*  $output = Command::runSudo("cat > vdi.conf << EOF
       [vdi]
       LDAP_HOST = 192.168.0.199
       LDAP_BASE_DN = dc=staj,dc=lab
       LDAP_USERNAME = cn=serviceuser,cn=Users,dc=staj,dc=lab
       LDAP_PASSWORD = 123123Aa
       HOST_IP = 192.168.0.30
       EOF"); */
       $output = Command::runSudo("cat /usr/share/hvl/vdi/vdi.conf");
       return respond($output, 200);
    }
       
}
