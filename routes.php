<?php

return [
    "index" => "HomeController@index",

    // Tasks
    "runTask" => "TaskController@runTask",
    "checkTask" => "TaskController@checkTask",

    // Hostname Settings
    "get_hostname" => "HostnameController@get",
    "set_hostname" => "HostnameController@set",

    // Systeminfo
    "get_system_info" => "SystemInfoController@get",
    "install_lshw" => "SystemInfoController@install",

    // Runscript
    "run_script" => "RunScriptController@run",

    // TaskView
    "example_task" => "TaskViewController@run",

    // Task Manager Routes
    "task_manager_list" => "TaskManagerController@getList",
    "get_file_location" => "TaskManagerController@getFileLocation",
    "get_service_status" => "TaskManagerController@getServiceStatus",
    "kill_process" => "TaskManagerController@killProcess",
    "command_arg" => "TaskManagerController@getCommandArg",
    "process_tree" => "TaskManagerController@getProcessTree",
    "killall_process" => "TaskManagerController@getKillallProcess",

    // Folder Manager Routes
    "get_folder_list" => "FolderManagerController@getList",
    "delete_file" => "FolderManagerController@deleteFile",
    "create_file" => "FolderManagerController@createFile",
    "create_folder" => "FolderManagerController@createFolder",

    // Crontab Manager Routes
    "get_crontab_list"=> "CrontabManagerController@getList",
    "add_crontab" => "CrontabManagerController@addCrontab",
    "remove_crontab" => "CrontabManagerController@removeCrontab",
    "delete_crontab" => "CrontabManagerController@deleteCrontab",
    "update_crontab" => "CrontabManagerController@updateCrontab"

];
