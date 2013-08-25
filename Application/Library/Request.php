<?php
/**  ____                                    
	|  _ \ ___  ___  ___  _   _ _ __ ___ ___ 
	| |_) / _ \/ __|/ _ \| | | | '__/ __/ _ \
	|  _ <  __/\__ \ (_) | |_| | | | (_|  __/
	|_| \_\___||___/\___/ \__,_|_|  \___\___|
	 
	Project Resource II - (C) 2013 Monsma & Azoh
*/
	
class Request
{	
	public function __Construct()
	{
		foreach($_POST as $Key => $Value)
		{
			$_POST[$Key] = $this->Clean($Value);
		}

		foreach($_GET as $Key => $Value)
		{
			$_GET[$Key] = $this->Clean($Value);
		}
			
		$this->RequestGET($_SERVER['REQUEST_URI']);
	}
		
	public function RequestGET($URI)
	{
		if(!strpos($URI, '?'))
		{
			return;
		}
		
		$MethodGET = explode('?', $URI);
		$MethodGET = explode('=', end($MethodGET));
		
		$_GET[$MethodGET[0]] = $this->Clean($MethodGET[1]); ## url?{method}={value}
	}
		
	private function Clean($Variable)
	{
		return addslashes(htmlentities(stripslashes(trim($Variable))));
	}
}
?>