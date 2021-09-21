<?php
namespace App\Controllers;

use Liman\Toolkit\Shell\Command;

class CrontabManagerController
{
	function getList()
    {
     
        $cmd = Command::run("crontab -l");
        $cmd = explode("\n", $cmd);
        $crons= array();
        for($i=0;$i<count($cmd);$i++){
            if($cmd[$i][0]!="#"){
                array_push($crons, $cmd[$i]);
            }
        }

        foreach ($crons as $key => &$process)
        {
         
            $process = preg_replace('/\s+/', ' ', $process);

            
            $process = explode(" ", $process);
          
            if(count($process)>6){
                for($i=6;$i<count($process);$i++){
                    $process[5]=$process[5]." ".$process[$i];
                }
                
            }
            $process = [
                "minute" => $process[0],
                "hour" => $process[1],
                "day" => $process[2],
                "month" => $process[3],
                "weekdays" => $process[4],
                "command" => $process[5], 
            ];
        }

        return view("table", [
            "value" => $crons,
            "display" => ["minute", "hour", "day", "month", "weekdays", "command"],
            "title" => ["Dakika", "Saat", "Gün", "Ay", "Haftanın Günü", "Komut"],
            "menu" => [
                "Sil" => [
                    "target" => "jsDeleteCrontab",
                    "icon" => "fas fa-trash-alt"
                ]
            ]
        ]);

        
    }

    function addCrontab(){
        validate([
            "minute" => "required|string",
            "hour" => "required|string",
            "day" => "required|string",
            "month" => "required|string",
            "weekday" => "required|string",
            "command" => "required|string"
        ]);
        //(crontab -l ; echo "00 09 * * 1-5 echo hello") | crontab -
        $commandCron = Command::run("(crontab -l ; echo '@{:minute} @{:hour} @{:day} @{:month} @{:weekday} @{:command}') | crontab -", [
            "minute" => request("minute"),
            "hour" => request("hour"),
            "day" => request("day"),
            "month" => request("month"),
            "weekday" => request("weekday"),
            "command" => request("command")
        ]);
        return respond(__("Crontab başarıyla eklendi"),200);
    }

    function removeCrontab(){
        $cmd = Command::run("crontab -r");
        return respond($cmd,200);
    }

    //crontab -l | grep -v '* * * * * pwd'  | crontab -
    function deleteCrontab(){
        validate([
            "minute" => "required|string",
            "hour" => "required|string",
            "day" => "required|string",
            "month" => "required|string",
            "weekday" => "required|string",
            "command" => "required|string"
        ]);
        //(crontab -l ; echo "00 09 * * 1-5 echo hello") | crontab -
        $commandCron = Command::run("crontab -l | grep -v '@{:minute} @{:hour} @{:day} @{:month} @{:weekday} @{:command}' | crontab -", [
            "minute" => request("minute"),
            "hour" => request("hour"),
            "day" => request("day"),
            "month" => request("month"),
            "weekday" => request("weekday"),
            "command" => request("command")
        ]);
        return respond($commandCron,200);
    }
       
}
