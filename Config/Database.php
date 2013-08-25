<?php
/**  ____                                    
	|  _ \ ___  ___  ___  _   _ _ __ ___ ___ 
	| |_) / _ \/ __|/ _ \| | | | '__/ __/ _ \
	|  _ <  __/\__ \ (_) | |_| | | | (_|  __/
	|_| \_\___||___/\___/ \__,_|_|  \___\___|
	 
	Project Resource II - (C) 2013 Monsma & Azoh
*/

/**
 * PHP Database Driver;
 */
$Config['Database']['Driver'] = 'PDO'; ## Options: MySQLi | PDO;

/**
 * MySQL Hostname;
 */
$Config['Database']['Hostname'] = '127.0.0.1';

/**
 * MySQL Port
 */
$Config['Database']['Port'] = 3306; ## Default: 3306;

/**
 * MySQL root username;
 */
$Config['Database']['Username'] = 'root'; ## Default: root;

/**
 * MySQL root password;
 */
$Config['Database']['Password'] = 'admin';

/**
 * MySQL database name;
 */
$Config['Database']['Database'] = 'subbahotel';

/**
 * More drivers coming soon;
 */
//$Config['Database']['PDO_Driver'] = 'MySQL';
?>