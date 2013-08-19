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
		if(!in_array($class, $this->classes))
		{
			$this->classes[$class] = new $class($arguments);
		}
		
		return $this->classes[$class];
	}
}

?>