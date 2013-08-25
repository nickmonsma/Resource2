<?php
/**  ____                                    
	|  _ \ ___  ___  ___  _   _ _ __ ___ ___ 
	| |_) / _ \/ __|/ _ \| | | | '__/ __/ _ \
	|  _ <  __/\__ \ (_) | |_| | | | (_|  __/
	|_| \_\___||___/\___/ \__,_|_|  \___\___|
	 
	Project Resource II - (C) 2013 Monsma & Azoh
*/

/**
 * Require Application;
 */
require('Application.php');

/**
 * Initialize Application;
 */
$Application = new Application();

/**
 * Check CloudFlare Connection;
 */
if(isset($_SERVER['HTTP_CF_CONNECTING_IP']))
{
	$_SERVER['REMOTE_ADDR'] = $_SERVER['HTTP_CF_CONNECTING_IP'];
}
?>