<?php
/**
	Project Resource 2
	Web Application Framework
	Copyright (C) 2013 Nick Monsma;
*/

class Controller_Index extends Resource_Controller
{
	public function __Construct()
	{
		if($this->lUser->loggedin())
		{
			$this->lView->redirect('me');
		}
	}
	
	public function Render()
	{
		$this->lView->render('page-index');
	}
}
?>