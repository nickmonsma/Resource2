<?php
/**  ____                                    
	|  _ \ ___  ___  ___  _   _ _ __ ___ ___ 
	| |_) / _ \/ __|/ _ \| | | | '__/ __/ _ \
	|  _ <  __/\__ \ (_) | |_| | | | (_|  __/
	|_| \_\___||___/\___/ \__,_|_|  \___\___|
	 
	Project Resource II - (C) 2013 Monsma & Azoh
*/

class Statement_PDO
{	
	private $STMT;
	
	public function __Construct($STMT)
	{
		$this->STMT = $STMT;
	}
	
	public function RowCount()
	{
		return $this->STMT->rowCount();
	}
	
	public function Result()
	{
		return $this->STMT->fetchColumn();
	}
	
	public function FetchRecord()
	{
		return $this->STMT->fetch(PDO::FETCH_ASSOC);
	}	
}
?>