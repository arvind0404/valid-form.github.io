<?php
define('host', 'localhost');
define('user', 'root');
define('pass', '');
define('db', 'validform');

$con=mysqli_connect(host,user,pass,db);
if(!$con){
	echo "connected";
}

?>