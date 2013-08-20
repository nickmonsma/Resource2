<?php
/**
	Project Resource 2
	Web Application Framework
	Copyright (C) 2013 Nick Monsma;
*/

class Controller_Housekeeping extends Resource_Controller
{
	public function __Construct()
	{
		$this->lView->redirect('housekeeping/login');
	}
}
?>