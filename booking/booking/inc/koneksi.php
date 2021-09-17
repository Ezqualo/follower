<?php
date_default_timezone_set("Asia/Singapore"); //set the time zone
define('host','localhost');
define('user','root');
define('pass','password');
define('db_name','db_booking');


$db= new MySQLi(host,user,pass,db_name);
if($db->connect_errno>0){
	die('Koneksi ke database gagal ['. $db->connect_error .']');	
}

?>
