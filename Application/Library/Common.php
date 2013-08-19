<?php
/**
	Project Resource 2
	Web Application Framework
	Copyright (C) 2013 Nick Monsma;
*/

function instance()
{
	return Application::Instance();
}

function __autoload($class)
{
	if(file_exists(ROOT.'Application'.DS.str_replace('_', DS, $class).'.php'))
	{
		include_once(ROOT.'Application'.DS.str_replace('_', DS, $class).'.php');
	}
}

function resource_hash($string)
{
	$count = strlen($string);
	for($i = 0; $i < $count; $i++)
	{
		$hash[] = sha1($count.crypt($count, CRYPT_BLOWFISH));
	}
	
	$hash = substr(count($hash) . implode('_', $hash), 0, 30);
	return strtoupper($hash);
}

function GenerateTicket()
{
	$begin = resource_hash(rand(100,999));
	for($i = 0; $i < 4; $i++)
	{
		$ticket[] = substr(md5($begin.rand(1,9).time()), 0, 5);
	}
	
	return 'Resource-'.strtoupper(implode('-', $ticket).rand(10,99)).'-'.rand(10,99);
}

function shortname($classname)
{
	return strtolower(substr($classname, 0, 1)) . explode('_', $classname)[count(strpos($classname, '_'))];
}
?>