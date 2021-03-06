<?php
define('DB_SERVER', '/tmp/mysql.sock'); // sudo mysqladmin variables -u root -p
define('DB_USERNAME', 'dsolizca');

define('DB_PASSWORD', 'Mygenericpass');
define('DB_DATABASE', 'dsolizca');

//$db = new MySQLi('host', username, password, databasename, port, server_socket_location);
//where I used port and server socket location I was running a localy hosted database
$db = new MySQLi('mysql.eecs.ku.edu', DB_USERNAME, DB_PASSWORD, DB_DATABASE);

//If you are using EECS databses use this instead
//$db = new MySQLi('mysql.eecs,ku,edu', 'username', 'password', 'username';

if ($db->connect_errno){
		printf("Connect failed: %s\n", $db->connect_error);
		exit();
}
/*
Useful commands

Find sql socket path and port (default is 0):

sudo mysqladmin variables -u root -p

Emulate server on a folder:

php -S localhost:8000

linux useful installs:
sudo apt-get install php5-cli
sudo apt-get install php5-mysql
*/
?>
