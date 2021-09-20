<?php
namespace App\Controllers;

use Liman\Toolkit\Shell\Command;

class TaskManagerController
{
	function getList()
    {
        // Komut çalıştırdık
        $cmd = Command::runSudo("ps -Ao user,pid,pcpu,stat,unit,pmem,comm --sort=-pcpu");

        // Komutu newline ile böldük
        $cmd = explode("\n", $cmd);

        // İlk satırı attık
        array_splice($cmd, 0, 1);

        // her satır üzerinde işlem yapalım.
        foreach ($cmd as $key => &$process)
        {
            // fazlalık boşluklarımı sildim
            $process = preg_replace('/\s+/', ' ', $process);

            // boşluklara göre parçalayalım
            $process = explode(" ", $process);

            // veriyi formatlayalim
            $process = [
                "user" => $process[0],
                "pid" => $process[1],
                "cpu" => $process[2],
                "status" => $process[3],
                "service" => $process[4],
                "ram" => $process[5],
                "command" => $process[6]
            ];
        }

        return view("table", [
            "value" => $cmd,
            "display" => ["user", "pid", "cpu", "status", "service", "ram", "command"],
            "title" => ["Kullanıcı", "PID", "% İşlemci", "Durum", "Servis", "% Bellek", "İşlem"],
            "menu" => [
                "Dosya Konumu" => [
                    "target" => "jsGetFileLocation",
                    "icon" => "fa-location-arrow"
                ],
                "Çalıştırma Argümanları" => [
                    "target" => "jsGetCommandArg",
                    "icon" => "fas fa-running"
                ],
                "İşlem Ağacı" => [
                    "target" => "jsGetProcessTree",
                    "icon" => "fas fa-network-wired"
                ],
                "Servis Detayları" => [
                    "target" => "jsGetServiceStatus",
                    "icon" => "fa-server"
                ],
                "İşlemi Sonlandır" => [
                    "target" => "jsKillProcess",
                    "icon" => "fa-times-circle"
                ],
                "Tüm İşlemleri Sonlardır" => [
                    "target" => "jsKillAllProcess",
                    "icon" => "fa-skull"
                ]
                
            ]
        ]);
    }

    function getFileLocation()
    {
        validate([
            "pid" => "required|numeric"
        ]);

        $location = Command::runSudo("readlink -f /proc/@{:pid}/exe", [
            "pid" => request("pid")
        ]);

        return respond($location);
    }

    function getServiceStatus(){
        validate([
            "service" => "required|string"
        ]);

        $serviceStatus = Command::runSudo("systemctl status @{:service}", [
            "service" => request("service")
        ]);

        return respond($serviceStatus);
    }
    function killProcess(){
        validate([
            "pid" => "required|numeric"
        ]);

        $killProcess = Command::runSudo("kill @{:pid}", [
            "pid" => request("pid")
        ]);

        return respond($killProcess,200);
    }
    function getCommandArg(){
        validate([
            "pid" => "required|numeric"
        ]);

        $commandArgs = Command::runSudo("xargs -0 < /proc/@{:pid}/cmdline ", [
            "pid" => request("pid")
        ]);

        return respond($commandArgs);
    }

    function getProcessTree(){
        validate([
            "pid" => "required|numeric"
        ]);

        $processTree = Command::runSudo("pstree @{:pid}", [
            "pid" => request("pid")
        ]);

        return respond($processTree);
    }

    function getKillallProcess(){
        validate([
            "pid" => "required|numeric"
        ]);

        $killall = Command::runSudo("kill -TERM  @{:pid}", [
            "pid" => request("pid")
        ]);

        return respond($killall,200);
    }
}
