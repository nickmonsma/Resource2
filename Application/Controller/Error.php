<?php
/**
	Project Resource 2
	Web Application Framework
	Copyright (C) 2013 Nick Monsma;
*/

class Controller_Error extends Application implements Interface_Controller
{
	public function __Construct()
	{
		
	}
	
	public function Render()
	{
		echo '404 brah what do you have expect ?';
	}
	
	public function __Get($key)
	{
		return $this->Instance()->{$key};
	}	
}
?>