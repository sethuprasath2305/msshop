<?php
$db_server = "localhost";
$db_user = "root";
$db_pass = "";
$db_name="shopie";
$con = new Mysqli($db_server,$db_user,$db_pass,$db_name);
if(!$con){
	die("connection failed");
}

?>