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
		
	}
	
	public function __Get($key)
	{
		return $this->Instance()->{$key};
	}
}
?>