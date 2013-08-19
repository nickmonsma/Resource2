<?php
/**
	Project Resource 2
	Web Application Framework
	Copyright (C) 2013 Nick Monsma;
*/
 
class Loader
{
	public $classes = array();
	
	public function __Construct()
	{
		
	}
	
	public function __Call($class, $arguments = null)
	{
		$instance = instance();
		if(!isset($this->classes[$class]))
		{
			$this->classes[$class] = new $class($arguments);
		}
		
		$shortname = shortname($class);
		if(!isset($instance->{$shortname}) && !is_null($class))
		{
			$instance->{$shortname} = $this->classes[$class];
		}
		
		return $this->classes[$class];
	}
}
?>