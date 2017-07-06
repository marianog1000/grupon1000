<?php

/* **** desarrollo **///

$DB_host="localhost";
$DB_user="root";
$db_pass="";
$DB_name="nina";


/* ********** produccion  /////
$DB_host = 'localhost';
$DB_user = 'c0620253_nina';
$db_pass = 'sogisoLE69';
$DB_name = 'c0620253_nina';

*/////

try
{
    $db=new PDO("mysql:host={$DB_host};dbname={$DB_name}",$DB_user,$db_pass);
	$db->query("SET NAMES 'utf8'");
} catch (Exception $ex) {
echo $ex->getMessage();
}

include (get_stylesheet_directory() .'/PDO_Implement_With_PHP/Crud.php');

$crud = new Crud($db);