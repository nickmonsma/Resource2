<?php
/**
	Project Resource 2
	Web Application Framework
	Copyright (C) 2013 Nick Monsma;
*/

interface Interface_Controller
{
	public function __Construct();
	
	public function Render();
	
	public function __Get($key);
}
?>