<?php
/**
	Project Resource 2
	Web Application Framework
	Copyright (C) 2013 Nick Monsma;
*/
 
class Model_Database_MySQLi extends Resource_Model
{
	private $link, $stmt, $row = null, $hostname, $username, $password, $database;
	
	public function __Construct()
	{
		foreach($this->rConfig->database as $key => $value)
		{
			$this->{$key} = $value;
		}
		
		if(!isset($this->link))
		{
			$this->link = new MySQLi($this->hostname, $this->username, $this->password, $this->database);
		}
	}
	
	private function stmt_init()
	{
		if(is_object($this->stmt))
		{
			$this->stmt->close();
		}
		
		return $this->link->stmt_init();
	}
	
	public function prepare($SQL)
	{
		$this->stmt = $this->stmt_init();
		
		$this->stmt->prepare($SQL);
	
		return $this;
	}
	
	public function bind_param()
	{
		$params = func_get_args();
		foreach($params as $value)
		{
			$types[] = substr(gettype($value), 0, 1);
		}
		
		$parameters = array(implode($types));
		foreach($params as $key => $value)
		{
			$parameters[] =& $params[$key];
		}
		
		call_user_func_array(array($this->stmt, 'bind_param'), $parameters);
		return $this;
	}
	
	public function execute()
	{
		if(!$this->stmt->execute())
		{
			trigger_error($this->stmt->error, E_USER_ERROR);
		}
		
		$this->stmt->store_result();
		return $this;
	}
	
	public function id()
	{
		return $this->stmt->insert_id;
	}
	
	public function result()
	{
		return current($this->fetch_assoc());
	}
	
	public function num_rows()
	{
		return $this->stmt->num_rows;
	}
	
	private function assoc(&$output)
	{
		$data = $this->stmt->result_metadata();
		
		$output = array();
		$fields = array();
		
		while($field = $data->fetch_field())
		{
			$fields[] =& $output[$field->name];
		}
		
		call_user_func_array(array($this->stmt, 'bind_result'), $fields);
	}
	
	public function fetch_assoc()
	{
		$this->assoc($this->row);
		
		$is_assoc = false;
		if($this->stmt->fetch())
		{
			$is_assoc = true;
		}
		
		$data = array();
		foreach($this->row as $key => $value)
		{
			$data[$key] = $value;
		}
		
		return ($is_assoc) ? $data : false;
	}
}
?>