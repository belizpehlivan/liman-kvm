<?php

namespace App\Controllers;

use Liman\Toolkit\RemoteTask\TaskManager;
use Liman\Toolkit\Shell\Command;

class VMController
{
    function getVMS(){
        $output = Command::runSudo('virsh list --all');
        $lines = explode("\n",$output);
        $count = count($lines);
        unset($lines[0]); 
        unset($lines[1]);

        for($i=2; $i<$count; $i++)
        {       
            $lines[$i] = preg_replace("/ {2,}/", " ",  $lines[$i]);
            $lines[$i] = explode(" ",  $lines[$i], 4);
        }
        $data = [];

        foreach($lines as $line){
            $data[] = [
                "id" => $line[1],
                "name" => $line[2],
                "state" => $line[3],
            ];
        }

        return view('table', [
            "value" => $data,
            "title" => ["*hidden*", "İSİM", "DURUM"],
            "display" => ["id:id","name", "state"],
            "onclick" => "cpuInfo",
            "menu" => [
                "Başlat" => [
                    "target" => "startMachine",
                    "icon" => "fas fa-play"
                ],
                "Yeniden Başlat" => [
                    "target" => "rebootMachine",
                    "icon" => "fas fa-undo"
                ],
                "Kapat" => [
                    "target" => "shutdownMachine",
                    "icon" => "fas fa-power-off"
                ],
                "Zorla Kapat" => [
                    "target" => "destroyMachine",
                    "icon" => "fas fa-power-off"
                ],
                "Sil" => [
                    "target" => "deleteMachine",
                    "icon" => "fas fa-trash"
                ]
               
            ]
        ]);


    }

    function startMachine(){
        $output = Command::runSudo("virsh start @{:name} 2>&1",[
                "name" => request("name")
        ]);

        if(str_contains($output,"error")){
            return respond($output,201); 
        }
        else
            return respond("Machine started",200);
    }

    function rebootMachine(){
        $output = Command::runSudo("virsh reboot @{:name} 2>&1",[
                "name" => request("name")
        ]);

        if(str_contains($output,"error")){
            return respond($output,201); 
        }
        else
            return respond("Machine is being rebooted",200);
                 
    }

    function shutdownMachine(){
        $output = Command::runSudo("virsh shutdown @{:name} 2>&1",[
                "name" => request("name")
        ]);

        if(str_contains($output,"error")){
            return respond($output,201);
        }
        else
            return respond("Machine is being shutdown",200);       
    }
    function destroyMachine(){
        $output = Command::runSudo("virsh destroy @{:name} 2>&1",[
                "name" => request("name")
        ]);

        if(str_contains($output,"error")){
            return respond($output,201);
        }
        else
            return respond("Machine is destroyed",200);       
    }
    function deleteMachine(){

        Command::runSudo("virsh destroy @{:name} 2> /dev/null",["name" => request("name")]);
        Command::runSudo("virsh undefine @{:name}",["name" => request("name")]);
        Command::runSudo("virsh pool-refresh default",["name" => request("name")]);
        Command::runSudo("virsh vol-delete --pool default @{:name}.qcow2",["name" => request("name")]);
        return respond("dfghfdhjd",200);
    }

    function listCpuInfo(){

        $output = Command::runSudo("virsh vcpuinfo @{:name}",[
            "name" => request("name")
        ]);

        $output = explode("\n\n", $output);
        $data = [];

        for($i=0; $i < count($output); $i++){

            $output[$i] = explode("\n", $output[$i]);
            $output[$i] = preg_replace("/ {2,}/", " ",  $output[$i]);

            foreach($output[$i] as &$line){
                $pos = strripos($line, " ");
                $line = substr($line, $pos+1);                
            }        
            $data[] = [
                "vcpu" =>   $output[$i][0],
                "cpu" =>    $output[$i][1],
                "state" => $output[$i][2],
                "cpu_time" => $output[$i][3],
                "cpu_affinity" => $output[$i][4]
            ];
        }

        return view('table', [
            "value" => $data,
            "title" => ["VCPU", "CPU", "STATE", "CPU TIME", "CPU AFFINITY"],
            "display" => ["vcpu", "cpu", "state", "cpu_time", "cpu_affinity"]
        ]);
    }

    function createVM(){
        Command::runSudo("sudo virt-install --name @{:title} --description 'deneme' --ram=750 --vcpus=2 --os-type=Linux --os-variant=debian10 --disk path=/var/lib/libvirt/images/@{:title}.qcow2,bus=virtio,size=8 --graphics spice,listen=0.0.0.0 --video qxl --channel spicevmc --cdrom @{:location} --network bridge:br0  --noautoconsole",[
            "title" => request("title"),
            "location" => request("location")

        ]);

        return respond("selam",200);
    }
}