<?php
/**
	Project Resource 2
	Web Application Framework
	Copyright (C) 2013 Nick Monsma;
*/

function Instance()
{
	return Application::Instance();
}

function __autoload($class)
{
	$location = ROOT.'Application'.DS.str_replace('_', DS, $class).'.php';
	if(!file_exists($location))
	{
		return; ## NULL;
	}
	
	include($location);
}
?>