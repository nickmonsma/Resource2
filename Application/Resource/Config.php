<?php
/**
	Project Resource 2
	Web Application Framework
	Copyright (C) 2013 Nick Monsma;
*/

class Resource_Config
{
	private $config;
	
	public function __Get($key)
	{
		return $this->config->{$key};
	}
	
	public function __Construct()
	{
		$this->config = $this->GrabConfiguration();
	}
	
	private function GrabConfiguration()
	{
		if(file_exists(ROOT.'Config'.DS.'Config.php'))
		{
			$config = include(ROOT.'Config'.DS.'Config.php');
			return json_decode(base64_decode($config));
		}
		
		return; ##TODO: Install Controller;
	}
	
	public function Replace($parent, $key, $value)
	{
		$this->config->{$parent}->{$key} = $value;
		$config = base64_encode(json_encode($this->config));
		file_put_contents(ROOT.'Config'.DS.'Config.php', "<?php defined('ROOT') or die; return '{$config}'; ?>");
	}
}
?>