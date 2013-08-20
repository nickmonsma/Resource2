<?php
/**
	Project Resource 2
	Web Application Framework
	Copyright (C) 2013 Nick Monsma;
*/

class Library_User extends Application
{
	public function __Construct()
	{
		if($this->loggedin())
		{
			if(isset($_SESSION['habbo']['time']) && $_SESSION['habbo']['time'] < time())
			{
				return null;
			}
			
			$result = $this->rModel->driver->prepare('SELECT * FROM users WHERE username = ?')->bind_param($this->get('username'))->execute();
			
			foreach($result->fetch_assoc() as $key => $value)
			{
				$_SESSION['habbo'][$key] = $value;
			}
			
			$_SESSION['habbo']['time'] = time() + 450;
		}
	}
	
	public function loggedin()
	{
		return $this->get('username');
	}
	
	public function update($key, $value, $username = null)
	{
		if(is_null($username) || $username = $this->get('username'))
		{
			$this->set($key, $value);
			$username = $this->get('username');
		}
		
		$this->rModel->driver->prepare('UPDATE users SET '.$key.' = ? WHERE username = ? LIMIT 1')->bind_param($value, $username)->execute();
	}
	
	public function get($key)
	{
		if(!isset($_SESSION['habbo'][$key]))
		{
			return;
		}		
		
		return $_SESSION['habbo'][$key];
	}
	
	public function set($key, $value)
	{
		if(!isset($_SESSION['habbo'][$key]))
		{
			return;
		}
		
		$_SESSION['habbo'][$key] = $value;
	}
	
	public function __Get($key)
	{
		return $this->Instance()->{$key};
	}
}
?>