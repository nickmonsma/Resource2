<?php
/**
	Project Resource 2
	Web Application Framework
	Copyright (C) 2013 Nick Monsma;
*/

class Application
{
	public static $instance;
	
	public $Config, $Model, $Controller;
	
	public static function Instance()
	{
		return self::$instance;
	}
	
	public function __Construct()
	{
		self::$instance =& $this;
		
		$this->load = new Loader();
		
		$this->InitializeConfig();
		
		$this->InitializeModel();
		
		$this->InitializeController();
	}
	
	private function InitializeConfig()
	{
		$this->Config = $this->load->Resource_Config();
	}
	
	private function InitializeModel()
	{
		$this->Model = $this->load->Resource_Model();
	}
	
	private function InitializeController()
	{
		$this->Controller = $this->load->Resource_Controller();
	}
}
?>