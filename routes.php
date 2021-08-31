<?php

return [
    "index" => "HomeController@index",

    "get_vms" => "VMController@getVMS",
    "start_machine" => "VMController@startMachine",
    "reboot_machine" => "VMController@rebootMachine",
    "shutdown_machine" => "VMController@shutdownMachine",
    "destroy_machine" => "VMController@destroyMachine",
    "delete_machine" => "VMController@deleteMachine",
    "create_vm" => "VMController@createVM",
    "get_vm_data" => "VMController@getVmData",
    "list_cpu_info" => "VMController@listCpuInfo",
    "vm_disk_size" => "VMController@VmDiskSize",

    "assign_vdi" => "ApiController@assignVDI",
    "list_vdi" => "ApiController@listVDI",
    "delete_vdi" => "ApiController@deleteVDI",
    "edit_vdi" => "ApiController@editVDI",

    "check_configuration" => "ConfigurationController@checkConfiguration",
    "update_configuration_file" => "ConfigurationController@updateConfigurationFile",
    "ldap_check" => "ApiController@ldapCheck"
    
];
