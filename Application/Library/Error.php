<?php
/**
	Project Resource 2
	Web Application Framework
	Copyright (C) 2013 Nick Monsma;
*/

class Library_Error
{
	private $instance;
	
	public function __Construct()
	{
		$this->instance = instance();
		
		$this->Initialize();
		
		##TODO: Log errors & exception in logfiles;
	}
	
	private function Initialize()
	{
		set_error_handler(array($this, 'error_handler'));
		 
		set_exception_handler(array($this, 'exception_handler'));
	}
	
	private function error_handler($code, $message, $file, $line)
	{
		$error = new Library_View();
		$error->render('simple'.DS.'custom'.DS.'error');
		
		$error->assign('date_time', nicetime(time()));
		$error->assign('webserver', $_SERVER['SERVER_SOFTWARE']);
		$error->assign('php_version', 'PHP '.PHP_VERSION.' ('.PHP_OS.')');		
		
		$error->assign('error->code', $code);
		$error->assign('error->message', $message);
		$error->assign('error->file', $file);
		$error->assign('error->line', $line);
		
		return die($error->execute());
	}
	
	private function exception_handler($exception)
	{
		$rule = array();
		foreach($exception as $key => $value)
		{
			$rule[strtolower($key)] = $value;
		}
		
		foreach($rule['gettrace'] as $key => $value)
		{
			$rule[strtolower($key)] = $value;
		}
		
		$error = new Library_View();
		$error->render('simple'.DS.'custom'.DS.'exception');
		
		$error->assign('date_time', nicetime(time()));
		$error->assign('webserver', $_SERVER['SERVER_SOFTWARE']);
		$error->assign('php_version', 'PHP '.PHP_VERSION.' ('.PHP_OS.')');
		
		$error->assign('error->message', $rule['getmessage']);
		$error->assign('error->file', $rule['getfile']);
		$error->assign('error->line', $rule['getline']);
		$error->assign('error->code', $rule['getcode']);
		$error->assign('error->class', get_class($exception));
		$error->assign('error->function', $rule['function']);
		
		return die($error->execute());
	}
}
?>