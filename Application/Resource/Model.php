<?php
/**
	Project Resource 2
	Web Application Framework
	Copyright (C) 2013 Nick Monsma;
*/

class Resource_Model extends Application
{
	public $driver;
	
	public function __Construct()
	{
		$this->InitializeDriver('Model_Database_'.$this->rConfig->database->driver);
	}
	
	private function InitializeDriver($driver)
	{
		$this->driver = $this->load->$driver();
	}
	
	public function __Get($key)
	{
		return $this->Instance()->{$key};
	}
}
?>