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
		$this->load->Library_User();
	}
	
	public function Initialize()
	{
		foreach($this->load->url as $key => $value)
		{
			$class[] = ucfirst($value);
		}
		
		$class = implode(DS, $class);
		$classname = 'Controller_'.str_replace(DS, '_', $class);
		
		if(file_exists(ROOT.'Application'.DS.'Controller'.DS.$class.'.php'))
		{
			$this->load->$classname()->Render();
		}
		else
		{
			$this->load->Controller_Error()->Render();
		}
		
		die($this->lView->execute()); ## build the template;
	}
	
	public function __Get($key)
	{
		return $this->Instance()->{$key};
	}
}
?>