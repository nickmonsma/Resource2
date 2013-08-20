<?php
/**
	Project Resource 2
	Web Application Framework
	Copyright (C) 2013 Nick Monsma;
*/

class Library_View extends Resource_View
{
	private $theme, $content = array(), $params = array();
	
	public function __Construct()
	{
		$this->theme = $this->rConfig->site->theme;
	}
	
	public function setTheme($theme)
	{
		$this->theme = $theme;
	}
	
	public function parse($line)
	{
		$this->content[] = $line;
	}
	
	public function assign($key, $value)
	{
		$this->params['[$'.$key.']'] = $value;
	}	
	
	public function redirect($location = null)
	{
		return header("location: {$this->rConfig->site->url}/{$location}");
	}
	
	public function render($file)
	{
		$this->content[] = $this->fetch($file);
	}
	
	public function fetch($file)
	{
		return file_get_contents(ROOT.'Public'.DS.'Themes'.DS.$this->theme.DS.$file.'.html');
	}
	
	public function replace($content)
	{
		return strtr($content, $this->params);
	}
	
	public function execute()
	{
		return $this->replace(implode($this->content));
	}
}
?>