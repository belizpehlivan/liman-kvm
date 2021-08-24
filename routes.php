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
    "get_vm_data" => "VMController@getVmData",
    
    "assign_vdi" => "ApiController@assignVDI",
    "list_vdi" => "ApiController@listVDI",
    "delete_vdi" => "ApiController@deleteVDI",
    "edit_vdi" => "ApiController@editVDI",

    "check_configuration" => "VdiController@checkConfiguration",
    "edit_configuration_file" => "VdiController@editConfigurationFile"

];
