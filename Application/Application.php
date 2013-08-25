<?php
/**  ____                                    
	|  _ \ ___  ___  ___  _   _ _ __ ___ ___ 
	| |_) / _ \/ __|/ _ \| | | | '__/ __/ _ \
	|  _ <  __/\__ \ (_) | |_| | | | (_|  __/
	|_| \_\___||___/\___/ \__,_|_|  \___\___|
	 
	Project Resource II - (C) 2013 Monsma & Azoh
*/

class Application
{
	public function __Construct()
	{
		$this->InitializeConfig();
	
		$this->InitializeDatabase();
	
		$this->InitializeLibrary();
	}
	
	private function InitializeConfig()
	{		
		foreach(glob('Config/*.php') as $File)
		{
			require($File);
		}
		
		$this->Config = json_decode(json_encode($Config));
	}
	
	private function InitializeLibrary()
	{
		foreach(glob('Application/Library/*.php') as $File)
		{
			require($File);
			
			$Class = explode('/', $File);
			$Class = explode(pathinfo($File, PATHINFO_EXTENSION), end($Class));
			$Class = explode('.', current($Class));
			$Class = current($Class);
				
			$this->{$Class} = new $Class($this);
		}
	}
	
	private function InitializeDatabase()
	{
		$Driver = 'Database_'.$this->Config->Database->Driver;
		
		if(!file_exists('Application/Model/Driver/'.$this->Config->Database->Driver.'/Driver.php'))
		{
			trigger_error('Application/Model/Driver/'.$this->Config->Database->Driver.'/Driver.php does not exist!');
		}
			
		if(!file_exists('Application/Model/Driver/'.$this->Config->Database->Driver.'/Statement.php'))
		{
			trigger_error('Application/Model/Driver/'.$this->Config->Database->Driver.'/Statement.php does not exist!');
		}
		
		foreach(glob('Application/Model/Driver/'.$this->Config->Database->Driver.'/*.php') as $File)
		{
			require($File);
		}
		
		$this->Database = new $Driver($this);
	}
}
?>