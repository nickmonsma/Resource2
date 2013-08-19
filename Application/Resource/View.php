<?php
/**
	Project Resource 2
	Web Application Framework
	Copyright (C) 2013 Nick Monsma;
*/

class Resource_View
{
	protected static $tpl = array(), $params = array();
	
	public function __Construct()
	{
		$this->load->Library_View();
	}
	
	public function __Get($key)
	{
		return instance()->{$key};
	}
	
	public function Output()
	{
		return print(strtr(implode(self::$tpl), self::$params));
	}
}
?>