<?php 
session_start();
//connect.php
$server	    = 'localhost';
$username	= 'root';
$password	= '';
$database	= 'forum';

/* above variables need to be made into constants (shown
 below) and stored in constants.php; connection (and sql
 queries) should be  updated to PDO

	//constants defined here
	define('DB_SERVER', 'localhost');
	define('DB_USER', 'root');
	define('DB_PASSWORD', '');
	define('DB_NAME', 'membership');

normally constants.php would be stored in .gitignore
but for sake of clarity is included
*/

if(!mysql_connect($server, $username, $password))
{
 	exit('Error: could not establish database connection');
}
if(!mysql_select_db($database))
{
 	exit('Error: could not select the database');
}
?>