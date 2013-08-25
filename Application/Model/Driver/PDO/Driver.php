<?php
/**  ____                                    
	|  _ \ ___  ___  ___  _   _ _ __ ___ ___ 
	| |_) / _ \/ __|/ _ \| | | | '__/ __/ _ \
	|  _ <  __/\__ \ (_) | |_| | | | (_|  __/
	|_| \_\___||___/\___/ \__,_|_|  \___\___|
	 
	Project Resource II - (C) 2013 Monsma & Azoh
*/

class Database_PDO
{
	private $Link, $STMT, $Parameters;
	
	public function __Construct($Application)
	{
		if($this->Connected())
		{
			return;
		}
		
		$this->Connect($Application->Config->Database);
	}
	
	private function Connect($Database)
	{		
		try
		{			
			$this->Link = new PDO("mysql:dbname={$Database->Database};host={$Database->Hostname};port={$Database->Port}", $Database->Username, $Database->Password);
		}
		catch(PDOException $Exception)
		{
			trigger_error($Exception->getMessage());
		}
	}
	
	private function Connected()
	{
		return isset($this->Link);
	}
	
	public function Query($Query)
	{
		$this->STMT = $this->Link->prepare($Query);
		
		return $this;
	}
	
	public function BindParam()
	{
		$this->Parameters = func_get_args();
		
		return $this;
	}
	
	public function Execute()
	{
		$this->STMT->execute($this->Parameters);
		
		return new Statement_PDO($this->STMT);
	}
}
?>