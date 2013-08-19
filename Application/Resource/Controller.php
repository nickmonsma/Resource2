<?php
/**
	Project Resource 2
	Web Application Framework
	Copyright (C) 2013 Nick Monsma;
*/

class Resource_Controller extends Application
{	
	public function __Construct()
	{	
		
	}
	
	public function Initialize()
	{
		foreach($this->load->url as $key => $value)
		{
			$class[] = ucfirst($value);
		}
		
		$path = implode(DS, $class);
		$name = 'Controller_'.str_replace(DS, '_', $path);
		
		if(file_exists(ROOT.'Application'.DS.'Controller'.DS.$path.'.php'))
		{
			$this->load->$name()->Render();
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