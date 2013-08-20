<?php
/**
	Project Resource 2
	Web Application Framework
	Copyright (C) 2013 Nick Monsma;
*/

class Resource_View
{	
	public function __Construct()
	{
		$this->load->Library_View();
		
		$this->InitializeParameters();
	}
	
	private function InitializeParameters()
	{
		if(isset($_SESSION['habbo']))
		{
			$this->InitializeUser();
		}
		
		if($_SERVER['REQUEST_METHOD'] == 'POST')
		{
			$this->InitializePOST();
		}
		
		foreach($this->rConfig->site as $key => $value)
		{
			$this->lView->assign('site->'.$key, $value);
		}
	}
	
	private function InitializeUser()
	{	
		foreach($_SESSION['habbo'] as $key => $value)
		{
			$this->lView->assign('user->'.$key, $value);
		}
	}
	
	private function InitializePOST()
	{
		foreach($_POST as $key => $value)
		{
			$this->lView->assign('post->'.$key, $value);
		}
	}
	
	public function __Get($key)
	{
		return instance()->{$key};
	}
}
?>