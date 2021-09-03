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
    "create_master_image" => "VMController@createMasterImage",
    "change_vm_memory_size" => "VMController@changeVmMemorySize",
    "show_vm_memory" => "VMController@showVmMemory",
    "change_num_of_cpu" => "VMController@changeNumOfCpu",

    "assign_vdi" => "ApiController@assignVDI",
    "list_vdi" => "ApiController@listVDI",
    "delete_vdi" => "ApiController@deleteVDI",
    "edit_vdi" => "ApiController@editVDI",
    "check_ldap" => "ApiController@checkLdap",

    "check_configuration" => "ConfigurationController@checkConfiguration",
    "update_configuration_file" => "ConfigurationController@updateConfigurationFile",
    "node_info" => "ConfigurationController@nodeInfo",
    "disk_info" => "ConfigurationController@diskInfo",
    "nodecpustats" => "ConfigurationController@nodeCpuStats",
    "nodememstats" => "ConfigurationController@nodeMemStats",

    "list_images" => "ImagesController@listImages",

    "list_isos" => "IsosController@listIsos"
    
];
