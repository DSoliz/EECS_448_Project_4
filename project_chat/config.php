<?php
define('DB_SERVER', '/tmp/mysql.sock'); // sudo mysqladmin variables -u root -p
define('DB_USERNAME', 'root');
define('DB_PASSWORD', ''); //your mysql passwor
define('DB_DATABASE', 'ChatWebsite');

//$db = new MySQLi('host', username, password, databasename, port, server_socket_location);
//where I used port and server socket location I was running a localy hosted database
$db = new MySQLi('localhost', DB_USERNAME, DB_PASSWORD, DB_DATABASE, 0, DB_SERVER);

//Use this bellow for eecs database (remember to comment $db above if you do use eecs server)
//DB_DATABASE should be the same as your username
//$db = new MySQLi('mysql.eecs.ku.edu', DB_USERNAME, DB_PASSWORD, DB_DATABASE);

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
