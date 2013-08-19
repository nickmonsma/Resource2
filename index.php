<?php
/**
	Project Resource 2
	Web Application Framework
	Copyright (C) 2013 Nick Monsma;
*/

session_start();

/**
 * Include Bootstrap;
 */
include('Application/Bootstrap.php');

/**
 * Initialize Current Controller;
 */
$Application->rController->Initialize();

/**
 * View Output;
 */
$Application->rView->Output();
?>