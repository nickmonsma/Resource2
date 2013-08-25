<?php

session_start();

foreach($_GET as $key => $value)
{
	$_GET[$key] = stripslashes(trim($value));
}

foreach($_POST as $key => $value)
{
	$_POST[$key] = stripslashes(trim($value));
}

function setup_resource($data)
{
	foreach($data as $key => $value)
	{
		$array = explode(':', $data[$key]);
		switch($array)
		{
			case 'database':
				$_SESSION['PDO'] = new PDO("mysql:dbname={$value['db_database']};host={$value['db_hostname']}", $value['db_username'], $value['db_password'], $value['db_port']);
				break;
				
			case 'configuration':
				$config = array();
				if($key = 'configuration_site')
				{
					
					$config['url'] = $value['url'];
					$config['sitename'] = $value['sitename'];
					$config['fullname'] = $value['fullname'];
				}
				break;
				
			case 'master_account':
				$config = json_decode(include('../Config/Config.json'), true);
				
				$account = array();
				$account['email'] = $value['email'];
				$account['username'] = $value['username'];
				$account['password'] = EmuHash($value['password']);
				
				$insert = array();
				foreach($account as $key => $value)
				{
					$insert[] = '"'.$value.'"';
					include('../Application/Database/Handler/'.$config['database']['handler'].'.php');
					
					$result = $_SESSION['PDO']->prepare("INSERT INTO {$database['handler']['table']} (".{$database['handler'][implode(',', array_keys($account))]}.") VALUES (".implode(',', $insert).")");
					$result->execute();
				}
		}
	}
}

if(isset($_GET['done']))
{
	die('(PROJECT RESOURCE SETUP): The installation is succesfully executed! delete the /Public/Setup/ directory to play your retro');
}
?>