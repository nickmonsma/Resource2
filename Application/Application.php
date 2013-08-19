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
		self::$instance =& $this;
		
		$this->load = new Loader();
		
		$this->load->Resource_Config();
		
		$this->load->Resource_Model();
		
		$this->load->Resource_View();
		
		$this->load->Resource_Controller();
	}
}
?>