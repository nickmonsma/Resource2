<?php
/**
	Project Resource 2
	Web Application Framework
	Copyright (C) 2013 Nick Monsma;
*/

/**
 * Define Folder Location;
 */
define('DS', DIRECTORY_SEPARATOR);
define('ROOT', realpath(dirname(__DIR__)).DS);

/**
 * Include Common Functions;
 */
include(ROOT.'Application'.DS.'Library'.DS.'Common.php');

/**
 * Check Cloudflare Connection;
 */
if(isset($_SERVER['HTTP_CF_CONNECTING_IP']))
{
	$_SERVER['REMOTE_ADDR'] = $_SERVER['HTTP_CF_CONNECTING_IP'];
}

/**
 * Initialize Application;
 */
$Application = new Application();
?>