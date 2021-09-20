<?php
namespace App\Controllers;

use Liman\Toolkit\Shell\Command;

class HostnameController
{
	public function get()
	{
		$deger = Command::runSudo("whoami");

		return respond($deger, 200);
	}

	public function set()
	{
		validate([
			'hostname' => 'required|string'
		]);

		$deger = Command::run("echo ", [
			"degiskenIsmi" => request("hostname")
		]);
		

	}
}
