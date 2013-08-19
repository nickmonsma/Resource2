<?php
/**
	Project Resource 2
	Web Application Framework
	Copyright (C) 2013 Nick Monsma;
*/

class Controller_Community_Staff extends Application implements Interface_Controller
{
	public function __Construct()
	{
		
	}
	
	public function Render()
	{
		echo 'is there a staff here?';
	}
	
	public function __Get($key)
	{
		return $this->Instance()->{$key};
	}	
}
?>