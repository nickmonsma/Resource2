<?php
/**
	Project Resource 2
	Web Application Framework
	Copyright (C) 2013 Nick Monsma;
*/
 
class Model_Database_PDO extends Resource_Model
{
	private $link, $stmt, $params = null, $hostname, $username, $password, $database;
	
	public function __Construct()
	{
		foreach($this->rConfig->database as $key => $value)
		{
			$this->{$key} = $value;
		}
		
		if(!isset($this->link))
		{
			$this->link = new PDO("mysql:dbname={$this->database};host={$this->hostname}", $this->username, $this->password);
		}
	}
	
	private function stmt_init()
	{
		if(is_object($this->stmt))
		{
			unset($this->stmt);
		}
	}
	
	public function prepare($SQL)
	{
		$this->stmt_init();
		
		$this->stmt = $this->link->prepare($SQL);
		
		return $this;
	}
	
	public function bind_param()
	{
		$this->params = func_get_args();
		
		return $this;
	}
	
	public function execute()
	{
		if(!$this->stmt->execute($this->params))
		{
			return print_r($this->errorInfo());
		}
		
		return $this;
	}
	
	public function id()
	{
		return $this->link->lastInsertId();
	}
	
	public function result()
	{
		return $this->stmt->fetchColumn();
	}
	
	public function num_rows()
	{
		return $this->stmt->rowCount();
	}
	
	public function fetch_assoc()
	{
		return $this->stmt->fetch(PDO::FETCH_ASSOC);
	}
}
?>