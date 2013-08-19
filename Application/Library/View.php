<?php
/**
	Project Resource 2
	Web Application Framework
	Copyright (C) 2013 Nick Monsma;
*/

class Library_View extends Resource_View
{
	private $theme;
	
	public function __Construct()
	{
		$this->theme = $this->rConfig->site->theme;
	}
	
	public function parse($line)
	{
		parent::$tpl[] = $line;
	}
	
	public function assign($key, $value)
	{
		parent::$params['[$'.$key.']'] = $value;
	}	
	
	public function redirect($location = null)
	{
		return header("location: {$this->rConfig->site->url}/{$location}");
	}	
	
	public function render($file)
	{
		parent::$tpl[] = file_get_contents(ROOT.'Public'.DS.'Themes'.DS.$this->theme.DS.$file.'.html');
	}
}
?>