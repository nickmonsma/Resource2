<?php
/**
	Project Resource 2
	Web Application Framework
	Copyright (C) 2013 Nick Monsma;
*/

class Library_Handler_User
{
	private $instance;
	
	public function __Construct()
	{
		$this->instance = instance();
		if($this->loggedin())
		{
			
		}
	}
	
	public function loggedin()
	{
		return isset($_SESSION['habbo']);
	}
	
	private function FetchInformation()
	{
		$result = $this->instance->rModel->driver->prepare('SELECT * FROM users WHERE username = ?');
	}
	
	public function __Get($key)
	{
		if(!isset($this->session->{$key}))
		{
			return false;
		}
		
		return $this->session->{$key};
	}
	
	public function __Set($key, $value)
	{
		if(!isset($this->session->{$key}))
		{
			return false;
		}
		
		return $this->session->{$key} = $value;
	}
}
?>