<?php

namespace App\Libraries;

class SidebarElement
{
	public $link = '#';
	public $name = null;
	public $icon = null;
	// never edit this attribute
	public $category = null;

	public $children = array();

	public function __construct($_name, $_link = '#', $_icon = null){
		$this->name = $_name;
		$this->link = $_link;
		$this->icon = $_icon;
	}

	public function add($child){
		array_push($this->children, $child);
	}

	public function is_dropdown(){
		return count($this->children) > 0;
	}
}
