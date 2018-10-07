<?php

namespace App\Libraries;

class Dashboard
{
	// private constructor and destructor because of the singleton pattern
	private function __constructor(){}
	private function __destructor(){}

	// singleton pattern
	private static $instance = null;

	public static function main(){
		if(self::$instance == null)
			self::$instance = new Dashboard();
		return self::$instance;
	}

	public function sidebar(){
		return Sidebar::main();
	}
}
