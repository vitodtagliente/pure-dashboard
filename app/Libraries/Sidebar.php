<?php

namespace App\Libraries;

class Sidebar
{
	// private constructor and destructor because of the singleton pattern
	private function __constructor(){}
	private function __destructor(){}

	// singleton pattern
	private static $instance = null;

	public static function main(){
		if(self::$instance == null)
			self::$instance = new Sidebar();
		return self::$instance;
	}

	// array of modules
	private $_modules = array();
	// array of module categories ordered by name
	private $_categories = array();

	// register a module
	public function register($module, $category = null)
	{
		if($category)
		{
			if(!in_array($category, $this->_categories))
				array_push($this->_categories, $category);
			// order categories by name
			sort($this->_categories);
			// set the category
			$module->category = $category;
		}
		array_push($this->_modules, $module);
	}

	// return the array of modules by category
	public function modules($category = null){
		$items = array();
		foreach($this->_modules as $module){
			if($module->category == $category)
				array_push($items, $module);
		}
		return $items;
	}

	// return the list of categories
	public function categories(){
		return $this->_categories;
	}
}
