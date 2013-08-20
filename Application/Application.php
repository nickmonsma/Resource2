<?php
/**
	Project Resource 2
	Web Application Framework
	Copyright (C) 2013 Nick Monsma;
*/

class Application
{
	public static $instance;
	
	public static function Instance()
	{
		return self::$instance;
	}
	
	public function __Construct()
	{
		$this->FilterRequests();
		
		self::$instance =& $this;
		
		$this->load = new Loader();
		
		$this->load->Resource_Config();
		
		$this->load->Resource_Model();
		
		$this->load->Resource_View();
		
		$this->load->Resource_Controller();
	}
	
	private function FilterRequests()
	{
		foreach($_GET as $key => $value)
		{
			$_GET[$key] = clean($value);
		}
		
		foreach($_POST as $key => $value)
		{
			$_POST[$key] = clean($value);
		}
	}
}
?>