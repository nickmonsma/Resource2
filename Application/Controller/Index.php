<?php
/**
	Project Resource 2
	Web Application Framework
	Copyright (C) 2013 Nick Monsma;
*/

class Controller_Index extends Application implements Interface_Controller
{
	public function __Construct()
	{
		
	}
	
	public function Render()
	{
		$this->lView->render('page-index');
	}
	
	public function __Get($key)
	{
		return $this->Instance()->{$key};
	}	
}
?>