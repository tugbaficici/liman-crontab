<?php
namespace App\Controllers;

use Liman\Toolkit\Shell\Command;

class FolderManagerController
{
	function getList()
    {
        // Komut çalıştırdık
        $cmd = Command::runSudo("ls -la");

        // Komutu newline ile böldük
        $cmd = explode("\n", $cmd);

        // İlk satırı attık
        array_splice($cmd, 0, 1);
        //return respond($cmd);
        // her satır üzerinde işlem yapalım.
        foreach ($cmd as $key => &$process)
        {
            // fazlalık boşluklarımı sildim
            $process = preg_replace('/\s+/', ' ', $process);

            // boşluklara göre parçalayalım
            $process = explode(" ", $process);
            $process[5] = $process[5]."-".$process[6]."-".$process[7];
            // veriyi formatlayalim
            $process = [
                "permission" => $process[0],
                "links" => $process[1],
                "owner" => $process[2],
                "group" => $process[3],
                "size" => $process[4],
                "month-day-time" => $process[5],
                "name" => $process[8]
                
            ];
        }

        return view("table", [
            "value" => $cmd,
            "display" => ["permission", "links", "owner", "group", "size", "month-day-time", "name"],
            "title" => ["Yetki", "Bağlantı Sayısı", "Sahip", "Grup", "Boyut(byte)", "Ay-Gün-Zaman", "İsim"],
            "menu" => [
                "Sil" => [
                    "target" => "jsDeleteFile",
                    "icon" => "fas fa-trash-alt"
                ]
            ]
        ]);
        
    }

    function deleteFile(){
        validate([
            "name" => "required|string"
        ]);

        $location = Command::runSudo("rm -rf @{:name}", [
            "name" => request("name")
        ]);

        return respond($location,200);
    }
    
    function createFile(){
        validate([
            "fileName" => "required|string"
        ]);

        $location = Command::runSudo("touch @{:fileName}", [
            "fileName" => request("fileName")
        ]);

        return respond($location,200);
    }

    function createFolder(){
        validate([
            "folderName" => "required|string"
        ]);

        $location = Command::runSudo("mkdir @{:folderName}", [
            "folderName" => request("folderName")
        ]);

        return respond($location,200);
    }
}
