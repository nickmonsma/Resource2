<?php
/**
	Project Resource 2
	Web Application Framework
	Copyright (C) 2013 Nick Monsma;
*/

class Resource_Controller extends Application
{
	private $name;
	
	public function __Construct()
	{	
		if(strlen($_GET['page']) == 0)
		{
			$_GET['page'] = 'index';
		}
		
		$this->Controller(explode('/', $_GET['page']));
	}
	
	private function Controller($page)
	{
		foreach($page as $key => $value)
		{
			$request[] = ucfirst($value);
		}
		
		$this->name = implode(DS, $request);
	}
	
	public function Initialize()
	{
		$classname = 'Controller_'.str_replace(DS, '_', $this->name);
		if(file_exists(ROOT.'Application'.DS.'Controller'.DS.$this->name.'.php'))
		{
			$this->load->$classname()->Render();
		}
		else
		{
			$this->load->Controller_Error()->Render();
		}
	}
	
	public function __Get($key)
	{
		return $this->Instance()->{$key};
	}
}
?>