<?php

return [
    "index" => "HomeController@index",

    "get_vms" => "VMController@getVMS",
    "start_machine" => "VMController@startMachine",
    "reboot_machine" => "VMController@rebootMachine",
    "shutdown_machine" => "VMController@shutdownMachine",
    "destroy_machine" => "VMController@destroyMachine",
    "delete_machine" => "VMController@deleteMachine",
    "list_cpu_info" => "VMController@listCpuInfo",
    "create_vm" => "VMController@createVM",
    
    "assign_vdi" => "ApiController@assignVDI"

];
