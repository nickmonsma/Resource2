<?php
/**
	Project Resource 2
	Web Application Framework
	Copyright (C) 2013 Nick Monsma;
*/

class Controller_Housekeeping_Login extends Resource_Controller
{
	public function __Construct()
	{		
		$this->lView->setTheme('Housekeeping');
	}
	
	public function Render()
	{
		$this->lView->render('page-index');
	}
}
?>